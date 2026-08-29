<?php

declare(strict_types=1);

use MonSsg\Paths;
use MonSsg\TerminalPreview;

it('utilise chafa lorsqu’il est disponible', function (): void {
    $directory = sys_get_temp_dir() . '/mon-ssg-chafa-' . bin2hex(random_bytes(6));
    mkdir($directory);
    $executable = $directory . '/chafa';
    file_put_contents($executable, "#!/usr/bin/env bash\nprintf '%s\\n' \"\$*\" > \"\$0.arguments\"\nprintf 'apercu-chafa\n'\n");
    chmod($executable, 0755);
    $previousPath = getenv('PATH');
    putenv("PATH={$directory}:/usr/bin:/bin");

    try {
        $preview = new TerminalPreview(new Paths(dirname(__DIR__, 2)));
        expect($preview->render('/image-inutile-avec-chafa.png', 24, 7))->toBe("apercu-chafa\n")
            ->and(file_get_contents($executable . '.arguments'))->toContain('--probe off');
    } finally {
        putenv($previousPath === false ? 'PATH' : "PATH={$previousPath}");
        unlink($executable . '.arguments');
        unlink($executable);
        rmdir($directory);
    }
});

it('conserve le rendu PHP lorsque chafa est absent', function (): void {
    $previousPath = getenv('PATH');
    putenv('PATH=');

    try {
        $root = dirname(__DIR__, 2);
        $preview = new TerminalPreview(new Paths($root));
        $output = $preview->render($root . '/templates/header/header-basic/previews/desktop.png', 4, 2);

        expect($output)->toContain("\033[38;2;")
            ->and(substr_count($output, "\033[0m\n"))->toBe(2);
    } finally {
        putenv($previousPath === false ? 'PATH' : "PATH={$previousPath}");
    }
});