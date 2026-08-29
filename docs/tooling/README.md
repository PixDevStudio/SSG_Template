# Outils de développement

Le site généré n’a besoin d’aucun runtime côté serveur. Les outils suivants servent à développer et valider le générateur :

| Outil                                    | Rôle                        | Configuration      |
| ---------------------------------------- | --------------------------- | ------------------ |
| [PHP](php-composer/php-composer.md)      | exécution du moteur         | `composer.json`    |
| [Composer](php-composer/php-composer.md) | dépendances et autoload PHP | `composer.json`    |
| [Pest](pest/pest.md)                     | tests PHP                   | `phpunit.xml`      |
| [Node.js et npm](node-npm/node-npm.md)   | dépendances et scripts JS   | `package.json`     |
| [Vitest et jsdom](vitess/vitest.md)      | tests JavaScript et DOM     | `vitest.config.js` |
| [ESLint](eslint/eslint.md)               | analyse statique JavaScript | `eslint.config.js` |
| [Prettier](prettier/prettier.md)         | formatage                   | `.prettierignore`  |

Installation globale :

```bash
./pix-install
```

Validation complète :

```bash
./vendor/bin/pest
npm test
npm run lint
npm run format:check
```
