# Commandes PHP et Composer

## PHP

| Commande                        | Utilité                          |
| ------------------------------- | -------------------------------- |
| `php --version`                 | afficher la version active       |
| `php -m`                        | lister les extensions chargées   |
| `php -l fichier.php`            | vérifier la syntaxe d’un fichier |
| `php script.php`                | exécuter un script PHP           |
| `php -S 127.0.0.1:8000 -t dist` | servir localement `dist/`        |

## Composer

| Commande                        | Utilité                                 |
| ------------------------------- | --------------------------------------- |
| `composer install`              | installer les versions verrouillées     |
| `composer update`               | recalculer les versions autorisées      |
| `composer require paquet`       | ajouter une dépendance de production    |
| `composer require --dev paquet` | ajouter une dépendance de développement |
| `composer remove paquet`        | retirer une dépendance                  |
| `composer dump-autoload`        | régénérer l’autoload                    |
| `composer show`                 | afficher les paquets installés          |
| `composer outdated`             | repérer les mises à jour disponibles    |
| `composer validate`             | vérifier `composer.json` et le lockfile |
| `composer test`                 | lancer le script Pest du projet         |

## Choisir entre install et update

Utilisez `composer install` pour reproduire le projet. Utilisez `composer update` uniquement lorsque vous souhaitez réellement modifier les versions dans `composer.lock`.
