# Commande dev

```bash
./pix-dev
```

La commande :

1. effectue un premier build;
2. lance le serveur PHP sur `http://127.0.0.1:8000`;
3. surveille `src/`, `public/` et `plugins/`;
4. reconstruit le site après chaque changement détecté.

La surveillance compare périodiquement les empreintes des fichiers. Il peut donc s’écouler environ une seconde avant le rebuild.

## Arrêt

Utilisez `Ctrl+C`. Le script arrête le serveur enfant, libère le port et quitte avec le code d’interruption standard.

## Port occupé

Le port 8000 est fixe. Si le démarrage est refusé, arrêtez le processus qui l’utilise avant de relancer `./pix-dev`.

Le serveur PHP intégré convient au développement local seulement. Il n’apporte ni HTTPS, ni cache de production, ni compression.
