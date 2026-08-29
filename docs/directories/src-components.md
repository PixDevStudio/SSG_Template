# Dossier src/components

`src/components/` contient les blocs de contenu réutilisables : cartes, formulaires, tableaux et panneaux.

```html
{{ component:product-card }}
```

Cette expression charge `src/components/product-card.html`. Le composant utilise les mêmes données que sa page. Le catalogue installe la majorité de ses modèles dans ce dossier et fournit le JSON ainsi que le CSS associés.

Un composant ne reçoit pas de paramètres locaux. Utilisez donc des clés de données explicites et évitez d’inclure deux variantes nécessitant des valeurs différentes sur une même page sans adapter le HTML.
