# Dossier src/pages

`src/pages/` contient une source HTML par page du site. Le parcours est récursif.

`src/pages/index.html` devient `dist/index.html`; `src/pages/blog/article.html` devient `dist/blog/article.html`. Le champ front matter `permalink` remplace cette destination.

Créez une page avec :

```bash
./pix-ssg new page blog/article
```

Une page peut utiliser les données, partials et composants, avec ou sans layout. Elle ne doit pas contenir de secret. Voir [langage de templates](../template-language.md).
