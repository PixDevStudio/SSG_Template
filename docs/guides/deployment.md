# Déploiement

pix-ssg produit des fichiers statiques. Seul le contenu de `dist/` doit être publié.

## Préparer une version

```bash
npm run format:check
npm run lint
npm test
./vendor/bin/pest
./pix-clean
./pix-build
```

Inspectez ensuite `dist/index.html`, les chemins d’assets et les pages à permalinks personnalisés.

## Hébergement

Copiez le contenu de `dist/` vers la racine web de l’hébergeur statique, du serveur HTTP ou du CDN. PHP, Composer, Node.js, `engine/` et les sources ne sont pas nécessaires en production.

## Chemins

Le layout fourni utilise des chemins absolus comme `/assets/css/style.css`. Ils conviennent à un déploiement à la racine d’un domaine. Pour un site servi dans un sous-répertoire, adaptez les URLs du layout, des pages et des composants.

## Reproductibilité

Ne corrigez jamais directement un fichier dans `dist/`. Corrigez la source correspondante, relancez le build puis redéployez l’ensemble de la sortie.
