# Dossier src/layouts

`src/layouts/` contient les enveloppes HTML générales. Le champ `layout: default` d’une page sélectionne `src/layouts/default.html`.

Un layout fournit habituellement `doctype`, `head`, navigation, pied de page et scripts. Il insère la page déjà rendue avec :

```html
{{{ content }}}
```

Les variables globales et `page.*` restent accessibles. Si le layout déclaré n’existe pas, le build échoue. Utilisez plusieurs layouts pour des structures réellement différentes, par exemple `default.html` et `dashboard.html`.
