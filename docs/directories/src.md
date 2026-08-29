# Dossier src

`src/` contient toutes les sources transformées ou copiées pendant le build.

## Sous-dossiers

- `pages/` : pages HTML générées dans `dist/`.
- `layouts/` : documents généraux recevant `{{{ content }}}`.
- `partials/` : fragments structurels inclus avec `{{ partial:nom }}`.
- `components/` : blocs réutilisables inclus avec `{{ component:nom }}`.
- `data/` : données JSON et PHP accessibles dans les templates.
- `styles/` : CSS copié vers `dist/assets/css/`.
- `scripts/` : JavaScript copié vers `dist/assets/js/`.
- `template-docs/` : documentation des modèles installés.

## Règles

Le build lit ce dossier sans le modifier. Une page doit avoir l’extension `.html`. Les pages et sous-dossiers sont parcourus récursivement; les données sont actuellement chargées uniquement au premier niveau de `src/data/`.

## Exemple

```text
src/
├── pages/contact.html
├── layouts/default.html
├── partials/header.html
├── components/contact-form.html
├── data/site.json
├── styles/style.css
└── scripts/main.js
```

Voir [langage de templates](../template-language.md) et [données](../guides/data.md).
