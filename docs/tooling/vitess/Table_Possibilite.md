# Possibilités de Vitest

## Façons d’importer dans `index.test.js`

En JavaScript moderne avec les **ES Modules**, tu as plusieurs façons d’importer du code depuis ton `index.js`.

| Type d'import                     | Dans `index.js`                                                | Dans `index.test.js`                                      | Utilisation dans le test    | Quand l'utiliser                                                             |
| --------------------------------- | -------------------------------------------------------------- | --------------------------------------------------------- | --------------------------- | ---------------------------------------------------------------------------- |
| **Import nommé** ⭐               | `export function square() {}`                                  | `import { square } from "./index.js";`                    | `square(5)`                 | Recommandé : importer seulement ce dont tu as besoin                         |
| **Plusieurs imports nommés**      | `export function square() {}` et `export function double() {}` | `import { square, double } from "./index.js";`            | `square(5)` et `double(5)`  | Plusieurs fonctions du même fichier                                          |
| **Importer tout**                 | Plusieurs `export`                                             | `import * as functions from "./index.js";`                | `functions.square(5)`       | Beaucoup de fonctions à tester                                               |
| **Import avec alias**             | `export function square() {}`                                  | `import { square as calculateSquare } from "./index.js";` | `calculateSquare(5)`        | Renommer une fonction dans le fichier de test                                |
| **Import par défaut**             | `export default function square() {}`                          | `import square from "./index.js";`                        | `square(5)`                 | Quand le fichier possède un export principal                                 |
| **Import par défaut + nommé**     | `export default ...` + `export ...`                            | `import calculate, { square } from "./index.js";`         | `calculate()` / `square(5)` | Fichier avec un export principal + d'autres exports                          |
| **Importer seulement le fichier** | Peu importe                                                    | `import "./index.js";`                                    | —                           | Exécuter le fichier, **mais ne donne pas accès directement à ses fonctions** |

## Cas classiques à prévoir

| Type de cas              | Exemple     |
| ------------------------ | ----------- |
| Cas normal               | `20`        |
| Cas limite               | `18`        |
| Juste sous la limite     | `17`        |
| Juste au-dessus          | `19`        |
| Valeur minimale          | `0`         |
| Valeur maximale réaliste | `120`       |
| Valeur négative          | `-1`        |
| Mauvais type             | `"18"`      |
| Valeur vide              | `""`        |
| `null`                   | `null`      |
| `undefined`              | `undefined` |
| Décimal                  | `18.5`      |

## Tester des plages, limites et cas précis

| Ce que tu veux vérifier     | Exemple                                                                          | Matcher conseillé          |
| --------------------------- | -------------------------------------------------------------------------------- | -------------------------- |
| Valeur exactement égale     | `expect(age).toBe(18)`                                                           | `toBe()`                   |
| Valeur supérieure à         | `expect(age).toBeGreaterThan(18)`                                                | `toBeGreaterThan()`        |
| Valeur supérieure ou égale  | `expect(age).toBeGreaterThanOrEqual(18)`                                         | `toBeGreaterThanOrEqual()` |
| Valeur inférieure à         | `expect(age).toBeLessThan(65)`                                                   | `toBeLessThan()`           |
| Valeur inférieure ou égale  | `expect(age).toBeLessThanOrEqual(65)`                                            | `toBeLessThanOrEqual()`    |
| Valeur entre deux nombres   | `expect(age).toBeGreaterThanOrEqual(18)` + `expect(age).toBeLessThanOrEqual(65)` | 2 matchers                 |
| Valeur hors d'une plage     | `expect(age < 18                                                                 |                            | age > 65).toBe(true)` | `toBe()` |
| Valeur différente           | `expect(age).not.toBe(18)`                                                       | `.not.toBe()`              |
| Plusieurs valeurs possibles | `expect([18, 19, 20]).toContain(age)`                                            | `toContain()`              |
| Limite exacte               | `expect(ageCheck(18)).toBe(true)`                                                | `toBe()`                   |
| Juste sous la limite        | `expect(ageCheck(17)).toBe(false)`                                               | `toBe()`                   |
| Juste au-dessus             | `expect(ageCheck(19)).toBe(true)`                                                | `toBe()`                   |

## Vérifier les types

