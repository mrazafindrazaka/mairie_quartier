<?php
require 'controller/controller.php';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];

    if ($page == 'example') {
        echo 'Page exemple ' . $_GET['nom'];
    } else if ($page == 'ville') {
        if (isset($_GET['nom'])) {
            $nom = urldecode($_GET['nom']);
            $tmp = str_replace(str_split("-'/ \\"), "", utf8_decode($nom));
            ville($tmp, $nom);
        } else {
            http_response_code(404);
            die('Page inexistante');
        }
    } else if ($page == 'rue') {
        if (isset($_GET['nom']) && isset($_GET['numero'])) {
            $nom = $_GET['nom'];
            $numero = $_GET['numero'];
            rue($nom, $numero);
        } else {
            http_response_code(404);
            die('Page inexistante');
        }
    } else {
        http_response_code(404);
        die('Page inexistante');
    }
}
else {
    index();
}