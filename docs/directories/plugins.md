# Dossier plugins

`plugins/` contient les extensions PHP chargées avant chaque build. Chaque fichier `*.php` doit retourner une fonction qui reçoit `PluginManager`.

```php
<?php

use MonSsg\PluginManager;

return static function (PluginManager $plugins): void {
    $plugins->addFilter(
        'afterRender',
        static fn (string $html, array $context): string => $html,
    );
};
```

Le hook `afterRender` reçoit le HTML final et un contexte contenant `page` et `output`. Il doit retourner la nouvelle valeur.

Utilisez un plugin pour une transformation transversale du HTML. N’utilisez pas un plugin pour modifier les fichiers sources ou écrire directement dans `dist/`.

Voir [guide des plugins](../guides/plugins.md).
