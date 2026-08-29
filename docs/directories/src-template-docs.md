# Dossier src/template-docs

`src/template-docs/` reçoit les README des modèles installés par le catalogue. Ces fichiers décrivent les variables, le CSS et l’intégration propres à chaque modèle.

Ils ne participent pas au build HTML et ne sont pas copiés dans `dist/`. Conservez-les tant que le modèle est installé : ils font partie des fichiers suivis par `.ssg/templates.json`.

Une modification est autorisée, mais elle sera détectée lors d’une désinstallation et empêchera la suppression automatique afin de protéger votre travail.
