# Configuration PHPUnit utilisée par Pest

Pest s’appuie sur `phpunit.xml` pour découvrir et préparer les tests.

## Configuration du SSG

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="engine/bootstrap.php"
         cacheDirectory=".phpunit.cache"
         colors="true">
    <testsuites>
        <testsuite name="pix-ssg">
            <directory>tests/php</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Le fichier réel contient aussi la référence au schéma PHPUnit.

## Options importantes

| Option           | Fonction                           |
| ---------------- | ---------------------------------- |
| `bootstrap`      | charge les classes avant les tests |
| `cacheDirectory` | stocke le cache local de PHPUnit   |
| `colors`         | colore la sortie du terminal       |
| `testsuite`      | nomme un groupe de tests           |
| `directory`      | indique où rechercher les tests    |

## Ajouter une suite

Une seconde suite peut cibler un autre dossier :

```xml
<testsuite name="Intégration">
    <directory>tests/integration</directory>
</testsuite>
```

N’ajoutez une suite séparée que si son cycle d’exécution ou son coût diffère réellement.

## Vérification

```bash
./vendor/bin/pest
```

Pest lit automatiquement `phpunit.xml` depuis la racine du projet.
