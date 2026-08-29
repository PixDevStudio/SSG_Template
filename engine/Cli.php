<?php

declare(strict_types=1);

namespace MonSsg;

final readonly class Cli
{
    private TemplateCatalog $templates;
    private TerminalPreview $previews;

    public function __construct(private Paths $paths, private FileSystem $files)
    {
        $this->templates = new TemplateCatalog($paths, $files);
        $this->previews = new TerminalPreview($paths);
    }

    /** @param list<string> $arguments */
    public function run(array $arguments): int
    {
        return match ($arguments[0] ?? null) {
            'new' => $this->newPage($arguments),
            'templates' => $this->templates($arguments),
            default => $this->usage(),
        };
    }

    /** @param list<string> $arguments */
    private function newPage(array $arguments): int
    {
        if (($arguments[1] ?? null) !== 'page' || !isset($arguments[2])) {
            return $this->usage();
        }

        $name = preg_replace('/\.html$/', '', $arguments[2]) ?? '';
        if (!preg_match('~^[a-z0-9][a-z0-9/_-]*$~', $name) || str_contains($name, '..')) {
            fwrite(STDERR, "✗ Nom de page invalide. Utilisez des lettres minuscules, chiffres, tirets ou sous-dossiers.\n");
            return 1;
        }

        $relative = "src/pages/{$name}.html";
        $path = $this->paths->root . '/' . $relative;
        if (is_file($path)) {
            echo "⚠ La page existe déjà.\n\n➜ {$relative}\n";
            return 2;
        }

        $title = ucwords(str_replace(['-', '_', '/'], ' ', $name));
        $contents = <<<HTML
---
layout: default
title: {$title}
description: Description de la page {$title}.
---
<main class="site-main">
    <h1>{{ page.title }}</h1>
</main>
HTML;
        $this->files->write($path, $contents . "\n");
        echo "✓ Page créée\n\n➜ {$relative}\n";

        return 0;
    }

    /** @param list<string> $arguments */
    private function templates(array $arguments): int
    {
        $action = $arguments[1] ?? 'list';
        if (in_array($action, ['list', 'liste'], true)) {
            $currentCategory = null;
            echo "Catalogue des templates\n";
            foreach ($this->templates->all() as $template) {
                if ($currentCategory !== $template['category']) {
                    $currentCategory = $template['category'];
                    echo "\n" . strtoupper((string) $currentCategory) . "\n";
                }
                $status = $template['installed'] ? 'installé' : 'disponible';
                $this->previews->printThumbnail($template);
                echo "  [{$status}] {$template['id']} — {$template['name']}\n";
            }
            echo "\nUtilisez ./ssg templates info <catégorie/nom> pour les détails.\n";
            return 0;
        }

        $id = $arguments[2] ?? '';
        if ($action === 'info') {
            $template = $this->templates->get($id);
            $status = $template['installed'] ? 'installé' : 'disponible';
            echo "{$template['name']} ({$template['id']})\n\n{$template['description']}\n\nÉtat : {$status}\n";
            $this->printTemplateUsage($template);
            $this->previews->printDetails($template);
            echo "Documentation : templates/{$id}/README.md\n";
            return 0;
        }
        if (in_array($action, ['install', 'installer'], true)) {
            $this->templates->install($id);
            $template = $this->templates->get($id);
            echo "✓ Template installé\n\n";
            $this->printTemplateUsage($template);
            echo "Documentation installée : src/template-docs/{$id}/README.md\n";
            return 0;
        }
        if (in_array($action, ['remove', 'uninstall', 'desinstaller'], true)) {
            $this->templates->remove($id);
            echo "✓ Template désinstallé\n\n➜ {$id}\n";
            return 0;
        }

        return $this->usage();
    }

    /** @param array<string, mixed> $template */
    private function printTemplateUsage(array $template): void
    {
        $usage = $template['usage'] ?? [];
        echo "Inclusion : {$template['include']}\n";
        if ($usage !== []) {
            echo "Fichier cible : {$usage['target']}\n";
            echo "Emplacement : {$usage['position']}\n";
            echo "CSS à ajouter dans <head> : {$usage['stylesheet']}\n";
            echo "Variables à modifier : {$usage['data']}\n";
        }
        echo "\n";
    }

    private function usage(): int
    {
        fwrite(STDERR, "Usage :\n  ./ssg new page <nom>\n  ./ssg templates\n  ./ssg templates info <catégorie/nom>\n  ./ssg templates install <catégorie/nom>\n  ./ssg templates remove <catégorie/nom>\n");
        return 1;
    }
}