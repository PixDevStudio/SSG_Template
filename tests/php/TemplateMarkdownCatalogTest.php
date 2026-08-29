<?php

declare(strict_types=1);

use MonSsg\FileSystem;
use MonSsg\Paths;
use MonSsg\TemplateMarkdownCatalog;

it('génère un catalogue Markdown avec aperçus et commandes', function (): void {
    $root = sys_get_temp_dir() . '/pix-ssg-markdown-' . bin2hex(random_bytes(6));
    $files = new FileSystem();
    $catalog = new TemplateMarkdownCatalog(new Paths($root), $files);
    $templates = [[
        'id' => 'card/example',
        'category' => 'card',
        'name' => 'Carte exemple',
        'description' => 'Une carte de démonstration.',
        'include' => '{{ component:example }}',
        'usage' => [
            'target' => 'src/pages/index.html',
            'position' => 'Dans main.',
            'stylesheet' => '<link rel="stylesheet" href="/assets/css/example.css">',
            'data' => 'src/data/example.json',
        ],
    ]];

    try {
        $relative = $catalog->write($templates);
        $markdown = file_get_contents($root . '/' . $relative);

        expect($relative)->toBe('templates/CATALOGUE.md')
            ->and($markdown)->toContain('card/example/previews/desktop.png')
            ->and($markdown)->toContain('./pix-ssg templates installer card/example')
            ->and($markdown)->toContain('{{ component:example }}')
            ->and($markdown)->toContain('./pix-ssg templates desinstaller card/example');
    } finally {
        $files->clearDirectory($root);
        rmdir($root);
    }
});