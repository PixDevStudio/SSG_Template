# Corriger un problème ESLint pas à pas

## 1. Lancer l’analyse

```bash
npm run lint
```

ESLint affiche le fichier, la ligne, la règle et une description.

## 2. Lire la règle

Exemple :

```text
tests/js/example.test.js
  4:3  error  'document' is not defined  no-undef
```

Le code peut contenir une faute, ou le fichier peut utiliser un environnement qui n’est pas déclaré.

## 3. Corriger la cause

Pour un vrai oubli, déclarez ou importez la valeur. Pour un test exécuté sous jsdom, configurez les globales navigateur dans `eslint.config.js`.

Évitez de masquer le problème avec une désactivation globale.

## 4. Relancer ESLint

```bash
npm run lint
```

## 5. Exécuter les tests

```bash
npm test
```

Une correction de lint ne garantit pas le comportement fonctionnel.

## Workflow à retenir

```text
Lire le message et la règle
    ↓
Identifier erreur de code ou environnement manquant
    ↓
Corriger au niveau le plus précis
    ↓
Relancer ESLint
    ↓
Relancer les tests
```
