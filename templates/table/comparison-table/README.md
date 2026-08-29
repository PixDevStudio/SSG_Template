# Tableau comparatif

## Installation

```bash
./pix-ssg templates installer table/comparison-table
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:comparison-table }}
- Inclusion : `{{ component:comparison-table }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/comparison-table.css" />
```

## Personnalisation

Modifiez `src/data/comparison_table.json`. Le HTML installé se trouve dans `src/components/comparison-table.html` et le CSS dans `src/styles/templates/comparison-table.css`.

Variables générées depuis le template original :

- `comparison_table.text_01` : Forfaits
- `comparison_table.text_02` : Choisissez l’espace qui vous ressemble.
- `comparison_table.label_01` : Comparaison défilable horizontalement
- `comparison_table.text_03` : Comparaison des forfaits mensuels
- `comparison_table.text_04` : Fonctionnalité
- `comparison_table.text_05` : Essentiel
- `comparison_table.text_06` : 19 $
- `comparison_table.text_07` : par mois
- `comparison_table.text_08` : Populaire
- `comparison_table.text_09` : Équipe
- `comparison_table.text_10` : 49 $
- `comparison_table.text_11` : par mois
- `comparison_table.text_12` : Studio
- `comparison_table.text_13` : 99 $
- `comparison_table.text_14` : par mois
- `comparison_table.text_15` : Projets actifs
- `comparison_table.text_16` : 3
- `comparison_table.text_17` : Illimités
- `comparison_table.text_18` : Illimités
- `comparison_table.text_19` : Collaborateurs
- `comparison_table.text_20` : 1
- `comparison_table.text_21` : 10
- `comparison_table.text_22` : Illimités
- `comparison_table.text_23` : Stockage
- `comparison_table.text_24` : 10 Go
- `comparison_table.text_25` : 100 Go
- `comparison_table.text_26` : 1 To
- `comparison_table.text_27` : Historique avancé
- `comparison_table.label_02` : Non inclus
- `comparison_table.text_28` : —
- `comparison_table.label_03` : Inclus
- `comparison_table.text_29` : ✓
- `comparison_table.label_04` : Inclus
- `comparison_table.text_30` : ✓
- `comparison_table.text_31` : Soutien prioritaire
- `comparison_table.label_05` : Non inclus
- `comparison_table.text_32` : —
- `comparison_table.label_06` : Inclus
- `comparison_table.text_33` : ✓
- `comparison_table.label_07` : Inclus
- `comparison_table.text_34` : ✓
- `comparison_table.text_35` : Sélectionner
- `comparison_table.url_01` : #essentiel
- `comparison_table.text_36` : Choisir
- `comparison_table.url_02` : #equipe
- `comparison_table.text_37` : Choisir Équipe
- `comparison_table.url_03` : #studio
- `comparison_table.text_38` : Choisir

## Désinstallation

```bash
./pix-ssg templates desinstaller table/comparison-table
```

La désinstallation est refusée si un fichier installé a été personnalisé.
