# Header centré

## Installation

```bash
./pix-ssg templates installer header/header-centre
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans <body>, juste avant {{{ content }}} : {{ partial:header-centre }}
- Inclusion : `{{ partial:header-centre }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/header-centre.css" />
```

## Personnalisation

Modifiez `src/data/header_centre.json`. Le HTML installé se trouve dans `src/partials/header-centre.html` et le CSS dans `src/styles/templates/header-centre.css`.

Variables générées depuis le template original :

- `header_centre.label_01` : Navigation principale
- `header_centre.url_01` : /journal
- `header_centre.text_01` : Journal
- `header_centre.url_02` : /collections
- `header_centre.text_02` : Collections
- `header_centre.url_03` : /
- `header_centre.label_02` : Éditions Rivage, accueil
- `header_centre.text_03` : ÉDITIONS
- `header_centre.text_04` : RIVAGE
- `header_centre.label_03` : Navigation secondaire
- `header_centre.url_04` : /a-propos
- `header_centre.text_05` : À propos
- `header_centre.url_05` : /contact
- `header_centre.text_06` : Nous écrire
- `header_centre.text_07` : Menu
- `header_centre.text_08` : ☰
- `header_centre.label_04` : Navigation mobile
- `header_centre.url_06` : /journal
- `header_centre.text_09` : Journal
- `header_centre.url_07` : /collections
- `header_centre.text_10` : Collections
- `header_centre.url_08` : /a-propos
- `header_centre.text_11` : À propos
- `header_centre.url_09` : /contact
- `header_centre.text_12` : Nous écrire

## Désinstallation

```bash
./pix-ssg templates desinstaller header/header-centre
```

La désinstallation est refusée si un fichier installé a été personnalisé.
