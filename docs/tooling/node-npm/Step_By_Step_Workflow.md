# Workflow Node.js et npm pas à pas

## 1. Vérifier l’environnement

```bash
node --version
npm --version
```

Node.js exécute les outils de développement. Il n’est pas requis pour héberger le site statique final.

## 2. Installer le projet

```bash
npm install
```

npm lit `package.json`, respecte `package-lock.json` et crée `node_modules/`.

## 3. Exécuter les contrôles

```bash
npm test
npm run lint
npm run format:check
```

Ces scripts lancent respectivement Vitest, ESLint et Prettier.

## 4. Ajouter un outil de développement

```bash
npm install --save-dev nom-du-paquet
```

Cette commande met à jour `package.json` et `package-lock.json`.

## 5. Retirer un paquet

```bash
npm uninstall nom-du-paquet
```

Vérifiez ensuite qu’aucun import ni script ne le référence encore.

## Workflow à retenir

```text
Installer depuis le lockfile
    ↓
Modifier le JavaScript ou sa configuration
    ↓
Lancer le test ciblé
    ↓
Exécuter test, lint et format:check
    ↓
Contrôler package.json et package-lock.json
```
