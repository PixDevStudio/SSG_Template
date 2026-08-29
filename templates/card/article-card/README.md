# Cartes article

## Installation

```bash
./ssg templates installer card/article-card
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:article-card }}
- Inclusion : `{{ component:article-card }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/article-card.css" />
```

## Personnalisation

Modifiez `src/data/article_card.json`. Le HTML installé se trouve dans `src/components/article-card.html` et le CSS dans `src/styles/templates/article-card.css`.

Variables générées depuis le template original :

- `article_card.text_01` : Le journal
- `article_card.text_02` : Idées et perspectives
- `article_card.url_01` : /journal
- `article_card.text_03` : Tous les articles
- `article_card.label_01` : Articles récents
- `article_card.url_02` : #architecture
- `article_card.image_01` : https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=1200&q
- `article_card.alt_01` : Maison contemporaine entourée de végétation
- `article_card.text_04` : Architecture
- `article_card.text_05` : 24 août 2026
- `article_card.url_03` : #architecture
- `article_card.text_06` : Construire moins, habiter mieux
- `article_card.text_07` : Trois architectes repensent l’espace domestique avec simplicité et précision.
- `article_card.url_04` : #architecture
- `article_card.text_08` : Lire l’article
- `article_card.text_09` : →
- `article_card.url_05` : #matiere
- `article_card.image_02` : https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=900&q=
- `article_card.alt_02` : Intérieur lumineux avec mobilier en bois
- `article_card.text_10` : Design
- `article_card.text_11` : 18 août 2026
- `article_card.url_06` : #matiere
- `article_card.text_12` : Le retour de la matière
- `article_card.url_07` : #matiere
- `article_card.text_13` : Lire
- `article_card.text_14` : →
- `article_card.url_08` : #atelier
- `article_card.image_03` : https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=900&q=
- `article_card.alt_03` : Carnet ouvert et crayon sur une table
- `article_card.text_15` : Processus
- `article_card.text_16` : 11 août 2026
- `article_card.url_09` : #atelier
- `article_card.text_17` : Dans l’atelier des idées
- `article_card.url_10` : #atelier
- `article_card.text_18` : Lire
- `article_card.text_19` : →

## Désinstallation

```bash
./ssg templates desinstaller card/article-card
```

La désinstallation est refusée si un fichier installé a été personnalisé.
