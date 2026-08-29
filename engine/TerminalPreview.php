<?php

declare(strict_types=1);

namespace MonSsg;

use RuntimeException;

final readonly class TerminalPreview
{
    public function __construct(private Paths $paths)
    {
    }

    /** @param array<string, mixed> $template */
    public function printThumbnail(array $template): void
    {
        if (!$this->supportsAnsiImages()) {
            return;
        }

        $path = $this->previewPath((string) $template['id'], 'desktop');
        if (is_file($path)) {
            echo $this->render($path, 24, 7);
        }
    }

    /** @param array<string, mixed> $template */
    public function printDetails(array $template): void
    {
        $id = (string) $template['id'];
        echo "Aperçus :\n";

        foreach (['desktop' => 'Desktop', 'tablette' => 'Tablette', 'mobile' => 'Mobile'] as $mode => $label) {
            $relative = "templates/{$id}/previews/{$mode}.png";
            $path = $this->paths->root . '/' . $relative;
            echo "  {$label} : {$relative}\n";

            if ($this->supportsAnsiImages() && is_file($path)) {
                $columns = $mode === 'mobile' ? 32 : 64;
                echo $this->render($path, $columns, 16);
            }
        }

        echo "\n";
    }

    public function render(string $path, int $columns, int $rows): string
    {
        $chafa = $this->findExecutable('chafa');
        if ($chafa !== null) {
            $output = [];
            $exitCode = 0;
            exec(
                escapeshellarg($chafa)
                . ' --format symbols --colors full --animate off --size '
                . escapeshellarg("{$columns}x{$rows}")
                . ' ' . escapeshellarg($path) . ' 2>/dev/null',
                $output,
                $exitCode,
            );
            if ($exitCode === 0 && $output !== []) {
                return implode("\n", $output) . "\n";
            }
        }

        $pixels = $this->decodePng($path, $columns, $rows * 2);
        $output = '';

        for ($row = 0; $row < $rows; $row++) {
            for ($column = 0; $column < $columns; $column++) {
                [$topRed, $topGreen, $topBlue] = $pixels[$row * 2][$column];
                [$bottomRed, $bottomGreen, $bottomBlue] = $pixels[$row * 2 + 1][$column];
                $output .= "\033[38;2;{$topRed};{$topGreen};{$topBlue}m"
                    . "\033[48;2;{$bottomRed};{$bottomGreen};{$bottomBlue}m▀";
            }

            $output .= "\033[0m\n";
        }

        return $output;
    }

    private function findExecutable(string $name): ?string
    {
        foreach (explode(PATH_SEPARATOR, getenv('PATH') ?: '') as $directory) {
            $path = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $name;
            if (is_file($path) && is_executable($path)) {
                return $path;
            }
        }

        return null;
    }

    private function supportsAnsiImages(): bool
    {
        $override = getenv('SSG_PREVIEWS');
        if ($override === '0' || getenv('NO_COLOR') !== false) {
            return false;
        }
        if ($override === '1') {
            return true;
        }

        return function_exists('stream_isatty')
            && stream_isatty(STDOUT)
            && getenv('TERM') !== 'dumb';
    }

    private function previewPath(string $id, string $mode): string
    {
        return $this->paths->root . "/templates/{$id}/previews/{$mode}.png";
    }

    /** @return list<list<array{int, int, int}>> */
    private function decodePng(string $path, int $sampleWidth, int $sampleHeight): array
    {
        $png = file_get_contents($path);
        if ($png === false || !str_starts_with($png, "\x89PNG\r\n\x1a\n")) {
            throw new RuntimeException("Aperçu PNG invalide : {$path}");
        }

        $offset = 8;
        $compressed = '';
        $width = 0;
        $height = 0;
        $colorType = -1;

        while ($offset + 12 <= strlen($png)) {
            $length = unpack('Nlength', substr($png, $offset, 4))['length'];
            $type = substr($png, $offset + 4, 4);
            $data = substr($png, $offset + 8, $length);
            $offset += 12 + $length;

            if ($type === 'IHDR') {
                $header = unpack('Nwidth/Nheight/Cdepth/Ccolor/Ccompression/Cfilter/Cinterlace', $data);
                $width = $header['width'];
                $height = $header['height'];
                $colorType = $header['color'];
                if ($header['depth'] !== 8 || $header['interlace'] !== 0 || !in_array($colorType, [2, 6], true)) {
                    throw new RuntimeException("Format PNG non pris en charge : {$path}");
                }
            } elseif ($type === 'IDAT') {
                $compressed .= $data;
            } elseif ($type === 'IEND') {
                break;
            }
        }

        $raw = zlib_decode($compressed);
        if ($width < 1 || $height < 1 || $raw === false) {
            throw new RuntimeException("Décodage PNG impossible : {$path}");
        }

        $bytesPerPixel = $colorType === 6 ? 4 : 3;
        $stride = $width * $bytesPerPixel;
        $position = 0;
        $previous = array_fill(0, $stride, 0);
        $pixels = [];
        $sampleColumns = [];
        $sampleRows = [];

        for ($column = 0; $column < $sampleWidth; $column++) {
            $sampleColumns[] = min($width - 1, (int) floor(($column + 0.5) * $width / $sampleWidth));
        }
        for ($row = 0; $row < $sampleHeight; $row++) {
            $sourceRow = min($height - 1, (int) floor(($row + 0.5) * $height / $sampleHeight));
            $sampleRows[$sourceRow][] = $row;
        }

        for ($y = 0; $y < $height; $y++) {
            $filter = ord($raw[$position++]);
            $scanline = array_values(unpack('C*', substr($raw, $position, $stride)));
            $position += $stride;
            $decoded = [];

            for ($index = 0; $index < $stride; $index++) {
                $left = $index >= $bytesPerPixel ? $decoded[$index - $bytesPerPixel] : 0;
                $up = $previous[$index];
                $upperLeft = $index >= $bytesPerPixel ? $previous[$index - $bytesPerPixel] : 0;
                $predictor = match ($filter) {
                    0 => 0,
                    1 => $left,
                    2 => $up,
                    3 => intdiv($left + $up, 2),
                    4 => $this->paeth($left, $up, $upperLeft),
                    default => throw new RuntimeException("Filtre PNG inconnu : {$filter}"),
                };
                $decoded[$index] = ($scanline[$index] + $predictor) & 0xff;
            }

            if (isset($sampleRows[$y])) {
                $pixelRow = [];
                foreach ($sampleColumns as $x) {
                    $index = $x * $bytesPerPixel;
                    $alpha = $bytesPerPixel === 4 ? $decoded[$index + 3] : 255;
                    $pixelRow[] = [
                        $this->blendOnWhite($decoded[$index], $alpha),
                        $this->blendOnWhite($decoded[$index + 1], $alpha),
                        $this->blendOnWhite($decoded[$index + 2], $alpha),
                    ];
                }
                foreach ($sampleRows[$y] as $targetRow) {
                    $pixels[$targetRow] = $pixelRow;
                }
            }
            $previous = $decoded;
        }

        ksort($pixels);

        return array_values($pixels);
    }

    private function paeth(int $left, int $up, int $upperLeft): int
    {
        $estimate = $left + $up - $upperLeft;
        $leftDistance = abs($estimate - $left);
        $upDistance = abs($estimate - $up);
        $upperLeftDistance = abs($estimate - $upperLeft);

        return $leftDistance <= $upDistance && $leftDistance <= $upperLeftDistance
            ? $left
            : ($upDistance <= $upperLeftDistance ? $up : $upperLeft);
    }

    private function blendOnWhite(int $color, int $alpha): int
    {
        return (int) round(($color * $alpha + 255 * (255 - $alpha)) / 255);
    }
}