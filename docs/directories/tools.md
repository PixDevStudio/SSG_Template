# Dossier tools

`tools/` contient des utilitaires de maintenance qui ne sont pas des commandes publiques du SSG.

## import-template-library.php

Cet importeur synchronise les 17 modèles générés depuis les dossiers voisins `Header_Template`, `Footer_Template`, `SideBar_Template`, `Cards_Templates`, `Form` et `Array_Template`.

```bash
php tools/import-template-library.php
```

Par défaut, il ignore les modèles déjà présents. Le mode suivant régénère uniquement les modèles déclarés dans son tableau de configuration :

```bash
php tools/import-template-library.php --force
```

Le script extrait le fragment utile, convertit les textes et attributs en données JSON, copie le CSS et génère manifeste et README. Les six modèles de référence écrits manuellement ne figurent pas dans sa configuration et ne sont pas écrasés.

Après utilisation, exécutez les tests et contrôlez les fichiers générés. Ne lancez pas `--force` après avoir personnalisé directement un paquet généré sans avoir sauvegardé vos changements.
