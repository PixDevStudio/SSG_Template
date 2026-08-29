# Workflow Prettier pas à pas

## 1. Vérifier le formatage

```bash
npm run format:check
```

Cette commande ne modifie rien. Elle liste les fichiers qui ne suivent pas le format attendu.

## 2. Formater les fichiers

Pour tout le projet :

```bash
npm run format
```

Pour un seul fichier :

```bash
npx prettier --write docs/README.md
```

## 3. Examiner les changements

Le formatage peut modifier les retours à la ligne, l’indentation, les guillemets et la présentation Markdown. Vérifiez que seuls les fichiers attendus ont changé.

## 4. Relancer le contrôle

```bash
npm run format:check
```

## 5. Exécuter les tests appropriés

Prettier ne valide pas le comportement :

```bash
npm test
npm run lint
./vendor/bin/pest
```

## Workflow à retenir

```text
Vérifier
    ↓
Formater
    ↓
Examiner les changements
    ↓
Vérifier de nouveau
    ↓
Exécuter tests et lint
```
