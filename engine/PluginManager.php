<?php

declare(strict_types=1);

namespace MonSsg;

use RuntimeException;

final class PluginManager
{
    /** @var array<string, list<callable>> */
    private array $filters = [];

    public function addFilter(string $hook, callable $filter): void
    {
        $this->filters[$hook][] = $filter;
    }

    public function apply(string $hook, mixed $value, array $context = []): mixed
    {
        foreach ($this->filters[$hook] ?? [] as $filter) {
            $value = $filter($value, $context);
        }

        return $value;
    }

    public function load(string $directory): void
    {
        foreach (glob($directory . '/*.php') ?: [] as $file) {
            $plugin = require $file;
            if (!is_callable($plugin)) {
                throw new RuntimeException("Le plugin doit retourner une fonction : {$file}");
            }
            $plugin($this);
        }
    }
}