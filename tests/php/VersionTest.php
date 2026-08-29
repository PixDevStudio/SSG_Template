<?php

declare(strict_types=1);

use MonSsg\Cli;
use MonSsg\FileSystem;
use MonSsg\Paths;

it('affiche la version publique du SSG', function (): void {
    $root = dirname(__DIR__, 2);
    ob_start();
    $exitCode = (new Cli(new Paths($root), new FileSystem()))->run(['--version']);
    $output = ob_get_clean();

    expect($exitCode)->toBe(0)
        ->and($output)->toBe('pix-ssg ' . trim((string) file_get_contents($root . '/VERSION')) . "\n");
});