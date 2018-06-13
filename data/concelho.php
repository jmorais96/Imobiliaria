<?php

    require_once('imovel.class.php');

    $bd = new imobiliaria('config.ini');

    $ilha=$_POST['idIlha']; 

    $bd->selectConcelho($ilha);

?>
