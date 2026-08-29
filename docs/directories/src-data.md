# Dossier src/data

`src/data/` contient les fichiers `.json` et `.php` chargés dans le contexte de chaque page. Le nom de fichier sans extension devient la clé racine : `site.json` fournit `site.*`.

Un fichier PHP doit retourner un tableau. Un fichier JSON doit contenir un JSON valide. Les autres extensions sont ignorées.

Toutes les données sont intégrées au rendu public; ne placez ici ni mot de passe, ni jeton, ni configuration privée. Voir le [guide des données](../guides/data.md).
