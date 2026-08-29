<?php

declare(strict_types=1);

namespace MonSsg;

use RuntimeException;

final readonly class TemplateEngine
{
    public function __construct(private Paths $paths)
    {
    }

    /** @param array<string, mixed> $data */
    public function render(string $template, array $data): string
    {
        return $this->renderTemplate($template, $data, []);
    }

    /** @param array<string, mixed> $data @param list<string> $stack */
    private function renderTemplate(string $template, array $data, array $stack): string
    {
        $template = preg_replace_callback(
            '/{{\s*(partial|component):([a-zA-Z0-9_\/-]+)\s*}}/',
            function (array $matches) use ($data, $stack): string {
                $directory = $matches[1] === 'partial' ? 'partials' : 'components';
                $path = $this->paths->src("{$directory}/{$matches[2]}.html");
                if (!is_file($path)) {
                    throw new RuntimeException("Template introuvable : {$path}");
                }
                if (in_array($path, $stack, true)) {
                    throw new RuntimeException("Inclusion circulaire détectée : {$path}");
                }

                return $this->renderTemplate((string) file_get_contents($path), $data, [...$stack, $path]);
            },
            $template,
        ) ?? $template;

        $template = preg_replace_callback('/{{{\s*([a-zA-Z0-9_.]+)\s*}}}/', function (array $matches) use ($data): string {
            return (string) $this->get($data, $matches[1]);
        }, $template) ?? $template;

        return preg_replace_callback('/{{\s*([a-zA-Z0-9_.]+)\s*}}/', function (array $matches) use ($data): string {
            return htmlspecialchars((string) $this->get($data, $matches[1]), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }, $template) ?? $template;
    }

    /** @param array<string, mixed> $data */
    private function get(array $data, string $path): mixed
    {
        $value = $data;
        foreach (explode('.', $path) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                throw new RuntimeException("Variable de template inconnue : {$path}");
            }
            $value = $value[$segment];
        }

        if (is_array($value) || is_object($value)) {
            throw new RuntimeException("La variable ne peut pas être affichée directement : {$path}");
        }

        return $value;
    }
}