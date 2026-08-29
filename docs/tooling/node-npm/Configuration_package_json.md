# Configuration package.json

`package.json` décrit les outils JavaScript du SSG.

## Modules ES

```json
{
  "type": "module"
}
```

Les fichiers de configuration peuvent utiliser `import` et `export`.

## Scripts

```json
{
  "scripts": {
    "test": "vitest run",
    "lint": "eslint src/scripts tests/js",
    "format": "prettier --write .",
    "format:check": "prettier --check ."
  }
}
```

Les scripts donnent une interface stable même si les options internes changent.

## Dépendances de développement

Le projet utilise Vitest, jsdom, ESLint, les globales ESLint et Prettier. Elles sont placées dans `devDependencies` car le site généré n’en a pas besoin.

## Lockfile

`package-lock.json` enregistre l’arbre exact des versions et leurs empreintes d’intégrité. Il doit être versionné avec `package.json`.

## Vérification

```bash
npm install
npm ls --depth=0
npm test
npm run lint
npm run format:check
```
