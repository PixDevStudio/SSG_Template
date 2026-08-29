# Données

Les fichiers de `src/data/` alimentent toutes les pages.

## JSON

`src/data/site.json` :

```json
{
  "name": "Mon site",
  "copyright": "2026 Mon site"
}
```

Le nom du fichier devient la clé racine :

```html
<title>{{ site.name }}</title>
```

Un JSON invalide arrête le build avec le fichier et l’erreur de décodage.

## PHP

`src/data/navigation.php` :

```php
<?php

return ['homeLabel' => 'Accueil'];
```

La valeur retournée doit être un tableau. Elle devient accessible sous `navigation`.

## Fusion du contexte

Toutes les données globales sont chargées une fois. Le front matter courant est ajouté sous `page`; il n’écrase donc pas une clé globale ordinaire.

Le moteur ne fournit ni boucle ni condition. Structurez les données comme des valeurs directement consommables, ou générez un fragment HTML de confiance avec prudence. Ne placez aucun secret dans les données : le résultat est public.
