# Écrire un test Pest pas à pas

## Exemple : tester le front matter

Le comportement attendu est qu’un titre soit extrait du bloc de métadonnées.

## 1. Créer le test

Dans `tests/php/FrontMatterTest.php` :

```php
<?php

declare(strict_types=1);

use MonSsg\FrontMatter;

it('lit le titre du front matter', function (): void {
    [$metadata, $body] = (new FrontMatter())->parse(
        "---\ntitle: Accueil\n---\n<p>Bonjour</p>",
    );

    expect($metadata['title'])->toBe('Accueil')
        ->and($body)->toBe('<p>Bonjour</p>');
});
```

## 2. Exécuter uniquement ce fichier

```bash
./vendor/bin/pest tests/php/FrontMatterTest.php
```

Si le comportement n’existe pas encore, le test doit échouer pour une raison compréhensible.

## 3. Implémenter le comportement

Modifiez la classe concernée dans `engine/`, sans changer d’autres contrats.

## 4. Relancer le test ciblé

```bash
./vendor/bin/pest tests/php/FrontMatterTest.php
```

## 5. Exécuter toute la suite

```bash
./vendor/bin/pest
```

## Workflow à retenir

```text
Décrire le comportement
    ↓
Écrire le test
    ↓
Observer l’échec attendu
    ↓
Implémenter le minimum
    ↓
Valider le test ciblé puis toute la suite
```
