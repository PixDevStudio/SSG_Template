# Dossier template-sources

`template-sources/` conserve les bibliothèques HTML/CSS originales utilisées pour construire une partie du catalogue.

## Contenu

```text
template-sources/
├── Array_Template/
├── Cards_Templates/
├── Footer_Template/
├── Form/
├── Header_Template/
└── SideBar_Template/
```

Chaque sous-dossier contient les démonstrations originales, généralement sous la forme `index.html` et `style.css`.

## Relation avec le catalogue

Les trois niveaux ont des rôles différents :

| Dossier             | Rôle                                                                   |
| ------------------- | ---------------------------------------------------------------------- |
| `template-sources/` | sources HTML/CSS originales                                            |
| `templates/`        | paquets convertis et installables par la CLI                           |
| `src/`              | partials, composants, styles et données installés dans le site courant |

Le build normal et la CLI de templates ne lisent pas `template-sources/`. Ils utilisent uniquement `templates/` et `src/`.

## Régénérer le catalogue

L’utilitaire de maintenance lit ces sources :

```bash
php tools/import-template-library.php --force
```

Il reconstruit 17 paquets dans `templates/` en extrayant le fragment HTML utile, en copiant le CSS et en générant les données, le manifeste et le README.

Les six paquets de référence écrits manuellement ne sont pas régénérés par cet importeur.

## Précautions

- conservez ce dossier si vous souhaitez actualiser les paquets depuis leurs modèles d’origine;
- ne modifiez pas simultanément une source et son paquet généré sans déterminer laquelle fait autorité;
- sauvegardez les personnalisations d’un paquet avant une régénération avec `--force`;
- exécutez les tests du catalogue après chaque import.

La suppression de `template-sources/` n’empêche pas le SSG de construire un site, mais rend impossible la régénération automatique des 17 paquets concernés.
