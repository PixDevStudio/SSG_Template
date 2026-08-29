<?php

declare(strict_types=1);

use MonSsg\FileSystem;
use MonSsg\Paths;
use MonSsg\TemplateCatalog;

beforeEach(function (): void {
    $this->root = sys_get_temp_dir() . '/mon-ssg-catalog-' . bin2hex(random_bytes(6));
    $this->files = new FileSystem();
    $this->files->ensureDirectory($this->root . '/templates/card/example/files');
    $this->files->write($this->root . '/templates/card/example/files/example.html', '<article>Exemple</article>');
    $this->files->write($this->root . '/templates/card/example/README.md', '# Exemple');
    $this->files->write($this->root . '/templates/card/example/manifest.json', json_encode([
        'id' => 'card/example',
        'category' => 'card',
        'name' => 'Exemple',
        'description' => 'Carte de test.',
        'include' => '{{ component:example }}',
        'files' => [
            'files/example.html' => 'src/components/example.html',
            'README.md' => 'src/template-docs/card/example/README.md',
        ],
    ], JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR));
    $this->catalog = new TemplateCatalog(new Paths($this->root), $this->files);
});

afterEach(function (): void {
    if (is_dir($this->root)) {
        $this->files->clearDirectory($this->root);
        rmdir($this->root);
    }
});

it('liste, installe et désinstalle un template avec sa documentation', function (): void {
    expect($this->catalog->all())->toHaveCount(1)
        ->and($this->catalog->get('card/example')['installed'])->toBeFalse();

    $this->catalog->install('card/example');

    expect($this->root . '/src/components/example.html')->toBeFile()
        ->and($this->root . '/src/template-docs/card/example/README.md')->toBeFile()
        ->and($this->catalog->get('card/example')['installed'])->toBeTrue();

    $this->catalog->remove('card/example');

    expect($this->root . '/src/components/example.html')->not->toBeFile()
        ->and($this->catalog->get('card/example')['installed'])->toBeFalse();
});

it('refuse de supprimer un fichier installé puis modifié', function (): void {
    $this->catalog->install('card/example');
    $this->files->write($this->root . '/src/components/example.html', '<article>Personnalisé</article>');

    expect(fn () => $this->catalog->remove('card/example'))
        ->toThrow(RuntimeException::class, 'fichiers modifiés')
        ->and($this->root . '/src/components/example.html')->toBeFile();
});