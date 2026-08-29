# Configuration de Composer

Le fichier `composer.json` définit le runtime, Pest, l’autoload et les scripts.

## Version de PHP

```json
{
  "require": {
    "php": ">=8.3"
  }
}
```

Composer refuse une plateforme PHP trop ancienne.

## Dépendances de développement

```json
{
  "require-dev": {
    "pestphp/pest": "^4.7"
  }
}
```

Pest n’est pas nécessaire au site statique publié.

## Autoload PSR-4

```json
{
  "autoload": {
    "psr-4": {
      "MonSsg\\": "engine/"
    }
  }
}
```

Une classe `MonSsg\Builder` se trouve donc dans `engine/Builder.php`.

## Script de test

```json
{
  "scripts": {
    "test": "pest"
  }
}
```

Il permet d’exécuter `composer test`.

## Validation

```bash
composer validate
composer install
./vendor/bin/pest
```

Conservez `composer.lock` dans le projet afin que toutes les installations utilisent les mêmes versions.
