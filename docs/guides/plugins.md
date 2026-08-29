# Plugins

Un plugin étend le HTML final sans modifier `Builder`.

## Exemple

Créez `plugins/add-generator-meta.php` :

```php
<?php

declare(strict_types=1);

use MonSsg\PluginManager;

return static function (PluginManager $plugins): void {
    $plugins->addFilter(
        'afterRender',
        static function (string $html, array $context): string {
            return str_replace(
                '</head>',
                '<meta name="generator" content="Mon SSG">' . "\n</head>",
                $html,
            );
        },
    );
};
```

Puis lancez `./build`.

## Contrat

- chaque fichier PHP retourne une callable;
- la callable enregistre un ou plusieurs filtres;
- le seul hook disponible est `afterRender`;
- le filtre reçoit la valeur, puis le contexte;
- il retourne obligatoirement la valeur transformée;
- le contexte expose les chemins `page` et `output`.

Les plugins sont exécutés dans l’ordre de chargement des fichiers. Gardez-les déterministes et sans état persistant. Une exception arrête le build, ce qui évite de publier une sortie partielle silencieuse.
