<?php
require 'model/model.php';

$term = utf8_decode($_GET['term']);
$bdd = bdd_connexion();
$cmd = 'SELECT * FROM selection WHERE nom LIKE "%' . $term . '%"';
$query = $bdd->query($cmd);
$list = array();
while ($row = $query->fetch()) {
    $list[] = mb_convert_case(utf8_encode($row['nom']), MB_CASE_TITLE, "UTF-8");
}
echo json_encode($list);