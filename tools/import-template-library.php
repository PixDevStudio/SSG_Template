<?php

declare(strict_types=1);

$project = dirname(__DIR__);
$library = dirname($project);
$force = in_array('--force', $argv, true);

$templates = [
    ['header', 'header-centre', 'Header centré', 'Header_Template/Header_Centre_01', '//header[1]', 'partial', 'node'],
    ['header', 'header-dashboard', 'Header dashboard', 'Header_Template/Header_Dashboard_01', '//header[1]', 'partial', 'node'],
    ['footer', 'footer-rich', 'Footer complet', 'Footer_Template/Footer', '//footer[1]', 'partial', 'node'],
    ['footer', 'footer-columns', 'Footer en colonnes', 'Footer_Template/Footer_Colonnes_01', '//footer[1]', 'partial', 'node'],
    ['sidebar', 'sidebar-compact', 'Sidebar compacte', 'SideBar_Template/Sidebar_Compacte_01', '//aside[1]', 'partial', 'node'],
    ['sidebar', 'sidebar-sections', 'Sidebar à sections', 'SideBar_Template/Sidebar_Sections_01', '//aside[1]', 'partial', 'node'],
    ['card', 'article-card', 'Cartes article', 'Cards_Templates/Card_Article_01', '//main[1]', 'component', 'section'],
    ['card', 'profile-card', 'Cartes profil', 'Cards_Templates/Card_Profile_01', '//main[1]', 'component', 'section'],
    ['card', 'stats-card', 'Cartes statistiques', 'Cards_Templates/Card_Stats_01', '//main[1]', 'component', 'section'],
    ['form', 'login-form', 'Formulaire de connexion', 'Form/Form_Connexion_01', '//main[1]', 'component', 'section'],
    ['form', 'quote-form', 'Formulaire de devis', 'Form/Form_Devis_01', '//main[1]', 'component', 'section'],
    ['form', 'newsletter-form', 'Formulaire infolettre', 'Form/Form_Infolettre_01', '//section[contains(concat(" ", normalize-space(@class), " "), " newsletter ")]', 'component', 'node'],
    ['form', 'signup-form', 'Formulaire d’inscription', 'Form/Form_Inscription_01', '//main[1]', 'component', 'section'],
    ['table', 'data-table', 'Tableau de données', 'Array_Template/Array', '//div[contains(concat(" ", normalize-space(@class), " "), " table-wrap ")]', 'component', 'node'],
    ['table', 'comparison-table', 'Tableau comparatif', 'Array_Template/Array_Comparison_01', '//main[1]', 'component', 'section'],
    ['table', 'finance-table', 'Tableau financier', 'Array_Template/Array_Finance_01', '//main[1]', 'component', 'section'],
    ['table', 'responsive-table', 'Tableau responsive', 'Array_Template/Array_Responsive_01', '//main[1]', 'component', 'section'],
];

foreach ($templates as [$category, $slug, $name, $sourceDirectory, $query, $kind, $mode]) {
    $destination = "{$project}/templates/{$category}/{$slug}";
    if (is_file("{$destination}/manifest.json") && !$force) {
        echo "Ignoré (existe) : {$category}/{$slug}\n";
        continue;
    }

    $htmlPath = "{$library}/{$sourceDirectory}/index.html";
    $cssPath = "{$library}/{$sourceDirectory}/style.css";
    if (!is_file($htmlPath) || !is_file($cssPath)) {
        throw new RuntimeException("Source incomplète : {$sourceDirectory}");
    }

    $document = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $document->loadHTML('<?xml encoding="UTF-8">' . file_get_contents($htmlPath), LIBXML_NOERROR | LIBXML_NOWARNING);
    libxml_clear_errors();
    $node = (new DOMXPath($document))->query($query)?->item(0);
    if (!$node instanceof DOMElement) {
        throw new RuntimeException("Composant introuvable : {$sourceDirectory}");
    }

    if ($mode === 'section') {
        $replacement = $document->createElement('section');
        foreach (iterator_to_array($node->attributes) as $attribute) {
            $replacement->setAttribute($attribute->name, $attribute->value);
        }
        while ($node->firstChild !== null) {
            $replacement->appendChild($node->firstChild);
        }
        $node->parentNode?->replaceChild($replacement, $node);
        $node = $replacement;
    }

    $dataKey = str_replace('-', '_', $slug);
    $data = [];
    parameterize($node, $dataKey, $data);
    $markup = $mode === 'inner' ? innerHtml($node) : (string) $document->saveHTML($node);
    $markup = trim($markup) . "\n";

    $templateType = $kind === 'partial' ? 'partials' : 'components';
    $include = $kind === 'partial' ? "{{ partial:{$slug} }}" : "{{ component:{$slug} }}";
    [$target, $position] = usage($category, $include);
    $stylesheet = "<link rel=\"stylesheet\" href=\"/assets/css/templates/{$slug}.css\">";

    $filesDirectory = "{$destination}/files";
    ensureDirectory($filesDirectory);
    file_put_contents("{$filesDirectory}/{$slug}.html", $markup);
    file_put_contents("{$filesDirectory}/{$slug}.css", (string) file_get_contents($cssPath));
    file_put_contents("{$filesDirectory}/{$dataKey}.json", json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) . "\n");

    $manifest = [
        'id' => "{$category}/{$slug}",
        'category' => $category,
        'name' => $name,
        'description' => "Version installable du template {$name}, configurable par données JSON.",
        'include' => $include,
        'usage' => [
            'target' => $target,
            'position' => $position,
            'stylesheet' => $stylesheet,
            'data' => "src/data/{$dataKey}.json",
        ],
        'files' => [
            "files/{$slug}.html" => "src/{$templateType}/{$slug}.html",
            "files/{$slug}.css" => "src/styles/templates/{$slug}.css",
            "files/{$dataKey}.json" => "src/data/{$dataKey}.json",
            'README.md' => "src/template-docs/{$category}/{$slug}/README.md",
        ],
    ];
    file_put_contents("{$destination}/manifest.json", json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) . "\n");
    file_put_contents("{$destination}/README.md", readme($category, $slug, $name, $include, $target, $position, $stylesheet, $dataKey, $data));
    echo "Importé : {$category}/{$slug}\n";
}

