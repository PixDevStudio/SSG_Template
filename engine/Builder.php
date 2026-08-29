<?php

declare(strict_types=1);

namespace MonSsg;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;

final readonly class Builder
{
    public function __construct(
        private Paths $paths,
        private FileSystem $files,
        private FrontMatter $frontMatter,
        private DataRepository $data,
        private TemplateEngine $templates,
        private PluginManager $plugins,
    ) {
    }

    public static function create(string $root): self
    {
        $paths = new Paths($root);
        return new self($paths, new FileSystem(), new FrontMatter(), new DataRepository(), new TemplateEngine($paths), new PluginManager());
    }

    public function build(): int
    {
        $this->plugins->load($this->paths->plugins());
        $this->files->clearDirectory($this->paths->dist());
        $globalData = $this->data->load($this->paths->src('data'));
        $pagesDirectory = $this->paths->src('pages');
        $count = 0;

        if (!is_dir($pagesDirectory)) {
            throw new RuntimeException('Le dossier src/pages est introuvable.');
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pagesDirectory, RecursiveDirectoryIterator::SKIP_DOTS));
        foreach ($iterator as $page) {
            if (!$page->isFile() || $page->getExtension() !== 'html') {
                continue;
            }

            [$metadata, $body] = $this->frontMatter->parse((string) file_get_contents($page->getPathname()));
            $context = array_replace_recursive($globalData, ['page' => $metadata]);
            $content = $this->templates->render($body, $context);

            if (isset($metadata['layout'])) {
                $layoutPath = $this->paths->src('layouts/' . $metadata['layout'] . '.html');
                if (!is_file($layoutPath)) {
                    throw new RuntimeException("Layout introuvable : {$layoutPath}");
                }
                $content = $this->templates->render((string) file_get_contents($layoutPath), [...$context, 'content' => $content]);
            }

            $relative = substr($page->getPathname(), strlen($pagesDirectory) + 1);
            $output = isset($metadata['permalink']) ? ltrim((string) $metadata['permalink'], '/') : $relative;
            $content = (string) $this->plugins->apply('afterRender', $content, ['page' => $page->getPathname(), 'output' => $output]);
            $this->files->write($this->paths->dist($output), $content);
            $count++;
        }

        $this->files->copyDirectory($this->paths->public(), $this->paths->dist());
        $this->files->copyDirectory($this->paths->src('styles'), $this->paths->dist('assets/css'));
        $this->files->copyDirectory($this->paths->src('scripts'), $this->paths->dist('assets/js'));

        return $count;
    }
}