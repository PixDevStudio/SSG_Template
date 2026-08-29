# Bien démarrer

## Prérequis

Mon SSG nécessite Bash, PHP 8.3+, Node.js, npm et Composer. Pest requiert aussi DOM, XMLWriter et mbstring. Composer doit pouvoir extraire les archives avec PHP ZIP, `unzip` ou `7z`.

Utilisez un terminal **Bash sous Linux/macOS ou WSL**. N’exécutez pas les scripts depuis PowerShell.

## Installation

Depuis la racine du projet :

```bash
./install
```

Le script vérifie l’environnement, demande confirmation avant toute installation système, installe les dépendances et prépare les dossiers.

Il propose également `chafa` pour améliorer les images affichées par le catalogue :

```bash
./install --with-previews
```

Cette application reste facultative, car un rendu ANSI PHP est inclus dans le SSG.

## Mise à jour

Dans une copie Git sans modification non enregistrée :

```bash
./upgrade --check
./upgrade
```

La commande récupère une nouvelle version en avance directe puis relance `./install`. Elle refuse les modifications locales et historiques divergents afin de ne rien écraser.

## Première page

```bash
./ssg new page contact
```

Cette commande crée `src/pages/contact.html` sans écraser un fichier existant. Modifiez ensuite son front matter et son HTML.

## Développement

```bash
./dev
```

Le site est servi sur `http://localhost:8000`. Les changements dans `src/`, `public/` ou `plugins/` déclenchent un nouveau build. Utilisez `Ctrl+C` pour arrêter proprement le watcher et libérer le port.

## Génération manuelle

```bash
./clean
./build
```

Le résultat final est dans `dist/`. Les sources de `src/` et `public/` ne sont jamais modifiées par ces commandes.

## Ajouter un modèle

```bash
./ssg templates
./ssg templates info header/header-basic
./ssg templates installer header/header-basic
```

La commande `info` indique le fichier cible, la position exacte, le CSS et le fichier de données à modifier.

## Vérification du projet

```bash
./vendor/bin/pest
npm test
npm run lint
npm run format:check
```

Consultez [les commandes](commands/README.md) pour les détails et [le dépannage](troubleshooting.md) en cas d’échec.
