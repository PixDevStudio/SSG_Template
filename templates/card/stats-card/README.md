# Cartes statistiques

## Installation

```bash
./ssg templates installer card/stats-card
```

## Intégration

- Fichier cible : `src/pages/<nom-de-page>.html`
- Emplacement : Dans <main>, à l’endroit où le composant doit apparaître : {{ component:stats-card }}
- Inclusion : `{{ component:stats-card }}`

Ajoutez aussi cette ligne dans le `<head>` de `src/layouts/default.html` :

```html
<link rel="stylesheet" href="/assets/css/templates/stats-card.css" />
```

## Personnalisation

Modifiez `src/data/stats_card.json`. Le HTML installé se trouve dans `src/components/stats-card.html` et le CSS dans `src/styles/templates/stats-card.css`.

Variables générées depuis le template original :

- `stats_card.text_01` : Performance
- `stats_card.text_02` : Vue d’ensemble
- `stats_card.text_03` : Période
- `stats_card.text_04` : 7 derniers jours
- `stats_card.text_05` : 30 derniers jours
- `stats_card.text_06` : Cette année
- `stats_card.label_01` : Statistiques principales
- `stats_card.text_07` : Revenus
- `stats_card.label_02` : Hausse de 12,4 pour cent
- `stats_card.text_08` : ↗ 12,4 %
- `stats_card.text_09` : 42 840 $
- `stats_card.text_10` : contre 38 114 $ précédemment
- `stats_card.text_11` : Nouveaux clients
- `stats_card.label_03` : Hausse de 8,1 pour cent
- `stats_card.text_12` : ↗ 8,1 %
- `stats_card.text_13` : 184
- `stats_card.text_14` : 14 clients de plus
- `stats_card.text_15` : Taux de conversion
- `stats_card.label_04` : Baisse de 1,7 pour cent
- `stats_card.text_16` : ↘ 1,7 %
- `stats_card.text_17` : 4,82 %
- `stats_card.text_18` : contre 4,90 % précédemment
- `stats_card.text_19` : Temps moyen
- `stats_card.label_05` : Hausse de 5,3 pour cent
- `stats_card.text_20` : ↗ 5,3 %
- `stats_card.text_21` : 3 min 42 s
- `stats_card.text_22` : 11 secondes de plus

## Désinstallation

```bash
./ssg templates desinstaller card/stats-card
```

La désinstallation est refusée si un fichier installé a été personnalisé.
