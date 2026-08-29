# Node.js et npm

Node.js n’est pas nécessaire pour servir le site final. Il fournit les outils de test, d’analyse et de formatage pendant le développement.

## Dans ce dossier

- [Workflow pas à pas](Step_By_Step_Workflow.md)
- [Table des commandes](Table_Commandes.md)
- [Configuration package.json](Configuration_package_json.md)

```bash
npm install
npm test
npm run lint
npm run format:check
```

## package.json

Le projet est privé et utilise les modules ES. Ses dépendances de développement sont Vitest 3, jsdom 26, ESLint 9, les configurations ESLint et Prettier 3.

## Fichiers générés

- `node_modules/` : dépendances locales, à ne pas modifier;
- `package-lock.json` : versions verrouillées, à conserver avec `package.json`.

Utilisez `npm install` pour reproduire l’environnement du lockfile actuel. Lors d’une mise à jour volontaire de dépendance, contrôlez les changements du lockfile puis exécutez toute la validation.
