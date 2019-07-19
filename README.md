# mairie_quartier
Application de répartition par mairie de quartier pour la Ville de Nancy

Configuration du projet :

1. Transférer tout le contenu sur un serveur web de sorte que le nom de domaine pointe sur index.php

2. Créer une nouvelle base de donnée avec phpmyadmin ou en ligne de commande

3. Dans le fichier /model/model.php changer la ligne

$bdd = new PDO('mysql:host=adresse_hôte;dbname=nom_de_la_base_de_donnée', 'utilisateur', 'mots_de_passe');

en mettant vos informations de la base de donnée
