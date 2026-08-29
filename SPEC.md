# Spécification technique

## Contrat

- PHP 8.3+ est le moteur principal.
- `src/` et `public/` ne sont jamais modifiés pendant un build.
- `dist/` contient uniquement le résultat généré et peut être entièrement reconstruit.
- Le CSS reste natif, sans Sass ni framework frontend.
- Les commandes publiques sont `pix-install`, `./pix-help`, `./pix-install`, `./pix-upgrade`, `./pix-dev`, `./pix-build`, `./pix-clean` et `./pix-ssg new page <nom>`.
- Le catalogue est accessible avec `./pix-ssg templates` et gère `info`, `install` et `remove`.
- Le moteur interne est isolé dans `engine/` afin de réserver le nom `ssg` à la CLI exécutable sous Linux.

## Génération

Le build charge les données de `src/data/`, transforme récursivement les pages HTML de `src/pages/`, résout les composants et partials, applique le layout déclaré, exécute les plugins, puis écrit dans `dist/`. Il copie ensuite `public/`, `src/styles/` et `src/scripts/` sans modifier leurs originaux.

## Templates installables

Les paquets du dossier `templates/` déclarent leurs fichiers dans un manifeste JSON. Une installation écrit uniquement sous `src/` et inscrit les empreintes SHA-256 dans `.ssg/templates.json`. Une désinstallation est refusée si un fichier installé a été modifié, afin de ne jamais supprimer une personnalisation utilisateur.

La distribution comprend les 23 templates sources de la bibliothèque, chacun accompagné de données modifiables et d’un README d’intégration installé avec le composant.

## Qualité

Pest teste le moteur PHP. Vitest teste le JavaScript. ESLint analyse les scripts et Prettier vérifie leur formatage. Toute dépendance de développement est déclarée dans `composer.json` ou `package.json`.
