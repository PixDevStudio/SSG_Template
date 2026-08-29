# Fichiers à la racine du SSG

Cette page explique les fichiers placés directement à la racine du projet. Ils servent de points d’entrée, de configurations, de manifestes de dépendances ou de documents de référence.

## Vue d’ensemble

| Fichier             | Rôle                                            | Modification manuelle    |
| ------------------- | ----------------------------------------------- | ------------------------ |
| `.gitignore`        | exclure les fichiers générés de Git             | Oui                      |
| `.prettierignore`   | exclure certains fichiers de Prettier           | Oui                      |
| `CHANGELOG.md`      | documenter les changements de chaque version    | Oui                      |
| `VERSION`           | déclarer la version publique courante           | Oui, lors d’une release  |
| `pix-bootstrap`     | télécharger et installer une nouvelle copie     | Oui, avec prudence       |
| `pix-build`         | générer le site dans `dist/`                    | Oui, avec tests          |
| `pix-check`         | exécuter tous les contrôles                     | Oui, avec tests          |
| `pix-clean`         | vider uniquement `dist/`                        | Oui, avec tests          |
| `pix-dev`           | lancer le serveur et surveiller les sources     | Oui, avec prudence       |
| `pix-help`          | afficher toutes les commandes publiques         | Oui                      |
| `pix-install`       | vérifier l’environnement et installer le projet | Oui, avec prudence       |
| `pix-ssg`           | exposer la CLI du générateur                    | Oui, avec tests          |
| `pix-upgrade`       | mettre à jour le SSG depuis Git                 | Oui, avec prudence       |
| `composer.json`     | déclarer PHP, Pest et l’autoload                | Oui                      |
| `composer.lock`     | verrouiller les versions PHP                    | Non, généré par Composer |
| `package.json`      | déclarer les outils JavaScript et leurs scripts | Oui                      |
| `package-lock.json` | verrouiller les versions npm                    | Non, généré par npm      |
| `phpunit.xml`       | configurer Pest et PHPUnit                      | Oui                      |
| `eslint.config.js`  | configurer l’analyse JavaScript                 | Oui                      |
| `vitest.config.js`  | configurer Vitest et jsdom                      | Oui                      |
| `README.md`         | présenter le projet et son usage rapide         | Oui                      |
| `SPEC.md`           | définir le contrat technique du SSG             | Oui                      |

## Fichiers d’exclusion

### `.gitignore`

Ce fichier empêche Git de suivre les sorties et dépendances locales :

- le contenu généré de `dist/`, sauf `dist/.gitkeep`;
- `node_modules/` et `vendor/`;
- `.tools/`, qui peut contenir le Composer local sous WSL;
- `.ssg/`, qui contient le registre des templates installés;
- `.phpunit.cache/`, produit par PHPUnit.

Une exclusion Git ne supprime aucun fichier. Elle indique seulement à Git de ne pas le versionner.

### `.prettierignore`

Prettier ignore :

- `dist/`, `node_modules/` et `vendor/`;
- `composer.lock` et `package-lock.json`.

Ces fichiers sont générés ou maintenus par d’autres outils. Les reformater manuellement créerait du bruit et pourrait endommager un lockfile.

## Commandes exécutables

Les fichiers `pix-build`, `pix-clean` et `pix-ssg` sont des scripts PHP exécutables. Leur première ligne, `#!/usr/bin/env php`, permet de les lancer directement avec `./commande`.

### `pix-build`

`pix-build` charge `engine/bootstrap.php`, crée `MonSsg\Builder` et exécute `build()`. Il affiche le nombre de pages générées et la destination `dist/`.

En cas d’exception, il écrit le message sur la sortie d’erreur et termine avec le code `1`.

```bash
./pix-build
```

### `pix-clean`

`pix-clean` charge `MonSsg\FileSystem` et vide uniquement `dist/`. Il ne touche pas à `src/`, `public/`, `templates/` ou `plugins/`.

```bash
./pix-clean
```

### `pix-ssg`

`pix-ssg` construit `MonSsg\Cli` avec `Paths` et `FileSystem`, puis lui transmet les arguments du terminal sans le nom de la commande.

```bash
./pix-ssg new page contact
./pix-ssg templates
```

La classe `engine/Cli.php` décide du comportement réel des sous-commandes.

### `pix-dev`

`pix-dev` est un script Bash qui :

1. refuse de démarrer si le port 8000 est occupé;
2. exécute un premier build;
3. lance le serveur PHP sur `127.0.0.1:8000` avec `dist/` comme racine;
4. calcule une empreinte des fichiers de `src/`, `public/` et `plugins/`;
5. reconstruit le site lorsqu’une modification est détectée;
6. arrête proprement le serveur avec `Ctrl+C`.

```bash
./pix-dev
```

Le script utilise `set -euo pipefail` afin d’arrêter l’exécution en cas d’erreur, de variable absente ou d’échec dans un pipeline.

### `pix-install`

`pix-install` prépare une première installation. Il vérifie :

