# Formulaire infolettre

## Installation

```bash
./ssg templates installer form/newsletter-form
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:newsletter-form }}
- Inclusion : `{{ component:newsletter-form }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/newsletter-form.css" />
```

## Personnalisation

Modifiez `src/data/newsletter_form.json`. Le HTML installé se trouve dans `src/components/newsletter-form.html` et le CSS dans `src/styles/templates/newsletter-form.css`.

Variables générées depuis le template original :

- `newsletter_form.text_01` : Édition
- `newsletter_form.text_02` : 012
- `newsletter_form.text_03` : Notes du vendredi
- `newsletter_form.text_04` : Une idée utile.
- `newsletter_form.text_05` : Une fois par semaine.
- `newsletter_form.text_06` : Design, développement et méthodes de travail expliqués sans détour.
- `newsletter_form.action_01` : /infolettre
- `newsletter_form.text_07` : Votre adresse courriel
- `newsletter_form.placeholder_01` : nom@exemple.com
- `newsletter_form.text_08` : Je m’inscris
- `newsletter_form.text_09` : →
- `newsletter_form.text_10` : En vous inscrivant, vous acceptez notre politique de confidentialité. Désabonnement en un
- `newsletter_form.label_01` : Sujets abordés
- `newsletter_form.text_11` : Au programme
- `newsletter_form.text_12` : Interfaces claires
- `newsletter_form.text_13` : Code maintenable
- `newsletter_form.text_14` : Outils pratiques

Le SSG produit seulement le formulaire HTML. Configurez son attribut `action` vers un service ou une route serveur; ne placez aucun secret dans les données.

## Désinstallation

```bash
./ssg templates desinstaller form/newsletter-form
```

La désinstallation est refusée si un fichier installé a été personnalisé.
