# Vitest

Vitest 3 exécute les tests JavaScript de `tests/js/` en mode non interactif.

```bash
npm test
```

Le script correspond à `vitest run`, adapté aux validations locales et à l’intégration continue.

Pour cibler un fichier :

```bash
npx vitest run tests/js/main.test.js
```

Les tests actuels valident le comportement de `src/scripts/main.js`. Importez les fonctions testables quand c’est pertinent; pour un script qui agit directement sur le document, préparez explicitement l’environnement nécessaire au test plutôt que de dépendre du navigateur local.

Après modification JavaScript, exécutez également `npm run lint` et `npm run format:check`.