- Bash et PHP 8.3 ou plus récent;
- les extensions PHP DOM, XMLWriter et mbstring;
- PHP ZIP, `unzip` ou `7z`;
- Node.js, npm et Composer.

Il peut proposer l’installation des paquets système manquants. Sous WSL, si Composer vient de Windows, il télécharge un PHAR local après vérification de sa signature SHA-384.

Le script exécute ensuite Composer et npm, contrôle Pest, Vitest, ESLint et Prettier, crée les dossiers requis puis rend les commandes exécutables.

```bash
./pix-install
```

### `pix-upgrade`

`pix-upgrade` vérifie la copie Git et les modifications locales, configure `ssg-upstream` vers le dépôt officiel, applique uniquement une avance directe depuis `main` puis exécute la nouvelle version de `pix-install`. Il refuse toute situation pouvant demander une fusion ou écraser un travail non enregistré.

```bash
./pix-upgrade
./pix-upgrade --check
```

## Dépendances PHP

### `composer.json`

Ce manifeste déclare :

- PHP `>=8.3` comme runtime;
- Pest `^4.7` comme dépendance de développement;
- le namespace PSR-4 `MonSsg\` associé à `engine/`;
- le script `composer test`, qui appelle Pest;
- l’autorisation du plugin Composer de Pest.

Modifiez ce fichier avec les commandes Composer lorsque cela est possible.

### `composer.lock`

Ce lockfile contient les versions exactes, dépendances transitives, sources et empreintes d’intégrité résolues par Composer.

Il garantit que deux installations utilisent le même arbre de paquets. Ne le modifiez pas à la main : utilisez `composer require`, `composer remove` ou `composer update`.

## Dépendances JavaScript

### `package.json`

Ce manifeste définit le projet npm privé, active les modules ES avec `"type": "module"` et expose quatre scripts :

| Script                 | Commande exécutée             |
| ---------------------- | ----------------------------- |
| `npm test`             | `vitest run`                  |
| `npm run lint`         | `eslint src/scripts tests/js` |
| `npm run format`       | `prettier --write .`          |
| `npm run format:check` | `prettier --check .`          |

Ses dépendances de développement sont ESLint, les configurations ESLint, jsdom, Prettier et Vitest.

### `package-lock.json`

Ce lockfile enregistre les versions npm exactes, les dépendances transitives, les URLs de téléchargement et les empreintes d’intégrité.

Il permet à `npm install` ou `npm ci` de reproduire l’environnement. Ne le modifiez pas manuellement.

## Configurations de test et de qualité

### `phpunit.xml`

Pest utilise cette configuration PHPUnit. Elle :

- charge `engine/bootstrap.php` avant les tests;
- utilise `.phpunit.cache/` pour le cache;
- active les couleurs;
- définit la suite `pix-ssg` à partir de `tests/php/`.

### `eslint.config.js`

La configuration plate ESLint 9 :

- ignore `dist/`, `node_modules/` et `vendor/`;
- active les règles recommandées;
- fournit les globales navigateur à `src/scripts/`;
- fournit les globales navigateur et Node.js à `tests/js/`.

Cette dernière combinaison correspond aux tests Vitest exécutés sous jsdom.

### `vitest.config.js`

Ce fichier utilise `defineConfig()` et sélectionne l’environnement `jsdom` pour tous les tests :

```js
export default defineConfig({
  test: {
    environment: "jsdom",
  },
});
```

Les tests disposent ainsi de `window`, `document`, `querySelector()` et des autres API DOM simulées par jsdom.

## Documentation racine

### `VERSION`

`VERSION` contient la version sémantique courante, par exemple `1.0.0`. Elle doit correspondre à `package.json` et au tag Git `v1.0.0` lors d’une publication.

### `CHANGELOG.md`

`CHANGELOG.md` résume les fonctionnalités, changements et corrections livrés dans chaque version.

### `README.md`

Le README est la présentation courte du projet. Il explique l’installation, les commandes principales, le catalogue, la syntaxe des templates et l’architecture générale. Il renvoie vers `docs/README.md` pour les détails.

### `SPEC.md`

La spécification fixe les garanties techniques : sources préservées, sortie reproductible, pipeline de génération, sécurité du catalogue et outils de qualité.

Modifiez `SPEC.md` lorsqu’un contrat du moteur change. Modifiez `README.md` lorsqu’une commande ou un parcours utilisateur change.

## Après une modification

| Fichier modifié      | Contrôle minimal                          |
| -------------------- | ----------------------------------------- |
| commande PHP         | `php -l fichier` puis test Pest ciblé     |
| script Bash          | exécution du parcours concerné            |
| `composer.json`      | `composer validate` et `composer install` |
| `package.json`       | `npm install` puis scripts concernés      |
| configuration Vitest | `npm test`                                |
| configuration ESLint | `npm run lint`                            |
| documentation        | `npm run format:check`                    |

Avant une livraison complète :

```bash
./vendor/bin/pest
npm test
npm run lint
npm run format:check
./pix-build
```
