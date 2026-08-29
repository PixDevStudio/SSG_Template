# ESLint

ESLint 9 analyse le JavaScript source et ses tests.

```bash
npm run lint
```

La configuration plate `eslint.config.js` applique :

- les règles recommandées d’ESLint;
- les globales navigateur à `src/scripts/**/*.js`;
- les globales Node.js à `tests/js/**/*.js`;
- l’exclusion de `dist/`, `node_modules/` et `vendor/`.

Corrigez les erreurs dans la source plutôt que d’ajouter une désactivation globale. Une exception locale n’est justifiée que si la règle ne représente réellement pas le contrat du code, et doit rester la plus étroite possible.

ESLint détecte des erreurs de code; Prettier gère la présentation. Les deux contrôles sont complémentaires.
