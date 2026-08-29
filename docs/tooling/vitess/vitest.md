# Vitest

Vitest 3 exécute les tests JavaScript de `tests/js/` en mode non interactif.

## Dans ce dossier

- [Workflow pas à pas](Step_By_Step_Workflow.md)
- [Table des possibilités](Table_Possibilite.md)
- [Tester le DOM](Dom_Vitess/Test_Dom.md)

```bash
npm test
```

Le script correspond à `vitest run`, adapté aux validations locales et à l’intégration continue.

`vitest.config.js` sélectionne l’environnement `jsdom`. Chaque fichier de test dispose donc d’un `window`, d’un `document` et des API DOM courantes sans ouvrir de navigateur.

Pour cibler un fichier :

```bash
npx vitest run tests/js/main.test.js
```

Les tests actuels importent réellement `src/scripts/main.js` et vérifient son effet sur le document simulé. `jsdom` reste une simulation : utilisez un navigateur automatisé pour les API propres au rendu visuel ou non implémentées.

Après modification JavaScript, exécutez également `npm run lint` et `npm run format:check`.
