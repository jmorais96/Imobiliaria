<?php

  require_once('../data/imobiliaria.class.php');
    require_once('../data/imovel.class.php');
  require_once('../data/imagem.class.php');


  $sql=$_POST['sql'];
  $valores=$_POST['valores'];

  $valores=explode("|",$valores);
  foreach ($valores as $value) {
    $value=explode(":",$value);
    $arr[$value[0]]=$value[1];
  }

  $bd = new imobiliaria('../data/config.ini');
  $bd->pesquisa($sql, $arr);

?>
