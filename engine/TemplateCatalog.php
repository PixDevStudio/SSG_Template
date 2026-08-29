<?php

declare(strict_types=1);

namespace MonSsg;

use JsonException;
use RuntimeException;

final readonly class TemplateCatalog
{
    private const REGISTRY = '.ssg/templates.json';

    public function __construct(private Paths $paths, private FileSystem $files)
    {
    }

    /** @return list<array<string, mixed>> */
    public function all(): array
    {
        $templates = [];
        foreach (glob($this->paths->root . '/templates/*/*/manifest.json') ?: [] as $manifestPath) {
            $manifest = $this->manifest($manifestPath);
            $manifest['installed'] = isset($this->registry()[$manifest['id']]);
            $templates[] = $manifest;
        }

        usort($templates, static fn (array $left, array $right): int => [$left['category'], $left['name']] <=> [$right['category'], $right['name']]);

        return $templates;
    }

    /** @return array<string, mixed> */
    public function get(string $id): array
    {
        $this->validateId($id);
        $manifestPath = $this->paths->root . '/templates/' . $id . '/manifest.json';
        if (!is_file($manifestPath)) {
            throw new RuntimeException("Template introuvable : {$id}");
        }

        $manifest = $this->manifest($manifestPath);
        $manifest['installed'] = isset($this->registry()[$id]);

        return $manifest;
    }

    public function install(string $id): void
    {
        $manifest = $this->get($id);
        $registry = $this->registry();
        if (isset($registry[$id])) {
            throw new RuntimeException("Le template {$id} est déjà installé.");
        }

        $installedFiles = [];
        foreach ($manifest['files'] as $source => $destination) {
            if (!preg_match('~^[a-zA-Z0-9_./-]+$~', (string) $source) || str_contains((string) $source, '..')) {
                throw new RuntimeException("Source interdite : {$source}");
            }
            $sourcePath = $this->paths->root . '/templates/' . $id . '/' . $source;
            $destinationPath = $this->destination((string) $destination);
            if (!is_file($sourcePath)) {
                throw new RuntimeException("Fichier du template introuvable : {$source}");
            }
            if (file_exists($destinationPath)) {
                throw new RuntimeException("Installation interrompue : {$destination} existe déjà.");
            }
        }

        foreach ($manifest['files'] as $source => $destination) {
            $destinationPath = $this->destination((string) $destination);
            $contents = (string) file_get_contents($this->paths->root . '/templates/' . $id . '/' . $source);
            $this->files->write($destinationPath, $contents);
            $installedFiles[(string) $destination] = hash('sha256', $contents);
        }

        $registry[$id] = ['files' => $installedFiles, 'installed_at' => date(DATE_ATOM)];
        $this->writeRegistry($registry);
    }

    /** @return list<string> */
    public function remove(string $id): array
    {
        $this->validateId($id);
        $registry = $this->registry();
        if (!isset($registry[$id])) {
            throw new RuntimeException("Le template {$id} n'est pas installé.");
        }

        $modified = [];
        foreach ($registry[$id]['files'] as $relative => $hash) {
            $path = $this->destination((string) $relative);
            if (is_file($path) && hash_file('sha256', $path) !== $hash) {
                $modified[] = (string) $relative;
            }
        }
        if ($modified !== []) {
            throw new RuntimeException("Désinstallation interrompue : fichiers modifiés :\n- " . implode("\n- ", $modified));
        }

        $removed = array_keys($registry[$id]['files']);
        foreach ($registry[$id]['files'] as $relative => $_hash) {
            $path = $this->destination((string) $relative);
            if (is_file($path)) {
                unlink($path);
                $this->removeEmptyParents(dirname($path));
            }
        }

        unset($registry[$id]);
        $this->writeRegistry($registry);

        return $removed;
    }

    /** @return array<string, mixed> */
    private function manifest(string $path): array
    {
        try {
            $manifest = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException("Manifeste JSON invalide : {$path}", 0, $exception);
        }

        foreach (['id', 'category', 'name', 'description', 'include', 'usage', 'files'] as $key) {
            if (!isset($manifest[$key]) || (in_array($key, ['usage', 'files'], true) && !is_array($manifest[$key]))) {
                throw new RuntimeException("Clé {$key} absente du manifeste : {$path}");
            }
        }

        foreach (['target', 'position', 'stylesheet', 'data'] as $key) {
            if (!isset($manifest['usage'][$key]) || !is_string($manifest['usage'][$key])) {
                throw new RuntimeException("Instruction usage.{$key} absente du manifeste : {$path}");
            }
        }

        $expectedId = basename(dirname(dirname($path))) . '/' . basename(dirname($path));
        if ($manifest['id'] !== $expectedId) {
            throw new RuntimeException("Identifiant de manifeste invalide : {$manifest['id']}");
        }

        return $manifest;
    }

    /** @return array<string, array<string, mixed>> */
    private function registry(): array
    {
        $path = $this->paths->root . '/' . self::REGISTRY;
        if (!is_file($path)) {
            return [];
        }

        try {
            return json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException('Le registre des templates est invalide.', 0, $exception);
        }
    }

    /** @param array<string, array<string, mixed>> $registry */
    private function writeRegistry(array $registry): void
    {
        $json = json_encode($registry, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
        $this->files->write($this->paths->root . '/' . self::REGISTRY, $json . "\n");
    }

    private function destination(string $relative): string
    {
        if (!preg_match('~^src/[a-zA-Z0-9_./-]+$~', $relative) || str_contains($relative, '..')) {
            throw new RuntimeException("Destination interdite : {$relative}");
        }

        return $this->paths->root . '/' . $relative;
    }

    private function validateId(string $id): void
    {
        if (!preg_match('~^[a-z0-9-]+/[a-z0-9-]+$~', $id)) {
            throw new RuntimeException('Identifiant attendu : catégorie/nom');
        }
    }

    private function removeEmptyParents(string $directory): void
    {
        $src = $this->paths->src();
        while ($directory !== $src && str_starts_with($directory, $src . '/')) {
            if ((glob($directory . '/*') ?: []) !== []) {
                return;
            }
            if (!rmdir($directory)) {
                return;
            }
            $directory = dirname($directory);
        }
    }
}