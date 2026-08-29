# Commandes Node.js et npm

| Commande                        | Utilité                                    |
| ------------------------------- | ------------------------------------------ |
| `node --version`                | afficher la version de Node.js             |
| `npm --version`                 | afficher la version de npm                 |
| `npm install`                   | installer les dépendances du projet        |
| `npm install --save-dev paquet` | ajouter un outil de développement          |
| `npm uninstall paquet`          | retirer un paquet                          |
| `npm test`                      | exécuter Vitest une fois                   |
| `npm run lint`                  | exécuter ESLint                            |
| `npm run format`                | appliquer Prettier                         |
| `npm run format:check`          | vérifier Prettier sans écrire              |
| `npm ls --depth=0`              | lister les dépendances directes installées |
| `npm outdated`                  | afficher les dépendances dépassées         |
| `npm audit`                     | rechercher les vulnérabilités connues      |
| `npm run`                       | lister les scripts disponibles             |

## npm install ou npm ci

- `npm install` installe et peut actualiser le lockfile si `package.json` a changé;
- `npm ci` exige un lockfile cohérent, supprime `node_modules/` puis reproduit exactement l’installation.

Utilisez `npm ci` dans une intégration continue. Utilisez `npm install` pour ajouter ou retirer des dépendances pendant le développement.
