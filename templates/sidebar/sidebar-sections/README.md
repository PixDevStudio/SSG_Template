# Sidebar à sections

## Installation

```bash
./pix-ssg templates installer sidebar/sidebar-sections
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans le conteneur de mise en page, avant le bloc qui contient {{{ content }}} : {{ partial:sidebar-sections }}
- Inclusion : `{{ partial:sidebar-sections }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/sidebar-sections.css" />
```

## Personnalisation

Modifiez `src/data/sidebar_sections.json`. Le HTML installé se trouve dans `src/partials/sidebar-sections.html` et le CSS dans `src/styles/templates/sidebar-sections.css`.

Variables générées depuis le template original :

- `sidebar_sections.label_01` : Barre latérale
- `sidebar_sections.text_01` : OP
- `sidebar_sections.text_02` : Orbit Produit
- `sidebar_sections.text_03` : Forfait équipe
- `sidebar_sections.label_02` : Navigation de l’espace
- `sidebar_sections.url_01` : #overview
- `sidebar_sections.text_04` : ⌂
- `sidebar_sections.text_05` : Vue d’ensemble
- `sidebar_sections.text_06` : Travail
- `sidebar_sections.text_07` : ›
- `sidebar_sections.url_02` : #tasks
- `sidebar_sections.text_08` : Tâches
- `sidebar_sections.text_09` : 14
- `sidebar_sections.url_03` : #projects
- `sidebar_sections.text_10` : Projets
- `sidebar_sections.url_04` : #calendar
- `sidebar_sections.text_11` : Calendrier
- `sidebar_sections.text_12` : Équipe
- `sidebar_sections.text_13` : ›
- `sidebar_sections.url_05` : #members
- `sidebar_sections.text_14` : Membres
- `sidebar_sections.url_06` : #permissions
- `sidebar_sections.text_15` : Permissions
- `sidebar_sections.text_16` : Analyse
- `sidebar_sections.text_17` : ›
- `sidebar_sections.url_07` : #reports
- `sidebar_sections.text_18` : Rapports
- `sidebar_sections.url_08` : #exports
- `sidebar_sections.text_19` : Exports
- `sidebar_sections.url_09` : #account
- `sidebar_sections.text_20` : SL
- `sidebar_sections.text_21` : Sam Lee
- `sidebar_sections.text_22` : Compte

## Désinstallation

```bash
./pix-ssg templates desinstaller sidebar/sidebar-sections
```

La désinstallation est refusée si un fichier installé a été personnalisé.
