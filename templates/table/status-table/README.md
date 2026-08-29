# Status Table

## Installation

```bash
./pix-ssg templates install table/status-table
```

## Intégration dans une page

Ajoutez `/assets/css/templates/status-table.css` dans le `<head>` du layout, puis insérez le composant :

```html
<main id="main-content">{{ component:status-table }}</main>
```

## Variables

Modifiez les titres de colonnes et la ligne d’exemple dans `src/data/status_table.json`. Les variables utilisent `{{ status_table.nom }}`.

Le composant livré représente une ligne configurable. Pour plusieurs lignes dynamiques, utilisez plusieurs composants spécialisés ou ajoutez ultérieurement le support des collections au moteur. Le conteneur conserve le défilement horizontal à l’intérieur du tableau sur mobile.

## Désinstallation

```bash
./pix-ssg templates remove table/status-table
```
