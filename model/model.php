<?php

function get_info_ville($nom)
{
    $bdd = bdd_connexion();
    $cmd = 'SELECT * FROM ville WHERE REPLACE(REPLACE(REPLACE(ville, "-", ""), " ", ""), "\'", "") LIKE "%' . $nom . '%"';
    $query = $bdd->query($cmd);
    $count = $query->rowCount();
    if ($count == 0) {
        $req['ville'] = utf8_decode($nom);
        $req['mairie'] = utf8_decode('hôtel de ville');
        $req['alternative'] = utf8_decode('');
        $req['link'] = utf8_decode('https://www.nancy.fr/tous-nos-annuaires/annuaire-nancy-pratique-922/hotel-de-ville-mairie-de-nancy-422.html');
    } else
        $req = $query->fetch();
    return $req;
}

function get_info_rue($nom)
{
    $bdd = bdd_connexion();
    $cmd = 'SELECT * FROM rue WHERE LOCATE(rue, "' . $nom . '") != 0';
    $query = $bdd->query($cmd);
    $req = $query->fetchAll();
    return $req;
}

function bdd_connexion()
{
    try {
        /*
            Changement des informations de la base de donnée ici
        */
        $bdd = new PDO('mysql:host=localhost;dbname=mairie_quartier', 'root', 'root');
        return $bdd;
    } catch (PDOException $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
