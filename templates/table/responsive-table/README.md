# Tableau responsive

## Installation

```bash
./pix-ssg templates installer table/responsive-table
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:responsive-table }}
- Inclusion : `{{ component:responsive-table }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/responsive-table.css" />
```

## Personnalisation

Modifiez `src/data/responsive_table.json`. Le HTML installé se trouve dans `src/components/responsive-table.html` et le CSS dans `src/styles/templates/responsive-table.css`.

Variables générées depuis le template original :

- `responsive_table.text_01` : Répertoire
- `responsive_table.text_02` : Notre équipe
- `responsive_table.text_03` : Ajouter un membre
- `responsive_table.text_04` : +
- `responsive_table.text_05` : Liste des membres de l’équipe
- `responsive_table.text_06` : Membre
- `responsive_table.text_07` : Rôle
- `responsive_table.text_08` : Équipe
- `responsive_table.text_09` : Disponibilité
- `responsive_table.text_10` : Profil
- `responsive_table.text_11` : AL
- `responsive_table.text_12` : Alex Leblanc
- `responsive_table.text_13` : alex@exemple.ca
- `responsive_table.text_14` : Designer principal
- `responsive_table.text_15` : Produit
- `responsive_table.text_16` : Disponible
- `responsive_table.url_01` : #alex
- `responsive_table.text_17` : Voir le profil
- `responsive_table.text_18` : MC
- `responsive_table.text_19` : Marie Côté
- `responsive_table.text_20` : marie@exemple.ca
- `responsive_table.text_21` : Développeuse
- `responsive_table.text_22` : Technologie
- `responsive_table.text_23` : Occupée
- `responsive_table.url_02` : #marie
- `responsive_table.text_24` : Voir le profil
- `responsive_table.text_25` : SL
- `responsive_table.text_26` : Sam Lee
- `responsive_table.text_27` : sam@exemple.ca
- `responsive_table.text_28` : Stratège
- `responsive_table.text_29` : Conseil
- `responsive_table.text_30` : Disponible
- `responsive_table.url_03` : #sam
- `responsive_table.text_31` : Voir le profil

## Désinstallation

```bash
./pix-ssg templates desinstaller table/responsive-table
```

La désinstallation est refusée si un fichier installé a été personnalisé.
