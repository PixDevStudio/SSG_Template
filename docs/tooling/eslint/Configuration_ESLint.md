# Configuration d’ESLint

Le SSG utilise la configuration plate d’ESLint 9 dans `eslint.config.js`.

## Base recommandée

```js
import js from "@eslint/js";
import globals from "globals";

export default [js.configs.recommended];
```

## Exclusions

Les dossiers générés ne sont pas analysés :

```js
{
  ignores: ["dist/**", "node_modules/**", "vendor/**"],
}
```

## JavaScript navigateur

```js
{
  files: ["src/scripts/**/*.js"],
  languageOptions: {
    globals: globals.browser,
  },
}
```

## Tests Vitest sous jsdom

Les tests utilisent les API Node.js et navigateur :

```js
{
  files: ["tests/js/**/*.js"],
  languageOptions: {
    globals: {
      ...globals.browser,
      ...globals.node,
    },
  },
}
```

## Vérification

```bash
npm run lint
```

Ajoutez les règles ou globales au bloc le plus précis plutôt qu’à toute la configuration.
