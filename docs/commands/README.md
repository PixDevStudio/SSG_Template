# Commandes

Toutes les commandes se lancent depuis la racine du SSG.

| Commande                    | Fonction                                            |
| --------------------------- | --------------------------------------------------- |
| [`./install`](install.md)   | vérifie l’environnement et installe les dépendances |
| [`./upgrade`](upgrade.md)   | récupère et applique une nouvelle version du SSG    |
| [`./build`](build-clean.md) | reconstruit le site dans `dist/`                    |
| [`./clean`](build-clean.md) | vide uniquement `dist/`                             |
| [`./dev`](dev.md)           | build, serveur local et surveillance                |
| [`./ssg new page`](ssg.md)  | crée une page source                                |
| [`./ssg templates`](ssg.md) | gère le catalogue de modèles                        |
| `./vendor/bin/pest`         | exécute les tests PHP                               |
| `npm test`                  | exécute les tests JavaScript                        |
| `npm run lint`              | analyse le JavaScript                               |
| `npm run format`            | formate les fichiers pris en charge                 |
| `npm run format:check`      | vérifie le formatage sans écrire                    |

Les commandes publiques renvoient un code non nul en cas d’erreur, ce qui permet leur utilisation dans une intégration continue.
