<?php

declare(strict_types=1);

namespace MonSsg;

use JsonException;
use RuntimeException;

final class DataRepository
{
    /** @return array<string, mixed> */
    public function load(string $directory): array
    {
        if (!is_dir($directory)) {
            return [];
        }

        $data = [];
        foreach (glob($directory . '/*.{json,php}', GLOB_BRACE) ?: [] as $file) {
            $key = pathinfo($file, PATHINFO_FILENAME);
            $data[$key] = pathinfo($file, PATHINFO_EXTENSION) === 'json'
                ? $this->loadJson($file)
                : $this->loadPhp($file);
        }

        return $data;
    }

    private function loadJson(string $file): mixed
    {
        try {
            return json_decode((string) file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException("JSON invalide dans {$file} : {$exception->getMessage()}", 0, $exception);
        }
    }

    private function loadPhp(string $file): mixed
    {
        $value = require $file;
        if (!is_array($value)) {
            throw new RuntimeException("Le fichier de données PHP doit retourner un tableau : {$file}");
        }

        return $value;
    }
}