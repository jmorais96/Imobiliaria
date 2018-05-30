<?php

    require_once('imovel.class.php');

    $bd = new imobiliaria('config.ini');

<<<<<<< HEAD
    $ilha=$_POST['idIlha'];

    $sql='select * from concelho where idIlha = :idIlha';
    $ilha=  array('idIlha' => $ilha);
    $concelho=$bd->query($sql, $ilha);
    foreach ($concelho as $value) {
      echo("<option value=".$value['idConcelho']."   id='index'>".utf8_decode($value['concelho'])."</option>");
    }
=======
    $ilha=$_POST['idIlha']; 

    $bd->selectConcelho($ilha);
    
>>>>>>> 915b4c5e42ee3d0b765291d00ec69b762edf5572

?>
