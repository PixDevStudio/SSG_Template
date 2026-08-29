# Structure complète

```text
pix-ssg/
├── docs/                 documentation
├── engine/               moteur PHP
├── plugins/              filtres afterRender
├── public/               statiques copiés à la racine
├── src/
│   ├── components/       blocs HTML réutilisables
│   ├── data/             données JSON et PHP
│   ├── layouts/          enveloppes de pages
│   ├── pages/            pages sources
│   ├── partials/         fragments structurels
│   ├── scripts/          JavaScript
│   ├── styles/           CSS
│   └── template-docs/    README des modèles installés
├── template-sources/     sources HTML/CSS originales
├── templates/            catalogue de 23 modèles
├── tests/
│   ├── js/               tests Vitest
│   └── php/              tests Pest
├── tools/                maintenance du catalogue
├── dist/                 sortie générée
├── vendor/               dépendances Composer générées
├── node_modules/         dépendances npm générées
├── pix-bootstrap         téléchargement d’une nouvelle copie
├── pix-help              aide des commandes publiques
├── pix-install           installation des dépendances
├── pix-upgrade           mise à jour depuis Git
├── pix-build             génération
├── pix-check             contrôles automatisés
├── pix-clean             nettoyage
├── pix-dev               serveur et watcher
└── pix-ssg               CLI pages et catalogue
```

`.ssg/templates.json` est un registre interne créé lors de la première installation d’un modèle. `.phpunit.cache/` est généré par la suite de tests.

Les dossiers `dist/`, `vendor/`, `node_modules/`, `.phpunit.cache/` et le registre interne ne sont pas des sources à éditer au quotidien.
