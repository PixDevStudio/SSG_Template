# API interne

Les classes utilisent le namespace `MonSsg` et sont chargées depuis `engine/`.

## Builder

- `Builder::create(string $root): self` construit le pipeline.
- `build(): int` reconstruit `dist/` et retourne le nombre de pages.

## Cli

- `run(array $arguments): int` traite les arguments de `./pix-ssg` et retourne un code de sortie.

## FrontMatter

- `parse(string $contents): array` retourne `[métadonnées, contenu]`.

## TemplateEngine

- `render(string $template, array $data): string` résout inclusions et variables.

## DataRepository

- `load(string $directory): array` charge les fichiers JSON et PHP.

## PluginManager

- `addFilter(string $hook, callable $filter): void` enregistre un filtre.
- `apply(string $hook, mixed $value, array $context = []): mixed` applique les filtres.
- `load(string $directory): void` charge les plugins PHP.

## TemplateCatalog

- `all(): array` retourne les manifestes validés.
- `get(string $id): array` retourne un manifeste.
- `install(string $id): void` installe et enregistre les empreintes.
- `remove(string $id): array` retire les fichiers inchangés et retourne leur liste.

## Paths

- `src(string $path = ''): string`
- `public(string $path = ''): string`
- `dist(string $path = ''): string`
- `plugins(string $path = ''): string`

## FileSystem

- `ensureDirectory(string $directory): void`
- `write(string $path, string $contents): void`
- `copyDirectory(string $source, string $destination): void`
- `clearDirectory(string $directory): void`

Les erreurs de contrat et d’I/O sont généralement signalées par `RuntimeException`. Ces classes constituent une API interne : ajoutez des tests avant de changer une signature ou une règle de validation.
