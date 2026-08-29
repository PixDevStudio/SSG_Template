# Contact Form

## Installation

```bash
./ssg templates install form/contact-form
```

## Intégration dans une page

Ajoutez `/assets/css/templates/contact-form.css` dans le `<head>` du layout, puis placez ceci dans une page :

```html
---
layout: default
title: Contact
---

<main id="main-content">{{ component:contact-form }}</main>
```

## Variables

Modifiez les textes, libellés et l’URL de soumission dans `src/data/contact_form.json`. Les variables utilisent `{{ contact_form.nom }}`.

Le SSG génère uniquement le HTML statique. La valeur `action` doit pointer vers un service de formulaires ou une route serveur que vous configurez séparément. N’ajoutez jamais de secret ou de clé privée dans les données du site.

## Désinstallation

```bash
./ssg templates remove form/contact-form
```