| Type attendu | Exemple                                      |
| ------------ | -------------------------------------------- |
| Number       | `expect(age).toBeTypeOf("number")`           |
| String       | `expect(name).toBeTypeOf("string")`          |
| Boolean      | `expect(result).toBeTypeOf("boolean")`       |
| Function     | `expect(ageCheck).toBeTypeOf("function")`    |
| Object       | `expect(user).toBeTypeOf("object")`          |
| Array        | `expect(Array.isArray(products)).toBe(true)` |

## Les vérifications courantes (String bool etc.)

| Ce que je teste  | Exemple                                  | Matcher             |
| ---------------- | ---------------------------------------- | ------------------- |
| Nombre           | `expect(age).toBe(18)`                   | `toBe()`            |
| String           | `expect(name).toBe("Fred")`              | `toBe()`            |
| Boolean          | `expect(isAdult).toBe(true)`             | `toBe()`            |
| Null             | `expect(value).toBeNull()`               | `toBeNull()`        |
| Undefined        | `expect(value).toBeUndefined()`          | `toBeUndefined()`   |
| Vrai             | `expect(value).toBeTruthy()`             | `toBeTruthy()`      |
| Faux             | `expect(value).toBeFalsy()`              | `toBeFalsy()`       |
| Plus grand       | `expect(age).toBeGreaterThan(17)`        | `toBeGreaterThan()` |
| Plus petit       | `expect(age).toBeLessThan(65)`           | `toBeLessThan()`    |
| Tableau contient | `expect(products).toContain("Clavier")`  | `toContain()`       |
| Objet            | `expect(user).toEqual({ name: "Fred" })` | `toEqual()`         |
| String contient  | `expect(message).toContain("Bonjour")`   | `toContain()`       |

## Les principaux matchers Vitest

| Matcher                    | Quand l'utiliser                                                 | Exemple                                        |
| -------------------------- | ---------------------------------------------------------------- | ---------------------------------------------- |
| `toBe()`                   | Valeur exacte : number, string, boolean                          | `expect(age).toBe(33)`                         |
| `toEqual()`                | Comparer le contenu d'un objet ou tableau                        | `expect(user).toEqual({ name: "Fred" })`       |
| `toStrictEqual()`          | Comme `toEqual()`, mais comparaison plus stricte de la structure | `expect(user).toStrictEqual({ name: "Fred" })` |
| `toBeTruthy()`             | Vérifier qu'une valeur est considérée comme vraie                | `expect(user).toBeTruthy()`                    |
| `toBeFalsy()`              | Vérifier qu'une valeur est considérée comme fausse               | `expect(value).toBeFalsy()`                    |
| `toBeNull()`               | Vérifier exactement `null`                                       | `expect(user).toBeNull()`                      |
| `toBeUndefined()`          | Vérifier exactement `undefined`                                  | `expect(value).toBeUndefined()`                |
| `toBeDefined()`            | Vérifier que la valeur n'est pas `undefined`                     | `expect(name).toBeDefined()`                   |
| `toBeNaN()`                | Vérifier `NaN`                                                   | `expect(result).toBeNaN()`                     |
| `toBeTypeOf()`             | Vérifier le type JS                                              | `expect(age).toBeTypeOf("number")`             |
| `toBeGreaterThan()`        | Nombre supérieur à                                               | `expect(age).toBeGreaterThan(18)`              |
| `toBeGreaterThanOrEqual()` | Nombre supérieur ou égal à                                       | `expect(age).toBeGreaterThanOrEqual(18)`       |
| `toBeLessThan()`           | Nombre inférieur à                                               | `expect(age).toBeLessThan(65)`                 |
| `toBeLessThanOrEqual()`    | Nombre inférieur ou égal à                                       | `expect(age).toBeLessThanOrEqual(65)`          |
| `toBeCloseTo()`            | Nombres décimaux / calculs flottants                             | `expect(0.1 + 0.2).toBeCloseTo(0.3)`           |
| `toContain()`              | Tableau ou string contenant une valeur                           | `expect(products).toContain("Clavier")`        |
| `toHaveLength()`           | Longueur d'un tableau ou string                                  | `expect(products).toHaveLength(3)`             |
| `toHaveProperty()`         | Vérifier une propriété d'objet                                   | `expect(user).toHaveProperty("name")`          |
| `toMatch()`                | Vérifier une string avec texte ou RegExp                         | `expect(email).toMatch(/@/)`                   |
| `toThrow()`                | Vérifier qu'une fonction lance une erreur                        | `expect(() => divide(5, 0)).toThrow()`         |
| `toBeInstanceOf()`         | Vérifier qu'un objet vient d'une classe                          | `expect(error).toBeInstanceOf(Error)`          |
