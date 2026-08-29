# Commande ssg

## Créer une page

```bash
./ssg new page blog/article
```

Crée `src/pages/blog/article.html` avec un front matter et un titre humanisé. Le nom accepte les minuscules, chiffres, `/`, `_` et `-`, doit commencer par une lettre ou un chiffre et ne peut pas contenir `..`. Un fichier existant n’est jamais écrasé.

## Lister les modèles

```bash
./ssg templates
./ssg templates list
```

Affiche les 23 modèles triés par catégorie et nom.

La commande régénère aussi `templates/CATALOGUE.md`. Ce fichier rassemble les captures desktop, tablette et mobile, les instructions d’intégration et les commandes d’installation et de désinstallation. Dans un terminal interactif, choisissez ensuite :

- `1` pour l’afficher dans le terminal actuel avec `mdcat`, ou avec `glow` si `mdcat` est absent;
- `2` pour l’ouvrir dans un onglet VS Code, puis `Ctrl+Shift+V` pour afficher son aperçu Markdown;
- `Entrée` pour ne pas l’ouvrir.

## Obtenir les instructions

```bash
./ssg templates info card/product-card
```

Affiche la description, le statut, l’expression d’inclusion, le fichier cible, la position recommandée, le CSS, les données et le README.

Les captures restent disponibles dans `templates/CATALOGUE.md`; aucune image n’est envoyée directement au terminal.

## Installer

```bash
./ssg templates install card/product-card
./ssg templates installer card/product-card
```

L’installation est refusée si le modèle est déjà enregistré ou si un fichier cible existe. Les empreintes initiales sont stockées dans `.ssg/templates.json`.

## Désinstaller

```bash
./ssg templates remove card/product-card
./ssg templates uninstall card/product-card
./ssg templates desinstaller card/product-card
```

La suppression est refusée si l’un des fichiers installés a été modifié. Cette protection évite toute perte de personnalisation. Pour retirer un modèle personnalisé, déplacez ou sauvegardez vos modifications puis gérez explicitement les fichiers concernés.
