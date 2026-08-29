# Commandes build et clean

## build

```bash
./pix-build
```

`pix-build` exécute le pipeline complet et affiche le nombre de pages générées. Avant la génération, `dist/` est vidé. Un build peut donc être lancé sans `pix-clean` préalable.

La commande échoue notamment si une page référence un layout, une variable, un partial ou un composant inexistant, si un fichier de données est invalide ou si une écriture échoue.

## clean

```bash
./pix-clean
```

`pix-clean` vide uniquement `dist/`. Les dossiers `src/`, `public/`, `plugins/` et `templates/` sont préservés.

## Build de publication

```bash
./pix-clean
./pix-build
npm run format:check
./vendor/bin/pest
npm test
```

Publiez ensuite le contenu de `dist/`.
