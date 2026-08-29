# pix-ssg

Générateur de site statique léger construit en PHP 8.3+. Les sources restent dans `src/` et `public/`; seul le contenu de `dist/` est reconstruit.

La documentation complète se trouve dans [`docs/README.md`](docs/README.md) : démarrage, architecture, dossiers, commandes, outils, API interne et dépannage.

pix-ssg est distribué sous [licence MIT](LICENSE). Il peut être utilisé, modifié et redistribué, y compris dans des projets commerciaux, à condition de conserver l’avis de licence.

## Installation

Installation directe depuis un terminal Bash ou WSL :

```bash
bash <(curl -fsSL https://raw.githubusercontent.com/PixDevStudio/SSG_Template/main/pix-bootstrap)
```

La commande présente les dépendances et demande une confirmation `Y/N` avant de continuer. Elle télécharge le dépôt officiel dans `pix-ssg`, puis lance l’installation. Pour choisir un autre dossier, ajoutez son nom à la fin de la commande.

Installation manuelle avec Git :

Clonez d’abord le dépôt officiel avec Git ou GitHub CLI :

```bash
git clone https://github.com/PixDevStudio/SSG_Template.git pix-ssg
# ou : gh repo clone PixDevStudio/SSG_Template pix-ssg
cd pix-ssg
```

Puis lancez l’installation :

```bash
./pix-install
```

Le script vérifie Bash, PHP 8.3+, Node.js, npm et Composer, installe Pest, Vitest, ESLint et Prettier, puis prépare les dossiers.

Lancez `./pix-install` dans **Bash ou WSL, jamais dans PowerShell**.

Pest nécessite les extensions PHP DOM/XML et mbstring. Sous Ubuntu ou Debian, `./pix-install` demande confirmation avant de proposer leur installation avec `php-xml` et `php-mbstring`.

Composer nécessite également un extracteur d’archives. Si PHP ZIP, `unzip` et `7z` sont absents, `./pix-install` demande confirmation avant d’installer `unzip`.

Les mises à jour suivantes viennent directement du même dépôt officiel avec `./pix-upgrade`; aucun `git pull` manuel n’est nécessaire.

## Commandes

```bash
./pix-build                 # Génère dist/
./pix-clean                 # Vide dist/
./pix-dev                   # Build, serveur local et surveillance
./pix-help                  # Affiche toutes les commandes disponibles
./pix-check                 # Lance tous les contrôles
./pix-upgrade               # Met à jour le SSG et ses dépendances
./pix-upgrade --check       # Vérifie si une mise à jour existe
./pix-ssg new page contact  # Crée src/pages/contact.html
./pix-ssg templates         # Liste les templates par catégorie
./pix-ssg templates info header/header-basic
./pix-ssg templates install header/header-basic
./pix-ssg templates remove header/header-basic
./vendor/bin/pest           # Tests PHP avec Pest
npm test                    # Tests JavaScript avec Vitest
npm run lint                # Analyse JavaScript
npm run format:check        # Vérifie le formatage
```

Le serveur de développement est disponible sur `http://localhost:8000`. Il refuse de démarrer si le port est déjà occupé et s’arrête proprement avec `Ctrl+C`.

## Catalogue de templates

Le catalogue contient 23 modèles : 3 headers, 3 footers, 3 sidebars, 4 ensembles de cartes, 5 formulaires et 5 tableaux. Chaque modèle installe son HTML, son CSS natif, ses données JSON et sa documentation dans `src/template-docs/`.

```bash
./pix-ssg templates
./pix-ssg templates info card/product-card
./pix-ssg templates install card/product-card
```

La commande génère `templates/CATALOGUE.md`, qui réunit les captures desktop, tablette et mobile ainsi que les commandes d’installation, d’intégration et de désinstallation. Elle propose ensuite de l’afficher avec `mdcat` ou `glow` dans le terminal actuel, ou de l’ouvrir dans un onglet VS Code.

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
template-sources/ Sources originales utilisées par l’importeur
templates/  Catalogue de modèles installables
tests/      Tests Pest et Vitest
dist/       Résultat généré uniquement
```

Le moteur utilise `engine/` plutôt que `ssg/`, car un système de fichiers Linux ne peut pas contenir à la fois un dossier `ssg/` et la commande publique `./pix-ssg`.
