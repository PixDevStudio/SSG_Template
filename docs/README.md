# Documentation de Mon SSG

Ce dossier est le portail documentaire du générateur. Commencez par [Bien démarrer](getting-started.md), puis utilisez les sections selon votre besoin.

## Guides principaux

- [Bien démarrer](getting-started.md) : installation, première page, build et serveur local.
- [Architecture](architecture.md) : flux complet d’un build et limites du moteur.
- [Langage de templates](template-language.md) : front matter, variables, layouts, partials et composants.
- [Données](guides/data.md) : fichiers JSON/PHP et contexte disponible.
- [Plugins](guides/plugins.md) : extension du rendu avec `afterRender`.
- [Catalogue de templates](guides/template-catalog.md) : consulter, installer, personnaliser et désinstaller les 23 modèles.
- [Déploiement](guides/deployment.md) : publier le contenu de `dist/`.
- [Dépannage](troubleshooting.md) : erreurs fréquentes et solutions.

## Dossiers du projet

Chaque dossier important possède sa propre page dans [directories/](directories/README.md) :

- [`src/`](directories/src.md)
- [`public/`](directories/public.md)
- [`engine/`](directories/engine.md)
- [`plugins/`](directories/plugins.md)
- [`templates/`](directories/templates.md)
- [`tests/`](directories/tests.md)
- [`tools/`](directories/tools.md)
- [`dist/`](directories/dist.md)

## Commandes publiques

- [Vue d’ensemble](commands/README.md)
- [`./install`](commands/install.md)
- [`./build` et `./clean`](commands/build-clean.md)
- [`./dev`](commands/dev.md)
- [`./ssg`](commands/ssg.md)

## Outils de développement

- [Vue d’ensemble](tooling/README.md)
- [PHP et Composer](tooling/php-composer/php-composer.md)
- [Pest](tooling/pest/pest.md)
- [Node.js et npm](tooling/node-npm/node-npm.md)
- [Vitest et jsdom](tooling/vitess/vitest.md)
- [ESLint](tooling/eslint/eslint.md)
- [Prettier](tooling/prettier/prettier.md)

## Référence

- [API interne](reference/api.md)
- [Structure complète](reference/project-tree.md)
- [Fichiers à la racine](reference/root-files.md)
- [Limites connues](reference/limitations.md)

La documentation des modèles individuels se trouve dans `templates/<catégorie>/<nom>/README.md`. Lorsqu’un modèle est installé, une copie est placée dans `src/template-docs/`.
