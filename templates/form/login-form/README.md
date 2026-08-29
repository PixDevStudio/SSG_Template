# Formulaire de connexion

## Installation

```bash
./pix-ssg templates installer form/login-form
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:login-form }}
- Inclusion : `{{ component:login-form }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/login-form.css" />
```

## Personnalisation

Modifiez `src/data/login_form.json`. Le HTML installé se trouve dans `src/components/login-form.html` et le CSS dans `src/styles/templates/login-form.css`.

Variables générées depuis le template original :

- `login_form.url_01` : /
- `login_form.label_01` : Atelier Nord, accueil
- `login_form.text_01` : Atelier
- `login_form.text_02` : Nord
- `login_form.text_03` : Espace membre
- `login_form.text_04` : Retrouvez vos projets là où vous les avez laissés.
- `login_form.text_05` : Un accès simple et sécurisé à votre espace de travail.
- `login_form.text_06` : Assistance disponible du lundi au vendredi.
- `login_form.action_01` : /connexion
- `login_form.text_07` : Bon retour
- `login_form.text_08` : Se connecter
- `login_form.text_09` : Entrez les renseignements associés à votre compte.
- `login_form.text_10` : Adresse courriel
- `login_form.text_11` : Mot de passe
- `login_form.url_02` : /mot-de-passe-oublie
- `login_form.text_12` : Mot de passe oublié?
- `login_form.text_13` : Garder ma session ouverte
- `login_form.text_14` : Continuer
- `login_form.text_15` : →
- `login_form.text_16` : Pas encore de compte?
- `login_form.url_03` : /inscription
- `login_form.text_17` : Créer un compte

Le SSG produit seulement le formulaire HTML. Configurez son attribut `action` vers un service ou une route serveur; ne placez aucun secret dans les données.

## Désinstallation

```bash
./pix-ssg templates desinstaller form/login-form
```

La désinstallation est refusée si un fichier installé a été personnalisé.