/** @param array<string, string> $data */
function parameterize(DOMNode $node, string $dataKey, array &$data): void
{
    if ($node instanceof DOMElement) {
        foreach (['href' => 'url', 'src' => 'image', 'alt' => 'alt', 'action' => 'action', 'placeholder' => 'placeholder', 'aria-label' => 'label', 'title' => 'title'] as $attribute => $prefix) {
            if (!$node->hasAttribute($attribute) || trim($node->getAttribute($attribute)) === '') {
                continue;
            }
            $key = nextKey($data, $prefix);
            $data[$key] = $node->getAttribute($attribute);
            $node->setAttribute($attribute, "{{{$dataKey}.{$key}}}");
        }
    }

    foreach (iterator_to_array($node->childNodes) as $child) {
        if ($child instanceof DOMText && trim($child->nodeValue ?? '') !== '') {
            $original = $child->nodeValue ?? '';
            $value = trim($original);
            $key = nextKey($data, 'text');
            $data[$key] = $value;
            preg_match('/^\s*/u', $original, $leading);
            preg_match('/\s*$/u', $original, $trailing);
            $child->nodeValue = ($leading[0] ?? '') . "{{ {$dataKey}.{$key} }}" . ($trailing[0] ?? '');
            continue;
        }
        parameterize($child, $dataKey, $data);
    }
}

/** @param array<string, string> $data */
function nextKey(array $data, string $prefix): string
{
    $index = 1;
    do {
        $key = sprintf('%s_%02d', $prefix, $index++);
    } while (array_key_exists($key, $data));
    return $key;
}

function innerHtml(DOMElement $element): string
{
    $html = '';
    foreach ($element->childNodes as $child) {
        $html .= $element->ownerDocument?->saveHTML($child) ?? '';
    }
    return $html;
}

/** @return array{string, string} */
function usage(string $category, string $include): array
{
    return match ($category) {
        'header' => ['src/layouts/default.html', "Dans <body>, juste avant {{{ content }}} : {$include}"],
        'footer' => ['src/layouts/default.html', "Dans <body>, juste après {{{ content }}} et avant </body> : {$include}"],
        'sidebar' => ['src/layouts/default.html', "Dans le conteneur de mise en page, avant le bloc qui contient {{{ content }}} : {$include}"],
        default => ['src/pages/<nom-de-page>.html', "Dans <main>, à l’endroit où le composant doit apparaître : {$include}"],
    };
}

/** @param array<string, string> $data */
function readme(string $category, string $slug, string $name, string $include, string $target, string $position, string $stylesheet, string $dataKey, array $data): string
{
    $variables = '';
    foreach ($data as $key => $value) {
        $preview = preg_replace('/\s+/u', ' ', $value) ?? $value;
        $variables .= "- `{$dataKey}.{$key}` : " . mb_substr($preview, 0, 90) . "\n";
    }
    $processing = $category === 'form' ? "\nLe SSG produit seulement le formulaire HTML. Configurez son attribut `action` vers un service ou une route serveur; ne placez aucun secret dans les données.\n" : '';
    $templateDirectory = in_array($category, ['header', 'footer', 'sidebar'], true) ? 'partials' : 'components';

    return <<<MARKDOWN
# {$name}

## Installation

```bash
./ssg templates installer {$category}/{$slug}
```

## Intégration

- Fichier cible : `{$target}`
- Emplacement : {$position}
- Inclusion : `{$include}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
{$stylesheet}
```

## Personnalisation

Modifiez `src/data/{$dataKey}.json`. Le HTML installé se trouve dans `src/{$templateDirectory}/{$slug}.html` et le CSS dans `src/styles/templates/{$slug}.css`.

Variables générées depuis le template original :

{$variables}{$processing}
## Désinstallation

```bash
./ssg templates desinstaller {$category}/{$slug}
```

La désinstallation est refusée si un fichier installé a été personnalisé.
MARKDOWN;
}

function ensureDirectory(string $directory): void
{
    if (!is_dir($directory) && !mkdir($directory, 0775, true) && !is_dir($directory)) {
        throw new RuntimeException("Impossible de créer {$directory}");
    }
}
