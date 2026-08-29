# Commande install

```bash
./pix-install
```

Exécutez cette commande dans **Bash sous Linux/macOS ou dans WSL**. Ne lancez pas `pix-install` depuis PowerShell : le script utilise la syntaxe et les outils système de Bash.

Avant toute vérification ou installation, le script annonce les opérations prévues et demande `Continuer ? [y/N]`. Une réponse autre que `Y` ou `y` annule sans installer de dépendance.

Pour une automatisation déjà approuvée :

```bash
./pix-install --yes
```

Cette option accepte seulement la confirmation initiale. Un paquet système manquant reste signalé séparément avant son installation.

## Vérifications

Le script contrôle :

- Bash;
- PHP 8.3 ou plus récent;
- extensions PHP DOM, XMLWriter et mbstring;
- PHP ZIP, `unzip` ou `7z`;
- Node.js et npm;
- Composer.

Sous WSL, un Composer Windows non utilisable depuis un chemin UNC est remplacé par un PHAR local. Le téléchargement est vérifié avec la signature officielle.

## Actions

Le script demande confirmation avant d’installer des paquets système, puis exécute Composer et npm, lance les tests Vitest pour contrôler `esbuild`, crée les dossiers requis et rend les commandes exécutables.

Le script npm d’`esbuild` est explicitement autorisé dans `package.json`. Cette autorisation évite l’avertissement `npm warn allow-scripts` et permet à Vite/Vitest de préparer correctement leur configuration.

## Après installation

```bash
./vendor/bin/pest
npm test
./pix-build
```

Si l’installation système automatique n’est pas disponible, installez les prérequis signalés avec le gestionnaire de paquets de votre système puis relancez `./pix-install`.
