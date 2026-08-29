# Formulaire d’inscription

## Installation

```bash
./ssg templates installer form/signup-form
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:signup-form }}
- Inclusion : `{{ component:signup-form }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/signup-form.css" />
```

## Personnalisation

Modifiez `src/data/signup_form.json`. Le HTML installé se trouve dans `src/components/signup-form.html` et le CSS dans `src/styles/templates/signup-form.css`.

Variables générées depuis le template original :

- `signup_form.url_01` : /
- `signup_form.label_01` : Collectif, accueil
- `signup_form.text_01` : COLLECTIF
- `signup_form.text_02` : +
- `signup_form.text_03` : Créer votre espace
- `signup_form.text_04` : Commençons par faire connaissance.
- `signup_form.text_05` : Déjà membre?
- `signup_form.url_02` : /connexion
- `signup_form.text_06` : Se connecter
- `signup_form.action_01` : /inscription
- `signup_form.text_07` : Prénom
- `signup_form.text_08` : Nom
- `signup_form.text_09` : Adresse courriel
- `signup_form.text_10` : Mot de passe
- `signup_form.text_11` : Au moins 8 caractères.
- `signup_form.text_12` : Confirmer le mot de passe
- `signup_form.text_13` : J’accepte les
- `signup_form.url_03` : /conditions
- `signup_form.text_14` : conditions d’utilisation
- `signup_form.text_15` : et la
- `signup_form.url_04` : /confidentialite
- `signup_form.text_16` : politique de confidentialité
- `signup_form.text_17` : .
- `signup_form.text_18` : Créer mon compte
- `signup_form.text_19` : →

Le SSG produit seulement le formulaire HTML. Configurez son attribut `action` vers un service ou une route serveur; ne placez aucun secret dans les données.

## Désinstallation

```bash
./ssg templates desinstaller form/signup-form
```

La désinstallation est refusée si un fichier installé a été personnalisé.
