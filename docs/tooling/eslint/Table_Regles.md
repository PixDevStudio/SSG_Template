# Règles et commandes ESLint

## Messages fréquents

| Règle                   | Signification                        | Correction habituelle                       |
| ----------------------- | ------------------------------------ | ------------------------------------------- |
| `no-undef`              | nom utilisé mais non déclaré         | importer, déclarer ou configurer la globale |
| `no-unused-vars`        | variable déclarée mais inutilisée    | supprimer ou utiliser la variable           |
| `no-unreachable`        | code placé après une sortie certaine | corriger le flux de contrôle                |
| `no-constant-condition` | condition toujours vraie ou fausse   | corriger la condition                       |
| `no-dupe-keys`          | clé d’objet répétée                  | conserver une seule propriété               |
| `no-self-assign`        | variable assignée à elle-même        | corriger l’affectation                      |
| `no-prototype-builtins` | appel direct fragile sur un objet    | utiliser `Object.hasOwn()`                  |

## Commandes

| Commande                         | Utilité                                     |
| -------------------------------- | ------------------------------------------- |
| `npm run lint`                   | analyser les cibles du projet               |
| `npx eslint src/scripts/main.js` | analyser un fichier                         |
| `npx eslint tests/js`            | analyser un dossier                         |
| `npx eslint fichier.js --fix`    | appliquer les corrections sûres disponibles |

## Désactivation locale

En dernier recours, une règle peut être désactivée pour une ligne :

```js
legacyApi(); // eslint-disable-line no-undef
```

Ajoutez une justification et gardez l’exception locale. Une désactivation large peut masquer de nouveaux défauts.
