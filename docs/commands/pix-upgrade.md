# Commande upgrade

```bash
./pix-upgrade
```

Exécutez cette commande dans **Bash sous Linux/macOS ou dans WSL**, jamais dans PowerShell.

La source officielle est `https://github.com/PixDevStudio/SSG_Template.git`. La commande crée automatiquement le remote Git `ssg-upstream`; elle ne dépend donc pas du remote `origin` et ne demande aucun `git pull` manuel.

## Fonctionnement

La commande :

1. vérifie que le projet est une copie Git placée sur une branche;
2. refuse de continuer si des modifications locales ne sont pas enregistrées;
3. configure le dépôt officiel sous le nom `ssg-upstream`;
4. récupère les nouveautés de sa branche `main`;
5. refuse les historiques divergents qui nécessitent une décision humaine;
6. applique une mise à jour Git en avance directe;
7. exécute le nouveau `./pix-install` pour actualiser Composer, npm, les outils et les permissions.

Le script s’exécute depuis une copie temporaire afin qu’une nouvelle version puisse remplacer le fichier `pix-upgrade` en cours d’utilisation.

## Vérifier sans appliquer

```bash
./pix-upgrade --check
```

Cette option télécharge uniquement les informations Git et indique si une version plus récente existe.

## Ancienne installation sans upgrade

Téléchargez une seule fois la commande officielle, sans utiliser `git pull` :

```bash
curl -fsSL \
	https://raw.githubusercontent.com/PixDevStudio/SSG_Template/main/upgrade \
	-o upgrade
chmod +x upgrade
./pix-upgrade
```

Les mises à jour suivantes se feront simplement avec `./pix-upgrade`.

## Modifications locales

L’upgrade n’écrase jamais une modification non enregistrée. Avant de le relancer, choisissez explicitement une méthode :

```bash
git add . && git commit -m "Personnalisation du site"
```

ou temporairement :

```bash
git stash push -u
./pix-upgrade
git stash pop
```

Si la branche locale et la branche officielle ont divergé, utilisez Git pour fusionner ou rebaser les changements. La commande ne choisit pas automatiquement à votre place.

Une archive ZIP sans dossier `.git` ne peut pas utiliser `./pix-upgrade`; téléchargez alors la nouvelle version manuellement.
