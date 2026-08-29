# Publier une version

pix-ssg utilise le versionnement sémantique `MAJEURE.MINEURE.CORRECTIF` :

- incrémentez `CORRECTIF` pour une correction compatible;
- incrémentez `MINEURE` pour une fonctionnalité compatible;
- incrémentez `MAJEURE` pour un changement incompatible.

## Préparer la version

1. inscrivez la nouvelle version dans `VERSION`, `package.json` et `package-lock.json`;
2. ajoutez les changements dans `CHANGELOG.md`;
3. exécutez `./pix-check`;
4. créez et poussez le commit de version.

## Publier sur GitHub

Créez ensuite un tag annoté qui correspond exactement au fichier `VERSION` :

```bash
git tag -a v1.0.0 -m "pix-ssg 1.0.0"
git push origin main
git push origin v1.0.0
```

Le workflow `.github/workflows/release.yml` vérifie la version, exécute tous les contrôles, puis publie automatiquement :

- `pix-ssg-1.0.0.zip`;
- `pix-ssg-1.0.0.tar.gz`;
- `SHA256SUMS.txt`.

GitHub affiche le nombre de téléchargements de chaque fichier dans la page Releases. L’installation avec `pix-bootstrap` reste recommandée pour bénéficier de `pix-upgrade`; les archives sont surtout destinées aux téléchargements manuels et aux versions conservées.
