# Footer Minimal

## Installation

```bash
./ssg templates install footer/footer-minimal
```

## Intégration au layout

Dans `src/layouts/default.html`, ajoutez la feuille de style dans `<head>` :

```html
<link rel="stylesheet" href="/assets/css/templates/footer-minimal.css" />
```

Placez le partial après le contenu de la page et avant `</body>` :

```html
<body>
  {{{ content }}} {{ partial:footer-minimal }}
</body>
```

## Personnalisation

Modifiez la marque, le copyright, les libellés et les URLs dans `src/data/footer_minimal.json`. Dans le partial, ces valeurs utilisent la forme `{{ footer_minimal.nom_de_la_valeur }}`.

Les styles se trouvent dans `src/styles/templates/footer-minimal.css`.

## Désinstallation

```bash
./ssg templates remove footer/footer-minimal
```

La désinstallation est bloquée si un fichier installé a été modifié, afin de protéger votre travail.
