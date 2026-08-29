# Catalogue de templates

Le catalogue fournit 23 modèles répartis en six catégories : 4 cartes, 3 pieds de page, 5 formulaires, 3 en-têtes, 3 barres latérales et 5 tableaux.

## Choisir et installer

```bash
./pix-ssg templates
./pix-ssg templates info form/contact-form
./pix-ssg templates installer form/contact-form
```

Lisez toujours `info` avant l’installation. Il indique l’inclusion, le fichier où la placer, le lien CSS et le fichier JSON à personnaliser.

`./pix-ssg templates` régénère aussi `templates/CATALOGUE.md`. Ce guide contient les trois captures de chaque modèle, son inclusion, sa feuille de style, ses données et les commandes pour l’installer ou le désinstaller. La commande propose de l’afficher avec `mdcat` ou `glow` dans le terminal actuel, ou de l’ouvrir dans un onglet VS Code.

## Utiliser

Après installation, suivez le README copié dans `src/template-docs/`. Un modèle installe généralement :

- un partial ou composant HTML;
- une feuille CSS;
- un fichier de données JSON;
- sa documentation.

Lancez ensuite `./pix-build`. Toute variable du modèle doit être présente dans ses données.

## Personnaliser et retirer

Vous pouvez modifier librement les fichiers installés. Cependant, la commande de désinstallation refusera alors de les supprimer : elle compare leur SHA-256 à l’état d’installation.

```bash
./pix-ssg templates desinstaller form/contact-form
```

Cette protection est volontaire. Sauvegardez vos adaptations ou supprimez manuellement les fichiers si vous souhaitez abandonner une version personnalisée.

## Créer un paquet

Consultez `templates/README.md`. Un manifeste valide doit définir `id`, `category`, `name`, `description`, `include`, `usage` et `files`. Toutes les sources doivent rester dans le paquet et toutes les destinations sous `src/`.
