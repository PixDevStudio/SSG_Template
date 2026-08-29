# Commande install

```bash
./install
```

Exécutez cette commande dans **Bash sous Linux/macOS ou dans WSL**. Ne lancez pas `install` depuis PowerShell : le script utilise la syntaxe et les outils système de Bash.

Pendant une installation interactive, le script propose d’installer `chafa` afin d’afficher des miniatures plus fidèles dans `./ssg templates` et les trois captures dans `./ssg templates info <id>`.

```bash
./install --with-previews     # Installe chafa sans poser la question
./install --without-previews  # Ignore chafa
```

Sous Ubuntu/Debian/WSL, l’installation de `chafa` utilise `apt` et peut demander le mot de passe `sudo` directement dans le terminal. Sans `chafa`, le SSG conserve son rendu ANSI PHP intégré.

## Vérifications

Le script contrôle :

- Bash;
- PHP 8.3 ou plus récent;
- extensions PHP DOM, XMLWriter et mbstring;
- PHP ZIP, `unzip` ou `7z`;
- Node.js et npm;
- Composer.
- Chafa, facultatif pour améliorer les aperçus dans le terminal.

Sous WSL, un Composer Windows non utilisable depuis un chemin UNC est remplacé par un PHAR local. Le téléchargement est vérifié avec la signature officielle.

## Actions

Le script demande confirmation avant d’installer des paquets système, puis exécute Composer et npm, lance les tests Vitest pour contrôler `esbuild`, crée les dossiers requis et rend les commandes exécutables.

Le script npm d’`esbuild` est explicitement autorisé dans `package.json`. Cette autorisation évite l’avertissement `npm warn allow-scripts` et permet à Vite/Vitest de préparer correctement leur configuration.

## Après installation

```bash
./vendor/bin/pest
npm test
./build
```

Si l’installation système automatique n’est pas disponible, installez les prérequis signalés avec le gestionnaire de paquets de votre système puis relancez `./install`.
