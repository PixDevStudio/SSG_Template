# Cartes profil

## Installation

```bash
./ssg templates installer card/profile-card
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:profile-card }}
- Inclusion : `{{ component:profile-card }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/profile-card.css" />
```

## Personnalisation

Modifiez `src/data/profile_card.json`. Le HTML installé se trouve dans `src/components/profile-card.html` et le CSS dans `src/styles/templates/profile-card.css`.

Variables générées depuis le template original :

- `profile_card.text_01` : L’équipe
- `profile_card.text_02` : Des expertises qui se complètent.
- `profile_card.label_01` : Membres de l’équipe
- `profile_card.image_01` : https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=700&q=
- `profile_card.alt_01` : Portrait de Marie Côté
- `profile_card.text_03` : Disponible
- `profile_card.text_04` : Marie Côté
- `profile_card.text_05` : Directrice artistique
- `profile_card.label_02` : Expertises
- `profile_card.text_06` : Identité
- `profile_card.text_07` : Direction photo
- `profile_card.url_01` : mailto:marie@exemple.ca
- `profile_card.text_08` : Écrire à Marie
- `profile_card.text_09` : →
- `profile_card.image_02` : https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=700&q=
- `profile_card.alt_02` : Portrait d’Alex Leblanc
- `profile_card.text_10` : En projet
- `profile_card.text_11` : Alex Leblanc
- `profile_card.text_12` : Développeur principal
- `profile_card.label_03` : Expertises
- `profile_card.text_13` : Architecture
- `profile_card.text_14` : Performance
- `profile_card.url_02` : mailto:alex@exemple.ca
- `profile_card.text_15` : Écrire à Alex
- `profile_card.text_16` : →
- `profile_card.image_03` : https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=700&q=
- `profile_card.alt_03` : Portrait de Sam Lee
- `profile_card.text_17` : Disponible
- `profile_card.text_18` : Sam Lee
- `profile_card.text_19` : Stratège numérique
- `profile_card.label_04` : Expertises
- `profile_card.text_20` : Recherche
- `profile_card.text_21` : Contenu
- `profile_card.url_03` : mailto:sam@exemple.ca
- `profile_card.text_22` : Écrire à Sam
- `profile_card.text_23` : →

## Désinstallation

```bash
./ssg templates desinstaller card/profile-card
```

La désinstallation est refusée si un fichier installé a été personnalisé.
