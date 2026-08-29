# Formulaire de devis

## Installation

```bash
./ssg templates installer form/quote-form
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:quote-form }}
- Inclusion : `{{ component:quote-form }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/quote-form.css" />
```

## Personnalisation

Modifiez `src/data/quote_form.json`. Le HTML installé se trouve dans `src/components/quote-form.html` et le CSS dans `src/styles/templates/quote-form.css`.

Variables générées depuis le template original :

- `quote_form.url_01` : /
- `quote_form.text_01` : Studio Ligne
- `quote_form.text_02` : Demande de devis
- `quote_form.text_03` : Donnez-nous les contours de votre projet.
- `quote_form.text_04` : Réponse détaillée sous deux jours ouvrables.
- `quote_form.action_01` : /devis
- `quote_form.text_05` : 01
- `quote_form.text_06` : Vos coordonnées
- `quote_form.text_07` : Nom complet
- `quote_form.text_08` : Adresse courriel
- `quote_form.text_09` : 02
- `quote_form.text_10` : Services recherchés
- `quote_form.text_11` : Stratégie
- `quote_form.text_12` : Design web
- `quote_form.text_13` : Développement
- `quote_form.text_14` : Identité visuelle
- `quote_form.text_15` : 03
- `quote_form.text_16` : Cadre du projet
- `quote_form.text_17` : Budget estimé
- `quote_form.text_18` : Choisir une fourchette
- `quote_form.text_19` : 5 000 $ – 10 000 $
- `quote_form.text_20` : 10 000 $ – 25 000 $
- `quote_form.text_21` : 25 000 $ et plus
- `quote_form.text_22` : Échéance souhaitée
- `quote_form.text_23` : En quelques mots
- `quote_form.placeholder_01` : Objectifs, public cible, contraintes particulières…
- `quote_form.text_24` : Vos renseignements demeurent confidentiels.
- `quote_form.text_25` : Envoyer ma demande
- `quote_form.text_26` : ↗

Le SSG produit seulement le formulaire HTML. Configurez son attribut `action` vers un service ou une route serveur; ne placez aucun secret dans les données.

## Désinstallation

```bash
./ssg templates desinstaller form/quote-form
```

La désinstallation est refusée si un fichier installé a été personnalisé.
