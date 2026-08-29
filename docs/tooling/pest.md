# Pest

Pest 4.7 exécute la suite PHP située dans `tests/php/`.

```bash
./vendor/bin/pest
```

Exécuter un fichier ou filtrer un test :

```bash
./vendor/bin/pest tests/php/BuilderTest.php
./vendor/bin/pest --filter="signale un layout introuvable"
```

## Configuration PHPUnit

Pest s’appuie sur `phpunit.xml` :

- `engine/bootstrap.php` charge les classes;
- `tests/php` est la suite `Mon SSG`;
- `.phpunit.cache` reçoit le cache local;
- les couleurs sont activées.

## Écrire un test

Les tests utilisent les fonctions Pest `it`, `beforeEach`, `afterEach` et `expect`. Pour le build et le catalogue, créez un projet temporaire, exécutez le comportement puis supprimez-le. Un test ne doit pas dépendre de l’état de `dist/` ou altérer les sources réelles.

Ajoutez un test de succès et, quand le contrat comporte un refus, un test de l’erreur attendue.
