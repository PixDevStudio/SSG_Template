# Footer complet

## Installation

```bash
./pix-ssg templates installer footer/footer-rich
```

## Intégration

- Fichier cible : `src/layouts/default.html`
- Emplacement : Dans <body>, juste après {{{ content }}} et avant </body> : {{ partial:footer-rich }}
- Inclusion : `{{ partial:footer-rich }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/footer-rich.css" />
```

## Personnalisation

Modifiez `src/data/footer_rich.json`. Le HTML installé se trouve dans `src/partials/footer-rich.html` et le CSS dans `src/styles/templates/footer-rich.css`.

Variables générées depuis le template original :

- `footer_rich.url_01` : /
- `footer_rich.label_01` : Pixel & Craft, accueil
- `footer_rich.text_01` : Pixel
- `footer_rich.text_02` : &
- `footer_rich.text_03` : Craft
- `footer_rich.text_04` : Des expériences numériques utiles, rapides et pensées pour durer.
- `footer_rich.url_02` : mailto:bonjour@pixelcraft.ca
- `footer_rich.text_05` : bonjour@pixelcraft.ca
- `footer_rich.label_02` : Navigation du pied de page
- `footer_rich.text_06` : Explorer
- `footer_rich.url_03` : /
- `footer_rich.text_07` : Accueil
- `footer_rich.url_04` : /services
- `footer_rich.text_08` : Services
- `footer_rich.url_05` : /projets
- `footer_rich.text_09` : Projets
- `footer_rich.url_06` : /contact
- `footer_rich.text_10` : Contact
- `footer_rich.text_11` : Informations
- `footer_rich.url_07` : /a-propos
- `footer_rich.text_12` : À propos
- `footer_rich.url_08` : /confidentialite
- `footer_rich.text_13` : Confidentialité
- `footer_rich.url_09` : /conditions
- `footer_rich.text_14` : Conditions
- `footer_rich.url_10` : /accessibilite
- `footer_rich.text_15` : Accessibilité
- `footer_rich.text_16` : © 2026 Pixel & Craft. Tous droits réservés.
- `footer_rich.url_11` : #top
- `footer_rich.label_03` : Retourner en haut de la page
- `footer_rich.text_17` : Haut
- `footer_rich.text_18` : ↑

## Désinstallation

```bash
./pix-ssg templates desinstaller footer/footer-rich
```

La désinstallation est refusée si un fichier installé a été personnalisé.
