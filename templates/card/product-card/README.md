# Product Card

## Installation

```bash
./ssg templates install card/product-card
```

## Intégration dans une page

Ajoutez la feuille de style dans `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/product-card.css" />
```

Dans une page comme `src/pages/boutique.html`, insérez le composant :

```html
---
layout: default
title: Boutique
---

<main id="main-content">
  <section class="product-grid">{{ component:product-card }}</section>
</main>
```

Une grille minimale peut être ajoutée à votre CSS de page :

```css
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(min(100%, 16rem), 1fr));
  gap: 1.5rem;
}
```

## Variables

Modifiez `src/data/product_card.json` pour changer `name`, `category`, `price`, `badge`, `action`, `url`, `image` et `image_alt`. Le composant lit ces valeurs sous la forme `{{ product_card.name }}`.

L’image d’exemple est distante. Pour un site autonome, placez votre image dans `public/images/`, puis utilisez une URL comme `/images/produit.jpg`.

Pour plusieurs produits ayant chacun leurs propres données, dupliquez le composant sous un autre nom et créez un fichier JSON portant la même clé normalisée. Une future extension du moteur pourra ajouter les collections et boucles.

## Désinstallation

```bash
./ssg templates remove card/product-card
```

La commande protège les fichiers modifiés et refuse de les supprimer automatiquement.
