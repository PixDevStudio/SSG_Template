# Header dashboard

## Installation

```bash
./ssg templates installer header/header-dashboard
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans <body>, juste avant {{{ content }}} : {{ partial:header-dashboard }}
- Inclusion : `{{ partial:header-dashboard }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/header-dashboard.css" />
```

## Personnalisation

Modifiez `src/data/header_dashboard.json`. Le HTML installé se trouve dans `src/partials/header-dashboard.html` et le CSS dans `src/styles/templates/header-dashboard.css`.

Variables générées depuis le template original :

- `header_dashboard.url_01` : /
- `header_dashboard.label_01` : Noyau, accueil
- `header_dashboard.text_01` : N
- `header_dashboard.text_02` : Noyau
- `header_dashboard.action_01` : /recherche
- `header_dashboard.text_03` : Rechercher
- `header_dashboard.placeholder_01` : Rechercher un projet…
- `header_dashboard.label_02` : Lancer la recherche
- `header_dashboard.text_04` : ⌕
- `header_dashboard.url_02` : /aide
- `header_dashboard.label_03` : Centre d’aide
- `header_dashboard.text_05` : ?
- `header_dashboard.url_03` : /notifications
- `header_dashboard.label_04` : Notifications, 3 nouvelles
- `header_dashboard.text_06` : ♢
- `header_dashboard.text_07` : 3
- `header_dashboard.url_04` : /profil
- `header_dashboard.text_08` : MC
- `header_dashboard.text_09` : Marie Côté
- `header_dashboard.text_10` : Produit

## Désinstallation

```bash
./ssg templates desinstaller header/header-dashboard
```

La désinstallation est refusée si un fichier installé a été personnalisé.
