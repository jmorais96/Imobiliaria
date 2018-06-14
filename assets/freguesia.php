<?php

    require_once('../data/imovel.class.php');

    $bd = new imobiliaria('../data/config.ini');

    $concelho=$_POST['idConcelho'];

    $bd->selectFreguesia($concelho);

?>
