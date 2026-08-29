# Dossiers du projet

| Dossier                      | Rôle                                | Modifiable directement              |
| ---------------------------- | ----------------------------------- | ----------------------------------- |
| [`src/`](src.md)             | Sources du site                     | Oui                                 |
| [`public/`](public.md)       | Fichiers copiés sans transformation | Oui                                 |
| [`engine/`](engine.md)       | Moteur PHP du générateur            | Seulement pour faire évoluer le SSG |
| [`plugins/`](plugins.md)     | Extensions du pipeline              | Oui                                 |
| [`templates/`](templates.md) | Catalogue de modèles installables   | Oui, selon le format documenté      |
| [`tests/`](tests.md)         | Tests PHP et JavaScript             | Oui                                 |
| [`tools/`](tools.md)         | Utilitaires de maintenance          | Avec prudence                       |
| [`dist/`](dist.md)           | Site généré                         | Non                                 |

À la racine, les fichiers `install`, `build`, `clean`, `dev` et `ssg` sont les commandes publiques. Les fichiers `composer.json`, `package.json`, `phpunit.xml` et `eslint.config.js` configurent les outils de développement.

## Sous-dossiers de src

- [`src/pages/`](src-pages.md)
- [`src/layouts/`](src-layouts.md)
- [`src/partials/`](src-partials.md)
- [`src/components/`](src-components.md)
- [`src/data/`](src-data.md)
- [`src/styles/`](src-styles.md)
- [`src/scripts/`](src-scripts.md)
- [`src/template-docs/`](src-template-docs.md)
