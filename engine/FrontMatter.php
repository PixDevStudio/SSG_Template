<?php

declare(strict_types=1);

namespace MonSsg;

use RuntimeException;

final class FrontMatter
{
    /** @return array{0: array<string, mixed>, 1: string} */
    public function parse(string $contents): array
    {
        if (!str_starts_with($contents, "---\n") && !str_starts_with($contents, "---\r\n")) {
            return [[], $contents];
        }

        if (!preg_match('/\A---\R(.*?)\R---\R?(.*)\z/s', $contents, $matches)) {
            throw new RuntimeException('Front matter invalide : séparateur de fermeture manquant.');
        }

        $data = [];
        foreach (preg_split('/\R/', trim($matches[1])) ?: [] as $line) {
            if ($line === '' || str_starts_with(ltrim($line), '#')) {
                continue;
            }

            if (!str_contains($line, ':')) {
                throw new RuntimeException("Front matter invalide : {$line}");
            }

            [$key, $value] = array_map('trim', explode(':', $line, 2));
            $data[$key] = $this->value($value);
        }

        return [$data, $matches[2]];
    }

    private function value(string $value): mixed
    {
        if ($value === 'true' || $value === 'false') {
            return $value === 'true';
        }

        if ($value === 'null') {
            return null;
        }

        if (is_numeric($value)) {
            return str_contains($value, '.') ? (float) $value : (int) $value;
        }

        return trim($value, "\"'");
    }
}