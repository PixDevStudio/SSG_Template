# Tableau financier

## Installation

```bash
./ssg templates installer table/finance-table
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:finance-table }}
- Inclusion : `{{ component:finance-table }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/finance-table.css" />
```

## Personnalisation

Modifiez `src/data/finance_table.json`. Le HTML installé se trouve dans `src/components/finance-table.html` et le CSS dans `src/styles/templates/finance-table.css`.

Variables générées depuis le template original :

- `finance_table.text_01` : Rapport mensuel
- `finance_table.text_02` : Revenus
- `finance_table.text_03` : Août 2026
- `finance_table.text_04` : 42 828,29 $
- `finance_table.text_05` : +12,4 % depuis juillet
- `finance_table.label_01` : Rapport financier défilable horizontalement
- `finance_table.text_06` : Transactions du mois d’août 2026
- `finance_table.text_07` : Facture
- `finance_table.text_08` : Client
- `finance_table.text_09` : Date
- `finance_table.text_10` : État
- `finance_table.text_11` : Sous-total
- `finance_table.text_12` : Taxes
- `finance_table.text_13` : Total
- `finance_table.text_14` : FAC-2048
- `finance_table.text_15` : Groupe Boréal
- `finance_table.text_16` : 4 août
- `finance_table.text_17` : Payée
- `finance_table.text_18` : 8 400,00 $
- `finance_table.text_19` : 1 258,00 $
- `finance_table.text_20` : 9 658,00 $
- `finance_table.text_21` : FAC-2049
- `finance_table.text_22` : Atelier Halo
- `finance_table.text_23` : 11 août
- `finance_table.text_24` : Payée
- `finance_table.text_25` : 12 750,00 $
- `finance_table.text_26` : 1 909,31 $
- `finance_table.text_27` : 14 659,31 $
- `finance_table.text_28` : FAC-2050
- `finance_table.text_29` : Coopérative Atlas
- `finance_table.text_30` : 18 août
- `finance_table.text_31` : En attente
- `finance_table.text_32` : 6 200,00 $
- `finance_table.text_33` : 928,45 $
- `finance_table.text_34` : 7 128,45 $
- `finance_table.text_35` : FAC-2051
- `finance_table.text_36` : Maison Nord
- `finance_table.text_37` : 25 août
- `finance_table.text_38` : En retard
- `finance_table.text_39` : 9 900,00 $
- `finance_table.text_40` : 1 482,53 $
- `finance_table.text_41` : 11 382,53 $
- `finance_table.text_42` : Total du mois
- `finance_table.text_43` : 37 250,00 $
- `finance_table.text_44` : 5 578,29 $
- `finance_table.text_45` : 42 828,29 $

## Désinstallation

```bash
./ssg templates desinstaller table/finance-table
```

La désinstallation est refusée si un fichier installé a été personnalisé.
