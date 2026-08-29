# Sidebar compacte

## Installation

```bash
./pix-ssg templates installer sidebar/sidebar-compact
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans le conteneur de mise en page, avant le bloc qui contient {{{ content }}} : {{ partial:sidebar-compact }}
- Inclusion : `{{ partial:sidebar-compact }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/sidebar-compact.css" />
```

## Personnalisation

Modifiez `src/data/sidebar_compact.json`. Le HTML installé se trouve dans `src/partials/sidebar-compact.html` et le CSS dans `src/styles/templates/sidebar-compact.css`.

Variables générées depuis le template original :

- `sidebar_compact.label_01` : Barre latérale
- `sidebar_compact.url_01` : /
- `sidebar_compact.label_02` : Console, accueil
- `sidebar_compact.text_01` : C
- `sidebar_compact.label_03` : Navigation principale
- `sidebar_compact.url_02` : #dashboard
- `sidebar_compact.label_04` : Tableau de bord
- `sidebar_compact.text_02` : ⌂
- `sidebar_compact.url_03` : #projects
- `sidebar_compact.label_05` : Projets
- `sidebar_compact.text_03` : ◇
- `sidebar_compact.url_04` : #team
- `sidebar_compact.label_06` : Équipe
- `sidebar_compact.text_04` : ◎
- `sidebar_compact.url_05` : #reports
- `sidebar_compact.label_07` : Rapports
- `sidebar_compact.text_05` : ▦
- `sidebar_compact.url_06` : #settings
- `sidebar_compact.label_08` : Réglages
- `sidebar_compact.text_06` : ⚙

## Désinstallation

```bash
./pix-ssg templates desinstaller sidebar/sidebar-compact
```

La désinstallation est refusée si un fichier installé a été personnalisé.
