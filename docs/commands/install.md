# Commande install

```bash
./install
```

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

Le script demande confirmation avant d’installer des paquets système, puis exécute Composer et npm, crée les dossiers requis et rend les commandes exécutables.

## Après installation

```bash
./vendor/bin/pest
npm test
./build
```

Si l’installation système automatique n’est pas disponible, installez les prérequis signalés avec le gestionnaire de paquets de votre système puis relancez `./install`.
