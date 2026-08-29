# Ajouter un template au catalogue

Chaque template occupe `templates/<catégorie>/<nom>/` et contient un manifeste, un README et les fichiers à installer.

Le catalogue livré contient 23 modèles répartis dans les catégories `header`, `footer`, `sidebar`, `card`, `form` et `table`.

```text
templates/card/product-card/
├── manifest.json
├── README.md
└── files/
    ├── product-card.html
    ├── product-card.css
    └── product_card.json
```

## Manifeste

```json
{
  "id": "card/product-card",
  "category": "card",
  "name": "Product Card",
  "description": "Carte produit configurable.",
  "include": "{{ component:product-card }}",
  "files": {
    "files/product-card.html": "src/components/product-card.html",
    "files/product-card.css": "src/styles/templates/product-card.css",
    "files/product_card.json": "src/data/product_card.json",
    "README.md": "src/template-docs/card/product-card/README.md"
  }
}
```

L’identifiant doit correspondre aux deux dossiers. Une destination doit rester sous `src/`. Les catégories recommandées sont `header`, `footer`, `sidebar`, `form`, `table` et `card`.

## Destination selon le type

- Header, footer et sidebar : `src/partials/<nom>.html`, inclus avec `{{ partial:nom }}`.
- Carte, formulaire et tableau : `src/components/<nom>.html`, inclus avec `{{ component:nom }}`.
- CSS : `src/styles/templates/<nom>.css`, puis lien `/assets/css/templates/<nom>.css` dans le layout.
- Données : `src/data/<clé>.json`, accessibles avec `{{ clé.variable }}`.
- Documentation : `src/template-docs/<catégorie>/<nom>/README.md`.

Les clés de données utilisent des lettres, chiffres et `_`, pas de tiret. Les valeurs `{{ variable }}` sont échappées automatiquement. Réservez `{{{ variable }}}` au HTML de confiance.

## README obligatoire

Le README de chaque template doit expliquer :

1. la commande d’installation;
2. les lignes à ajouter au layout ou à la page;
3. le lien CSS à ajouter;
4. toutes les variables disponibles et leur fichier JSON;
5. les assets externes ou locaux;
6. la commande de désinstallation.

## Vérification

```bash
./ssg templates
./ssg templates info <catégorie/nom>
./ssg templates install <catégorie/nom>
./build
./ssg templates remove <catégorie/nom>
```
