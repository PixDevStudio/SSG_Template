<?php

declare(strict_types=1);

namespace MonSsg;

final readonly class TemplateMarkdownCatalog
{
    public const RELATIVE_PATH = 'templates/CATALOGUE.md';

    public function __construct(private Paths $paths, private FileSystem $files)
    {
    }

    /** @param list<array<string, mixed>> $templates */
    public function write(array $templates): string
    {
        $labels = [
            'card' => 'Cartes',
            'footer' => 'Pieds de page',
            'form' => 'Formulaires',
            'header' => 'En-têtes',
            'sidebar' => 'Barres latérales',
            'table' => 'Tableaux',
        ];
        $markdown = "# Catalogue des templates\n\n";
        $markdown .= "Ce catalogue présente les aperçus, les instructions d’intégration et les commandes des templates disponibles.\n\n";
        $currentCategory = null;

        foreach ($templates as $template) {
            $category = (string) $template['category'];
            if ($currentCategory !== $category) {
                $currentCategory = $category;
                $markdown .= '## ' . ($labels[$category] ?? ucfirst($category)) . "\n\n";
            }

            $markdown .= $this->templateSection($template);
        }

        $this->files->write($this->paths->root . '/' . self::RELATIVE_PATH, rtrim($markdown) . "\n");

        return self::RELATIVE_PATH;
    }

    /** @param array<string, mixed> $template */
    private function templateSection(array $template): string
    {
        $id = (string) $template['id'];
        $name = (string) $template['name'];
        $description = (string) $template['description'];
        $include = (string) $template['include'];
        $usage = $template['usage'];
        $target = (string) $usage['target'];
        $position = (string) $usage['position'];
        $stylesheet = preg_replace('~\s*/?>$~', ' />', (string) $usage['stylesheet']) ?? (string) $usage['stylesheet'];
        $data = (string) $usage['data'];

        return <<<MARKDOWN
### {$name}

`{$id}`

{$description}

**Desktop**

![{$name} sur desktop]({$id}/previews/desktop.png)

**Tablette**

![{$name} sur tablette]({$id}/previews/tablette.png)

**Mobile**

![{$name} sur mobile]({$id}/previews/mobile.png)

**Installer**

```bash
./pix-ssg templates installer {$id}
```

**Intégrer**

- Fichier cible : `{$target}`
- Emplacement : {$position}
- Données : `{$data}`

```html
{$include}
{$stylesheet}
```

**Désinstaller**

```bash
./pix-ssg templates desinstaller {$id}
```

Documentation détaillée : [`{$id}/README.md`]({$id}/README.md)

---


MARKDOWN;
    }
}