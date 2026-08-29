# Dossier src/partials

`src/partials/` contient les fragments structurels partagés : en-têtes, pieds de page, navigations ou métadonnées.

```html
{{ partial:header }}
```

Cette expression charge `src/partials/header.html`. Le fragment partage le contexte de la page et peut inclure d’autres fragments. Une inclusion absente ou circulaire arrête le build.

Par convention, placez ici les éléments liés à la structure globale et dans `src/components/` les blocs de contenu réutilisables.
