# PHP et Composer

## PHP

PHP 8.3 ou plus récent exécute le moteur, les commandes `build`, `clean`, `ssg` et le serveur local. Les extensions DOM, XMLWriter et mbstring sont nécessaires à l’environnement de test; une capacité d’extraction ZIP est nécessaire à Composer.

Vérification :

```bash
php --version
php -m
```

## Composer

Composer installe Pest et génère l’autoload PSR-4. Le namespace `MonSsg\` correspond au dossier `engine/`.

```bash
composer install
composer dump-autoload
composer test
```

La commande directe `./vendor/bin/pest` est recommandée pour diagnostiquer précisément les tests.

## Fichiers

- `composer.json` : contraintes, autoload et scripts;
- `composer.lock` : versions effectivement installées;
- `vendor/` : dépendances générées, à ne pas modifier;
- `engine/bootstrap.php` : autoload minimal utilisé par les commandes et les tests.

Après un changement de dépendance, conservez `composer.json` et `composer.lock` cohérents. N’ajoutez jamais `vendor/` au code source.
