# Footer en colonnes

## Installation

```bash
./pix-ssg templates installer footer/footer-columns
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans <body>, juste après {{{ content }}} et avant </body> : {{ partial:footer-columns }}
- Inclusion : `{{ partial:footer-columns }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/footer-columns.css" />
```

## Personnalisation

Modifiez `src/data/footer_columns.json`. Le HTML installé se trouve dans `src/partials/footer-columns.html` et le CSS dans `src/styles/templates/footer-columns.css`.

Variables générées depuis le template original :

- `footer_columns.url_01` : /
- `footer_columns.text_01` : Maison Commune
- `footer_columns.text_02` : Des outils numériques pensés pour les équipes qui bâtissent demain.
- `footer_columns.action_01` : /infolettre
- `footer_columns.text_03` : Recevoir nos nouvelles
- `footer_columns.placeholder_01` : nom@exemple.com
- `footer_columns.label_01` : S’inscrire à l’infolettre
- `footer_columns.text_04` : →
- `footer_columns.label_02` : Navigation du pied de page
- `footer_columns.text_05` : Découvrir
- `footer_columns.url_02` : /services
- `footer_columns.text_06` : Services
- `footer_columns.url_03` : /projets
- `footer_columns.text_07` : Projets
- `footer_columns.url_04` : /studio
- `footer_columns.text_08` : Le studio
- `footer_columns.text_09` : Ressources
- `footer_columns.url_05` : /journal
- `footer_columns.text_10` : Journal
- `footer_columns.url_06` : /guides
- `footer_columns.text_11` : Guides
- `footer_columns.url_07` : /faq
- `footer_columns.text_12` : FAQ
- `footer_columns.text_13` : Nous joindre
- `footer_columns.url_08` : mailto:allo@maisoncommune.ca
- `footer_columns.text_14` : Courriel
- `footer_columns.url_09` : /contact
- `footer_columns.text_15` : Démarrer un projet
- `footer_columns.url_10` : /emplois
- `footer_columns.text_16` : Carrières
- `footer_columns.text_17` : © 2026 Maison Commune
- `footer_columns.url_11` : /confidentialite
- `footer_columns.text_18` : Confidentialité
- `footer_columns.url_12` : /accessibilite
- `footer_columns.text_19` : Accessibilité

## Désinstallation

```bash
./pix-ssg templates desinstaller footer/footer-columns
```

La désinstallation est refusée si un fichier installé a été personnalisé.
