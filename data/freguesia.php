<?php

    require_once('imovel.class.php');

    $bd = new imobiliaria('config.ini');

    $concelho=$_POST['idConcelho'];

    $sql='select * from freguesia where idconcelho = :idConcelho';
    $concelho=  array('idConcelho' => $concelho);
    $freguesia=$bd->query($sql, $concelho);
    foreach ($freguesia as $value) {
      echo("<option value=".$value['idFreguesia']."   id='index'>".utf8_decode($value['freguesia'])."</option>");
    }

?>
