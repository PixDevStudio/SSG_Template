# Configuration de Prettier

Le SSG utilise Prettier 3 avec ses choix par défaut. Aucun fichier `.prettierrc` n’est nécessaire actuellement.

## Scripts npm

Les commandes sont déclarées dans `package.json` :

```json
{
  "scripts": {
    "format": "prettier --write .",
    "format:check": "prettier --check ."
  }
}
```

- `npm run format` modifie les fichiers pour appliquer le formatage;
- `npm run format:check` vérifie les fichiers sans les modifier.

## Fichiers ignorés

Le fichier `.prettierignore` contient :

```text
dist/
node_modules/
vendor/
composer.lock
package-lock.json
```

Ces chemins correspondent aux sorties générées, aux dépendances et aux fichiers de verrouillage qui ne doivent pas être reformattés.

## Ajouter une configuration

Créez un fichier `prettier.config.js` seulement si le projet doit déroger aux valeurs par défaut :

```js
export default {
  printWidth: 100,
  tabWidth: 2,
};
```

Évitez d’ajouter une option sans besoin concret. Une configuration courte réduit les différences artificielles entre fichiers.

## Vérification

```bash
npm run format
npm run format:check
```

Le second appel doit terminer sans avertissement.
