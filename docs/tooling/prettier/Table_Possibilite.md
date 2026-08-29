# Possibilités de Prettier

## Commandes

| Commande                                     | Effet                                    |
| -------------------------------------------- | ---------------------------------------- |
| `npx prettier --check .`                     | vérifier tout le projet                  |
| `npx prettier --write .`                     | formater tout le projet                  |
| `npx prettier --check fichier.md`            | vérifier un fichier                      |
| `npx prettier --write "docs/**/*.md"`        | formater les Markdown de `docs/`         |
| `npx prettier --list-different .`            | lister seulement les fichiers différents |
| `npx prettier --find-config-path fichier.js` | trouver la configuration appliquée       |

## Types courants pris en charge

| Type       | Extensions usuelles   |
| ---------- | --------------------- |
| JavaScript | `.js`, `.mjs`, `.cjs` |
| JSON       | `.json`               |
| Markdown   | `.md`                 |
| HTML       | `.html`               |
| CSS        | `.css`                |
| YAML       | `.yml`, `.yaml`       |

Prettier ne formate pas PHP dans ce projet, car aucun plugin PHP n’est installé.

## Prettier et ESLint

| Outil    | Responsabilité                                     |
| -------- | -------------------------------------------------- |
| Prettier | présentation stable du code et de la documentation |
| ESLint   | erreurs probables et règles de qualité JavaScript  |

Exécutez les deux : un fichier bien formaté peut toujours contenir une erreur de code.
