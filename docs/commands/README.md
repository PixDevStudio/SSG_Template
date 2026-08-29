# Commandes

Toutes les commandes se lancent depuis la racine du SSG.

| Commande                            | Fonction                                            |
| ----------------------------------- | --------------------------------------------------- |
| [`pix-bootstrap`](pix-bootstrap.md) | télécharge et installe une nouvelle copie           |
| [`./pix-help`](pix-help.md)         | affiche toutes les commandes publiques              |
| [`./pix-install`](pix-install.md)   | vérifie l’environnement et installe les dépendances |
| [`./pix-upgrade`](pix-upgrade.md)   | récupère et applique une nouvelle version du SSG    |
| [`./pix-build`](pix-build-clean.md) | reconstruit le site dans `dist/`                    |
| [`./pix-clean`](pix-build-clean.md) | vide uniquement `dist/`                             |
| [`./pix-dev`](pix-dev.md)           | build, serveur local et surveillance                |
| [`./pix-ssg new page`](pix-ssg.md)  | crée une page source                                |
| [`./pix-ssg templates`](pix-ssg.md) | gère le catalogue de modèles                        |
| `./pix-check`                       | exécute tous les tests et contrôles                 |
| `./vendor/bin/pest`                 | exécute les tests PHP                               |
| `npm test`                          | exécute les tests JavaScript                        |
| `npm run lint`                      | analyse le JavaScript                               |
| `npm run format`                    | formate les fichiers pris en charge                 |
| `npm run format:check`              | vérifie le formatage sans écrire                    |

Les commandes publiques renvoient un code non nul en cas d’erreur, ce qui permet leur utilisation dans une intégration continue.
