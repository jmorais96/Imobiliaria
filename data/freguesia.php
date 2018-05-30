<?php

    require_once('imovel.class.php');

    $bd = new imobiliaria('config.ini');

    $concelho=$_POST['idConcelho'];

    $bd->selectFreguesia($concelho);

?>
