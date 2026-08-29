# Dossier engine

`engine/` contient le cœur PHP. Le site peut être développé sans modifier ce dossier.

## Classes

- `Builder.php` : orchestre le pipeline complet.
- `Cli.php` : traite `./ssg new page` et le catalogue.
- `FrontMatter.php` : analyse les métadonnées simples.
- `TemplateEngine.php` : rend variables, partials et composants.
- `DataRepository.php` : charge JSON et PHP depuis `src/data/`.
- `PluginManager.php` : charge les extensions et applique `afterRender`.
- `TemplateCatalog.php` : installe et désinstalle les modèles avec suivi SHA-256.
- `Paths.php` : centralise les chemins du projet.
- `FileSystem.php` : crée, copie, écrit et nettoie les fichiers.
- `bootstrap.php` : charge automatiquement les classes `MonSsg\`.

## Modifier le moteur

1. ajoutez ou modifiez une classe dans `engine/`;
2. conservez le namespace `MonSsg`;
3. ajoutez un test dans `tests/php/`;
4. exécutez `./vendor/bin/pest`;
5. vérifiez `./clean && ./build`.

Pour modifier uniquement le HTML final, préférez `src/` ou un plugin. Voir [API interne](../reference/api.md).
