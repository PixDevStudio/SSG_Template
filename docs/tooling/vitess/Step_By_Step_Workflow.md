# Tester une fonction pas à pas

## Exemple : créer une fonction qui calcule le carré d'un nombre

Imaginons cet exercice :

> Créer une fonction `square()` qui reçoit un nombre et retourne son carré.

Par exemple :

```text
square(2) → 4
square(5) → 25
square(-3) → 9
```

Avant même d'écrire la fonction, on peut commencer par écrire les tests.

## 1. Créer les fichiers

Dans ton exercice :

```text
01-Basic/
├── index.html
├── index.js
└── index.test.js
```

On sépare les responsabilités :

```text
index.js
→ notre vrai code

index.test.js
→ les tests de notre code
```

## 2. Écrire le test en premier

Dans `index.test.js` :

```js
import { expect, test } from "vitest";
import { square } from "./index.js";

test("calcule le carré d'un nombre", () => {
  expect(square(5)).toBe(25);
});
```

À ce moment-là, notre fonction `square()` n'existe même pas encore.

Si on lance `npm test`, le test va échouer. C'est normal : on vient d'écrire **ce qu'on veut que notre code fasse** avant de l'implémenter.

## 3. Créer la fonction

Dans `index.js` :

```js
export function square(number) {
  return number * number;
}
```

Le mot : `export` permet à un autre fichier, ici `index.test.js`, d'importer notre fonction. Le test peut donc faire :

```js
import { square } from "./index.js";
```

## 4. Relancer les tests

Depuis le dossier parent :

```bash
npx vitest run
npx vitest run 01-Basic
```

La première commande exécute tous les tests une fois. La seconde cible le dossier `01-Basic`. Vitest exécute `square(5)`, obtient `25`, puis compare le résultat avec `expect(25).toBe(25)`.

## 5. Ajouter plusieurs cas

Un seul test ne garantit pas que notre fonction fonctionne dans toutes les situations.
On peut ajouter :

```js
test("calcule le carré d'un nombre positif", () => {
  expect(square(5)).toBe(25);
});

test("calcule le carré de zéro", () => {
  expect(square(0)).toBe(0);
});

test("calcule le carré d'un nombre négatif", () => {
  expect(square(-3)).toBe(9);
});
```

On vérifie maintenant plusieurs comportements.

## Structure générale d'un test

La structure la plus fréquente est :

```js
test("description", () => {
  expect(valeurObtenue).matcher(valeurAttendue);
});
```

Par exemple avec une fonction qui additionne:

```js
test("additionne deux nombres", () => {
  expect(add(2, 3)).toBe(5);
});
```

On peut le lire comme :

```text
test(...)
│
├── ce que je veux vérifier
│
└── expect(...)
      │
      ├── valeur obtenue
      │
      └── valeur attendue
```

### `toBe()` vs `toEqual()`

Pour les valeurs simples :

```js
expect(10).toBe(10);
expect("Fred").toBe("Fred");
expect(true).toBe(true);
```

Pour comparer le contenu d'un objet ou d'un tableau, utilise généralement :

```js
expect(user).toEqual({
  name: "Fred",
  age: 33,
});
```

---

## Workflow à retenir

Quand tu veux créer une fonction :

```text
1. Je décide ce que la fonction doit faire
          ↓
2. Je crée index.test.js
          ↓
3. J'écris un test
          ↓
4. Je lance Vitest
          ↓
5. Le test échoue
          ↓
6. J'écris ma fonction dans index.js
          ↓
7. Je relance Vitest
          ↓
8. Le test réussit
```

Exemple complet :

**`index.js`**

```js
export function square(number) {
  return number * number;
}
```

**`index.test.js`**

```js
import { expect, test } from "vitest";
import { square } from "./index.js";

test("retourne le carré d'un nombre", () => {
  expect(square(5)).toBe(25);
});
```

Puis :

```bash
npm test
```

C'est la base : **on écrit une attente, on exécute notre fonction, puis Vitest vérifie automatiquement si le résultat obtenu correspond au résultat attendu.**
