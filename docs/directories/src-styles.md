# Dossier src/styles

`src/styles/` contient le CSS natif du site. Le build copie récursivement son contenu vers `dist/assets/css/` sans compilation ni minification.

```html
<link rel="stylesheet" href="/assets/css/style.css" />
```

Un fichier `src/styles/components/card.css` devient `dist/assets/css/components/card.css`.

Conservez des chemins cohérents avec cette destination. Le SSG ne traite ni Sass, ni PostCSS, ni regroupement automatique : ajoutez explicitement chaque feuille nécessaire au layout ou à la page.
