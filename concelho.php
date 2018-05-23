<?php

    require_once('data/imovel.class.php'); 

    $bd = new imobiliaria('data/config.ini');

    $ilha=$_POST['idIlha'];

    $sql='select * from concelho where idIlha = :idIlha';
    echo("<script> alert('jgjadgjd'); </script>");
    $ilha=  array('idIlha' => $idIlha);
    $concelho=$this->query($sql, $ilha);
    foreach ($concelho as $value) {
      echo("<option value=".$value['idConcelho']."   id='index'>".utf8_decode($value['concelho'])."</option>");
    }

?>