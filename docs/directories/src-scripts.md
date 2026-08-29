# Dossier src/scripts

`src/scripts/` contient le JavaScript du site. Le build le copie récursivement vers `dist/assets/js/` sans transpilation ni regroupement.

```html
<script src="/assets/js/main.js" defer></script>
```

Le code s’exécute donc directement dans les navigateurs ciblés. Utilisez des API compatibles avec ces navigateurs ou ajoutez volontairement un outil de compilation externe.

Validez toute modification avec `npm test`, `npm run lint` et `npm run format:check`.
