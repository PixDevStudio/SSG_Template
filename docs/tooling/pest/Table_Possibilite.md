# Possibilités et matchers Pest

Pest utilise les assertions de PHPUnit avec une syntaxe fluide.

## Matchers courants

| Matcher           | Utilité                            | Exemple                                             |
| ----------------- | ---------------------------------- | --------------------------------------------------- |
| `toBe()`          | identité ou valeur scalaire exacte | `expect($count)->toBe(2)`                           |
| `toEqual()`       | égalité de contenu                 | `expect($data)->toEqual(['id' => 1])`               |
| `toBeTrue()`      | valeur strictement vraie           | `expect($valid)->toBeTrue()`                        |
| `toBeFalse()`     | valeur strictement fausse          | `expect($valid)->toBeFalse()`                       |
| `toBeNull()`      | valeur nulle                       | `expect($value)->toBeNull()`                        |
| `toContain()`     | élément ou texte présent           | `expect($html)->toContain('<main>')`                |
| `toHaveCount()`   | taille d’un tableau                | `expect($pages)->toHaveCount(3)`                    |
| `toBeArray()`     | type tableau                       | `expect($data)->toBeArray()`                        |
| `toBeFile()`      | chemin vers un fichier             | `expect($path)->toBeFile()`                         |
| `toBeDirectory()` | chemin vers un dossier             | `expect($path)->toBeDirectory()`                    |
| `toThrow()`       | exception attendue                 | `expect($action)->toThrow(RuntimeException::class)` |

## Organisation

| Fonction           | Rôle                         |
| ------------------ | ---------------------------- |
| `it()` ou `test()` | déclarer un comportement     |
| `describe()`       | regrouper des comportements  |
| `beforeEach()`     | préparer chaque test         |
| `afterEach()`      | nettoyer après chaque test   |
| `beforeAll()`      | préparer une fois le fichier |
| `afterAll()`       | nettoyer une fois le fichier |

## Cas à couvrir

- chemin nominal;
- valeur vide ou absente;
- entrée invalide;
- frontière numérique;
- fichier inexistant;
- collision ou refus attendu;
- préservation des sources après une erreur.
