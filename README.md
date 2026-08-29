# Mon SSG

Générateur de site statique léger construit en PHP 8.3+. Les sources restent dans `src/` et `public/`; seul le contenu de `dist/` est reconstruit.

## Installation

```bash
./install
```

Le script vérifie Bash, PHP 8.3+, Node.js, npm et Composer, installe Pest, Vitest, ESLint et Prettier, puis prépare les dossiers.

Pest nécessite les extensions PHP DOM/XML et mbstring. Sous Ubuntu ou Debian, `./install` demande confirmation avant de proposer leur installation avec `php-xml` et `php-mbstring`.

Composer nécessite également un extracteur d’archives. Si PHP ZIP, `unzip` et `7z` sont absents, `./install` demande confirmation avant d’installer `unzip`.

## Commandes

```bash
./build                 # Génère dist/
./clean                 # Vide dist/
./dev                   # Build, serveur local et surveillance
./ssg new page contact  # Crée src/pages/contact.html
./ssg templates         # Liste les templates par catégorie
./ssg templates info header/header-basic
./ssg templates install header/header-basic
./ssg templates remove header/header-basic
./vendor/bin/pest       # Tests PHP avec Pest
npm test                # Tests JavaScript avec Vitest
npm run lint            # Analyse JavaScript
npm run format:check    # Vérifie le formatage
```

Le serveur de développement est disponible sur `http://localhost:8000`. Il refuse de démarrer si le port est déjà occupé et s’arrête proprement avec `Ctrl+C`.

## Catalogue de templates

Le catalogue livré contient six modèles de référence : header, footer, sidebar, carte, formulaire et tableau. Chaque modèle installe son HTML, son CSS natif, ses données JSON et sa documentation dans `src/template-docs/`.

```bash
./ssg templates
./ssg templates info card/product-card
./ssg templates install card/product-card
```

Après l’installation, suivez le README indiqué par la commande pour intégrer le partial ou le composant au layout ou à une page. La désinstallation ne supprime jamais un fichier modifié depuis son installation.

Le format permettant d’ajouter d’autres templates au catalogue est documenté dans `templates/README.md`.

## Templates

Une page peut déclarer un layout avec un front matter simple :

```html
---
layout: default
title: Contact
permalink: contact/index.html
---

<main>
  <h1>{{ page.title }}</h1>
  {{ component:contact-form }}
</main>
```

Syntaxe disponible :

- `{{ variable }}` : valeur échappée;
- `{{{ content }}}` : valeur HTML non échappée, notamment dans un layout;
- `{{ partial:header }}` : inclut `src/partials/header.html`;
- `{{ component:card }}` : inclut `src/components/card.html`.

Les fichiers JSON et PHP de `src/data/` alimentent les templates. Les plugins PHP de `plugins/` peuvent enregistrer le filtre `afterRender` sans modifier le moteur.

## Architecture

```text
src/        Sources, pages, layouts, composants, CSS, JS et données
public/     Fichiers statiques copiés tels quels
engine/     Moteur PHP interne
plugins/    Extensions du moteur
tests/      Tests Pest et Vitest
dist/       Résultat généré uniquement
```

Le moteur utilise `engine/` plutôt que `ssg/`, car un système de fichiers Linux ne peut pas contenir à la fois un dossier `ssg/` et la commande publique `./ssg`.
