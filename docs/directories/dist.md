# Dossier dist

`dist/` contient uniquement le site généré. Il peut être supprimé et reconstruit à tout moment.

```bash
./clean
./build
```

## Contenu

- pages HTML générées depuis `src/pages/`;
- CSS de `src/styles/` sous `dist/assets/css/`;
- JavaScript de `src/scripts/` sous `dist/assets/js/`;
- contenu de `public/` copié à la racine.

## Règles

- ne modifiez jamais un fichier dans `dist/` : le prochain build l’effacera;
- ne placez aucune source unique dans ce dossier;
- déployez le contenu de `dist/`, pas le moteur PHP;
- vérifiez toujours un build propre avant publication.

Voir [déploiement](../guides/deployment.md).
