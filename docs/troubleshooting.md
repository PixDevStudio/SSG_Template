# Dépannage

## Layout introuvable

Vérifiez que `layout: nom` correspond exactement à `src/layouts/nom.html`, y compris la casse.

## Variable de template inconnue

Repérez la variable affichée dans l’erreur. Pour `{{ site.name }}`, vérifiez `src/data/site.json` et la clé `name`. Pour `{{ page.title }}`, ajoutez `title` au front matter.

## Template introuvable

Une inclusion `{{ partial:header }}` requiert `src/partials/header.html`; `{{ component:card }}` requiert `src/components/card.html`.

## Front matter invalide

Le bloc doit commencer au premier caractère du fichier et posséder un second séparateur `---`. Chaque ligne active doit contenir `:`. Le parseur n’accepte pas le YAML complexe.

## JSON invalide

Validez la syntaxe du fichier signalé : guillemets doubles, aucune virgule finale et accolades équilibrées.

## Port 8000 occupé

Arrêtez l’autre serveur utilisant le port, puis relancez `./dev`. Le port n’est pas configurable actuellement.

## Installation d’un modèle refusée

Un fichier cible existe déjà ou le modèle est enregistré. Utilisez `./ssg templates info <id>` et examinez `.ssg/templates.json` avant toute action manuelle.

## Désinstallation refusée

Le modèle contient des fichiers modifiés. Sauvegardez-les, comparez-les au paquet d’origine et retirez explicitement ce que vous ne souhaitez plus conserver.

## Tests PHP indisponibles

Relancez `./install`, vérifiez `php --version` et les extensions DOM, XMLWriter et mbstring, puis `composer install`.

## Formatage en échec

Lancez `npm run format`, examinez les modifications puis répétez `npm run format:check`.
