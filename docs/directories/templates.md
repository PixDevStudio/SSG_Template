# Dossier templates

`templates/` est le catalogue de 23 modèles installables. Il est organisé par catégorie : `card`, `footer`, `form`, `header`, `sidebar` et `table`.

Chaque paquet contient :

```text
templates/header/header-basic/
├── manifest.json
├── README.md
└── files/
    ├── header-basic.html
    ├── header-basic.css
    └── header_basic.json
```

Le manifeste déclare l’identifiant, la description, l’inclusion, l’emplacement recommandé et les destinations sous `src/`. Le README explique l’intégration et les variables.

Utilisez la CLI plutôt que de copier les fichiers manuellement :

```bash
./pix-ssg templates info header/header-basic
./pix-ssg templates installer header/header-basic
./pix-ssg templates desinstaller header/header-basic
```

Le registre `.ssg/templates.json` conserve les empreintes des fichiers installés. Une désinstallation est refusée si un fichier a changé.

Le format auteur complet se trouve dans `templates/README.md`. L’utilitaire `tools/import-template-library.php` sert à maintenir les imports issus de la bibliothèque voisine; il ne fait pas partie du travail quotidien d’un site.
