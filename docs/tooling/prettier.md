# Prettier

Prettier 3 normalise notamment Markdown, JSON, JavaScript, CSS et HTML.

Vérifier sans modifier :

```bash
npm run format:check
```

Appliquer le formatage :

```bash
npm run format
```

`.prettierignore` exclut `dist/`, `node_modules/`, `vendor/`, `composer.lock` et `package-lock.json`. Les sorties générées et dépendances ne doivent pas être formatées.

Le formatage peut changer les guillemets ou les retours à la ligne sans changer le comportement. Les tests ne doivent donc pas comparer une représentation fragile si plusieurs formes valides existent.

Avant une livraison, utilisez d’abord `npm run format`, examinez les changements, puis confirmez avec `npm run format:check`.
