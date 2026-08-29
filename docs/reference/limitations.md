# Limites connues

Le périmètre volontairement réduit du moteur le garde lisible et prévisible.

- le front matter n’est pas du YAML complet : aucune liste, structure imbriquée ou syntaxe multiligne;
- les templates n’ont ni conditions, ni boucles, ni macros;
- les composants ne reçoivent pas de paramètres locaux;
- chaque build reconstruit intégralement `dist/`;
- CSS et JavaScript sont copiés sans compilation, regroupement ou minification;
- le seul hook de plugin est `afterRender`;
- le serveur de développement utilise le port fixe 8000 et ne fournit pas HTTPS;
- les permalinks sont des chemins directs, sans système de routes dynamiques;
- tous les fichiers de données sont chargés pour toutes les pages;
- les noms créés par `./pix-ssg new page` sont limités aux minuscules, chiffres, `/`, `_` et `-`;
- les URLs absolues du layout doivent être adaptées pour un déploiement en sous-répertoire.

Une fonctionnalité absente doit être ajoutée avec un contrat clair et des tests. Pour une transformation pure du HTML final, préférez d’abord un plugin afin de préserver le cœur du moteur.
