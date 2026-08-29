<?php

declare(strict_types=1);

namespace MonSsg;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SplFileInfo;

final class FileSystem
{
    public function ensureDirectory(string $directory): void
    {
        if (!is_dir($directory) && !mkdir($directory, 0775, true) && !is_dir($directory)) {
            throw new RuntimeException("Impossible de creer le dossier : {$directory}");
        }
    }

    public function write(string $path, string $contents): void
    {
        $this->ensureDirectory(dirname($path));

        if (file_put_contents($path, $contents) === false) {
            throw new RuntimeException("Impossible d'ecrire le fichier : {$path}");
        }
    }

    public function copyDirectory(string $source, string $destination): void
    {
        if (!is_dir($source)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST,
        );

        foreach ($iterator as $item) {
            $target = $destination . '/' . $iterator->getSubPathName();

            if ($item->isDir()) {
                $this->ensureDirectory($target);
            } else {
                $this->ensureDirectory(dirname($target));
                if (!copy($item->getPathname(), $target)) {
                    throw new RuntimeException("Impossible de copier : {$item->getPathname()}");
                }
            }
        }
    }

    public function clearDirectory(string $directory): void
    {
        $this->ensureDirectory($directory);

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST,
        );

        /** @var SplFileInfo $item */
        foreach ($iterator as $item) {
            $removed = $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
            if (!$removed) {
                throw new RuntimeException("Impossible de supprimer : {$item->getPathname()}");
            }
        }
    }
}