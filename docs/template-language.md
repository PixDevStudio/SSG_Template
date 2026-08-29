# Langage de templates

## Front matter

Une page peut commencer par un bloc délimité par `---` :

```html
---
layout: default
title: Contact
description: Nous joindre
permalink: contact/index.html
published: true
priority: 10
---

<main id="main-content">
  <h1>{{ page.title }}</h1>
</main>
```

Le parseur accepte des paires simples `clé: valeur`, les commentaires commençant par `#`, les booléens, `null`, les nombres et les chaînes. Il ne s’agit pas d’un parseur YAML complet.

## Variables échappées

```html
{{ site.name }} {{ page.title }}
```

Les valeurs sont protégées avec `htmlspecialchars`. Une variable inconnue provoque l’échec du build.

## HTML de confiance

```html
{{{ content }}}
```

Les triples accolades n’échappent pas le HTML. Utilisez-les seulement pour une valeur de confiance, principalement `content` dans un layout.

## Partials

```html
{{ partial:header }}
```

Charge `src/partials/header.html`. Les partials servent aux structures partagées comme l’en-tête, le pied de page et la navigation.

## Composants

```html
{{ component:product-card }}
```

Charge `src/components/product-card.html`. Les composants servent aux cartes, formulaires, tableaux et autres blocs de contenu.

## Layouts

Le champ `layout: default` charge `src/layouts/default.html`. Un layout doit généralement contenir :

```html
<body>
  {{ partial:header }} {{{ content }}} {{ partial:footer }}
</body>
```

Les inclusions peuvent elles-mêmes contenir des variables ou d’autres inclusions. Le moteur bloque les inclusions circulaires.

## Fonctionnalités non disponibles

Le moteur ne propose pas encore de boucles, conditions, macros ou héritage de templates. Consultez [les limites](reference/limitations.md).
