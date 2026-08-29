<?php

declare(strict_types=1);

namespace MonSsg;

final readonly class Paths
{
    public function __construct(public string $root)
    {
    }

    public function src(string $path = ''): string
    {
        return $this->join('src', $path);
    }

    public function public(string $path = ''): string
    {
        return $this->join('public', $path);
    }

    public function dist(string $path = ''): string
    {
        return $this->join('dist', $path);
    }

    public function plugins(string $path = ''): string
    {
        return $this->join('plugins', $path);
    }

    private function join(string $directory, string $path): string
    {
        return $this->root . '/' . $directory . ($path === '' ? '' : '/' . ltrim($path, '/'));
    }
}