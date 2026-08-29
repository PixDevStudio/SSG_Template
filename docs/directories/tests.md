# Dossier tests

`tests/` sépare les tests PHP et JavaScript.

## tests/php

Les tests Pest couvrent le build, les layouts, partials, composants, données, fichiers statiques, nettoyage, erreurs et le catalogue de 23 modèles.

```bash
./vendor/bin/pest
./vendor/bin/pest tests/php/TemplateCatalogTest.php
```

La configuration est dans `phpunit.xml` et charge `engine/bootstrap.php`.

## tests/js

Les tests Vitest couvrent le JavaScript du site :

```bash
npm test
```

Ajoutez un test PHP pour toute modification du moteur et un test JS pour tout comportement JavaScript non trivial. Les tests doivent utiliser des dossiers temporaires et ne pas modifier les sources réelles.

Voir [Pest](../tooling/pest.md) et [Vitest](../tooling/vitest.md).
