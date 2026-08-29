# Sidebar Basic

## Installation

```bash
./pix-ssg templates install sidebar/sidebar-basic
```

## Intégration au layout

Ajoutez `/assets/css/templates/sidebar-basic.css` dans le `<head>` de `src/layouts/default.html`. Placez ensuite le partial près du contenu :

```html
<div class="app-shell">
  {{ partial:sidebar-basic }}
  <div>{{{ content }}}</div>
</div>
```

Ajoutez la grille du layout dans votre CSS principal :

```css
.app-shell {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 17rem 1fr;
}

@media (max-width: 48rem) {
  .app-shell {
    grid-template-columns: 1fr;
  }
}
```

## Variables

Modifiez `src/data/sidebar_basic.json` pour le titre, les libellés et les URLs. Les variables utilisent `{{ sidebar_basic.nom }}`.

## Désinstallation

```bash
./pix-ssg templates remove sidebar/sidebar-basic
```
