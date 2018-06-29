<?php

  // Incluir a classe Imobiliária
  require_once('../data/imobiliaria.class.php');

  // Incluir a classe Funcionario
  require_once('../data/funcionario.class.php');

  // Incluir a classe Imovel
  require_once('../data/imovel.class.php');

  // Incluir a classe imagem
  require_once('../data/imagem.class.php');

  // Incluir a classe user
  require_once('../data/user.class.php');

  // Incluir a classe visita
  require_once('../data/visita.class.php');

  session_start();
  // Reencaminhar o utilizar para o índex caso este não seja um funcionário
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }

  // Ligação à base de dados
  $bd = new imobiliaria("../data/config.ini");

  // Listar todos os imóveis registadis na base de dados 
  $id=$bd->query("select idImovel from todosimoveis");
  foreach ($id as $value) {
    $imoveis[]=$bd->getImovel($value['idImovel']);
  }

  // Procedimentos associados ao ficheiro CSV 'local'
  header('Content-Type: application/csv; charset=UTF-8');
  header('Content-Disposition: attachment;filename="local.csv";');

  // Abrir o ficheiro 'local.csv' e introduzir dados no mesmo
  $file=fopen("php://output", "w");
  foreach ($bd->query('SELECT ilha FROM ilha') as $value) {
    $total=0;
    foreach ($imoveis as $imovel) {
      if($imovel->getIlha()==$value['ilha']){
        ++$total;
      }
    }
    fputcsv($file, array( ($value['ilha']),$total ), ";");
  }
  fclose($file);

?>