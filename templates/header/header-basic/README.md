# Header Basic

## Installation

```bash
./ssg templates install header/header-basic
```

## Intégration au layout

Dans `src/layouts/default.html`, ajoutez la feuille de style dans `<head>` :

```html
<link rel="stylesheet" href="/assets/css/templates/header-basic.css" />
```

Placez ensuite le partial au début de `<body>` :

```html
<body>
  {{ partial:header-basic }} {{{ content }}}
</body>
```

Le contenu principal de la page doit conserver `id="main-content"` pour le lien d’évitement :

```html
<main id="main-content">...</main>
```

## Personnalisation

Modifiez les textes et URLs dans `src/data/header_basic.json`. Ces valeurs sont accessibles avec `{{ header_basic.nom_de_la_valeur }}`.

Modifiez l’apparence dans `src/styles/templates/header-basic.css`. Les classes sont préfixées par `header-basic` pour limiter les collisions.

## Désinstallation

```bash
./ssg templates remove header/header-basic
```

La commande refuse de supprimer les fichiers qui ont été modifiés depuis leur installation. Conservez vos changements ailleurs ou restaurez les fichiers avant la désinstallation.
