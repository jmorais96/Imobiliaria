<?php

  require_once('imovel.class.php');



  $sql=$_POST['sql'];
  $valores=$_POST['valores'];

  $valores=explode("|",$valores);
  foreach ($valores as $value) {
    $value=explode(":",$value);
    $arr[$value[0]]=$value[1];
  }

  $bd = new imobiliaria('config.ini');
  $bd->pesquisa($sql, $arr);

?>
