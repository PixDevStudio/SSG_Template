# Tableau de données

## Installation

```bash
./pix-ssg templates installer table/data-table
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:data-table }}
- Inclusion : `{{ component:data-table }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/data-table.css" />
```

## Personnalisation

Modifiez `src/data/data_table.json`. Le HTML installé se trouve dans `src/components/data-table.html` et le CSS dans `src/styles/templates/data-table.css`.

Variables générées depuis le template original :

- `data_table.text_01` : Abonnements actifs
- `data_table.text_02` : Service
- `data_table.text_03` : Type
- `data_table.text_04` : Prix
- `data_table.text_05` : Renouvellement
- `data_table.text_06` : Figma
- `data_table.text_07` : Entreprise
- `data_table.text_08` : 24 $
- `data_table.text_09` : Mensuel

## Désinstallation

```bash
./pix-ssg templates desinstaller table/data-table
```

La désinstallation est refusée si un fichier installé a été personnalisé.
