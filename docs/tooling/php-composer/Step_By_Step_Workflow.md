# Workflow PHP et Composer pas à pas

## 1. Vérifier PHP

```bash
php --version
php -m
```

Le SSG exige PHP 8.3 ou plus récent. Les tests utilisent notamment DOM, XMLWriter et mbstring.

## 2. Installer les dépendances

```bash
composer install
```

Composer lit `composer.json`, respecte les versions de `composer.lock` et crée `vendor/`.

## 3. Charger une classe du moteur

Les classes de `engine/` utilisent le namespace `MonSsg` :

```php
<?php

use MonSsg\Builder;

require __DIR__ . '/vendor/autoload.php';

$pages = Builder::create(__DIR__)->build();
```

Composer associe automatiquement `MonSsg\Builder` à `engine/Builder.php` grâce à PSR-4.

## 4. Après l’ajout d’une classe

```bash
composer dump-autoload
./vendor/bin/pest
```

Le premier appel régénère les métadonnées d’autoload. Le second vérifie le comportement.

## 5. Ajouter une dépendance de développement

```bash
composer require --dev fournisseur/paquet
```

Examinez ensuite `composer.json` et `composer.lock`, puis exécutez les tests.

## Workflow à retenir

```text
Vérifier PHP
    ↓
Installer avec Composer
    ↓
Modifier le code
    ↓
Régénérer l’autoload si nécessaire
    ↓
Exécuter Pest
```
