# Rappel — Tester le DOM avec Vitest + jsdom

Vitest fonctionne avec **Node.js**, qui ne possède pas de DOM par défaut. Pour tester `document`, `querySelector()`, `createElement()`, les clics, etc., on peut utiliser **jsdom** pour simuler un navigateur.

## 1. Configuration du SSG

Le fichier `vitest.config.js` active déjà jsdom pour tous les tests :

```js
export default defineConfig({
  test: {
    environment: "jsdom",
  },
});
```

Aucune directive supplémentaire n’est nécessaire dans `tests/js/`.

## 2. Activer jsdom pour un seul fichier

Dans un autre projet configuré avec l’environnement Node.js, ajoutez tout en haut du fichier concerné :

```js
// @vitest-environment jsdom
```

Puis importer Vitest normalement :

```js
// @vitest-environment jsdom

import { expect, test } from "vitest";
```

Cette directive remplace l’environnement uniquement pour ce fichier.

## 3. Lancer les tests

```bash
npm test
```

Ou pour tester seulement un dossier :

```bash
npx vitest run 04-Dom
```

## À retenir

```text
Vitest + Node
     ↓
Pas de DOM ❌
     ↓
Installer jsdom et configurer Vitest
     ↓
document, querySelector(), createElement(), click(), etc. ✅
```
