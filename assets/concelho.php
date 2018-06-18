<?php

    require_once('../data/imobiliaria.class.php');
    require_once('../data/imovel.class.php');

    $bd = new imobiliaria('../data/config.ini');

    $ilha=$_POST['idIlha'];

    $bd->selectConcelho($ilha);

?>
