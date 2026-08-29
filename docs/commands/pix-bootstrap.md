# Commande pix-bootstrap

Une nouvelle copie du SSG peut être installée directement depuis Bash ou WSL :

```bash
bash <(curl -fsSL https://raw.githubusercontent.com/PixDevStudio/SSG_Template/main/pix-bootstrap)
```

La commande télécharge `pix-bootstrap` depuis le dépôt public, affiche les opérations prévues, demande une confirmation `Y/N`, clone le dépôt officiel dans `pix-ssg`, puis lance `./pix-install --yes`.

Choisir un dossier différent :

```bash
bash <(curl -fsSL https://raw.githubusercontent.com/PixDevStudio/SSG_Template/main/pix-bootstrap) mon-site
```

Pour une automatisation non interactive déjà approuvée :

```bash
bash <(curl -fsSL https://raw.githubusercontent.com/PixDevStudio/SSG_Template/main/pix-bootstrap) mon-site --yes
```

Git reste requis en interne afin que la copie conserve son historique et puisse recevoir les mises à jour avec `./pix-upgrade`.
