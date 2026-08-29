<?php

declare(strict_types=1);

use MonSsg\Builder;
use MonSsg\FileSystem;

beforeEach(function (): void {
    $this->root = sys_get_temp_dir() . '/pix-ssg-' . bin2hex(random_bytes(6));
    $files = new FileSystem();

    foreach (['src/pages', 'src/layouts', 'src/partials', 'src/components', 'src/styles', 'src/scripts', 'src/data', 'public/images', 'plugins', 'dist'] as $directory) {
        $files->ensureDirectory($this->root . '/' . $directory);
    }
});

afterEach(function (): void {
    if (is_dir($this->root)) {
        $files = new FileSystem();
        $files->clearDirectory($this->root);
        rmdir($this->root);
    }
});

it('génère une page avec layout, partial, composant, données et fichiers statiques', function (): void {
    $files = new FileSystem();
    $files->write($this->root . '/src/data/site.json', json_encode(['name' => 'Mon site'], JSON_THROW_ON_ERROR));
    $files->write($this->root . '/src/partials/header.html', '<header>{{ site.name }}</header>');
    $files->write($this->root . '/src/components/card.html', '<article>{{ page.title }}</article>');
    $files->write($this->root . '/src/layouts/default.html', '<!doctype html>{{ partial:header }}<main>{{{ content }}}</main>');
    $files->write($this->root . '/src/pages/index.html', "---\nlayout: default\ntitle: Accueil\n---\n{{ component:card }}");
    $files->write($this->root . '/public/images/logo.txt', 'logo');
    $files->write($this->root . '/src/styles/site.css', 'body {}');

    expect(Builder::create($this->root)->build())->toBe(1)
        ->and($this->root . '/dist/index.html')->toBeFile()
        ->and(file_get_contents($this->root . '/dist/index.html'))->toContain('<header>Mon site</header>', '<article>Accueil</article>')
        ->and($this->root . '/dist/images/logo.txt')->toBeFile()
        ->and($this->root . '/dist/assets/css/site.css')->toBeFile();
});

it('nettoie entièrement dist sans toucher aux sources', function (): void {
    $files = new FileSystem();
    $files->write($this->root . '/src/pages/index.html', '<p>Source</p>');
    $files->write($this->root . '/dist/nested/generated.html', '<p>Généré</p>');

    $files->clearDirectory($this->root . '/dist');

    expect($this->root . '/src/pages/index.html')->toBeFile()
        ->and(glob($this->root . '/dist/*'))->toBe([]);
});

it('signale un layout introuvable', function (): void {
    (new FileSystem())->write($this->root . '/src/pages/index.html', "---\nlayout: absent\n---\n<p>Page</p>");

    expect(fn () => Builder::create($this->root)->build())
        ->toThrow(RuntimeException::class, 'Layout introuvable');
});
