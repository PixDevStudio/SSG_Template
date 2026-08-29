# Dossier public

`public/` contient les fichiers statiques copiés tels quels à la racine de `dist/`.

## Contenu typique

```text
public/
├── images/
├── icons/
├── fonts/
├── media/
├── robots.txt
└── favicon.ico
```

`public/images/logo.svg` devient `dist/images/logo.svg` et s’utilise dans une page avec `/images/logo.svg`.

## Bonnes pratiques

- utilisez `src/styles/` pour le CSS et `src/scripts/` pour le JavaScript;
- utilisez `public/` pour les images, fontes et fichiers qui ne nécessitent aucune transformation;
- ne mettez jamais de secret dans ce dossier;
- évitez les collisions : un fichier de `public/` peut écraser une sortie portant le même chemin après la génération des pages.

Le build ne modifie jamais les originaux.
