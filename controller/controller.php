<?php
require 'model/model.php';

function index()
{
    require 'view/indexView.php';
}

function ville($tmp, $nom)
{
    $req = get_info_ville($tmp);
    $ville = mb_convert_case(utf8_encode($req['ville']), MB_CASE_TITLE, "UTF-8");
    $mairie = mb_convert_case(utf8_encode($req['mairie']), MB_CASE_TITLE, "UTF-8");
    $alternative = mb_convert_case(utf8_encode($req['alternative']), MB_CASE_TITLE, "UTF-8");
    $link = mb_convert_case(utf8_encode($req['link']), MB_CASE_LOWER, "UTF-8");
    require 'view/villeView.php';
}

function rue($nom, $numero)
{
    $req = get_info_rue($nom);
    $size = count($req);
    $num = intval($numero);
    foreach ($req as $tmp) {
        $debut = intval($tmp['numero_debut']);
        $fin = intval($tmp['numero_fin']);
        $pip = $tmp['pair_impair'];
        if ($debut != 0 || $fin != 0)
            if ($pip == "PAIR") {
                if ($num % 2 == 0 && ($num >= $debut && $num <= $fin))
                    break;
            } else if ($pip == "IMPAIR") {
                if ($num % 2 != 0 && ($num >= $debut && $num <= $fin))
                    break;
            }
    }
    $rue = mb_convert_case(utf8_encode($tmp['rue']), MB_CASE_TITLE, "UTF-8");
    $mairie = mb_convert_case(utf8_encode($tmp['mairie']), MB_CASE_TITLE, "UTF-8");
    $code = intval($tmp['code']);
    $bureau = mb_convert_case(utf8_encode($tmp['bureau']), MB_CASE_TITLE, "UTF-8");
    $link = mb_convert_case(utf8_encode($tmp['link']), MB_CASE_LOWER, "UTF-8");
    if ($size == 0) {
        $rue = mb_convert_case($nom, MB_CASE_TITLE, "UTF-8");
        $mairie = mb_convert_case("hôtel de ville", MB_CASE_TITLE, "UTF-8");
        $code = 0;
        $bureau = '';
        $link = 'https://www.nancy.fr/tous-nos-annuaires/annuaire-nancy-pratique-922/hotel-de-ville-mairie-de-nancy-422.html';
    }
    require 'view/rueView.php';
}