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


  // Criar a ligação à base de dados
  $bd = new imobiliaria("../data/config.ini");

  $id=$bd->query("select idImovel from todosimoveis");
  foreach ($id as $value) {
    $imoveis[]=$bd->getImovel($value['idImovel']);
  }
  //inicializar os intrevalos de preço
  $pm50=0;
  $p50_100=0;
  $p100_200=0;
  $p200_300=0;
  $p300_400=0;
  $p400_500=0;
  $p500_600=0;
  $p600_700=0;
  $p700_800=0;
  $p800_900=0;
  $p900_1000=0;
  $pM1000=0;




  //verificar em vendas o valor e incrementar segundo o intrevalo
  foreach ($imoveis as $imovel) {
    if ($imovel->getPreco()<50000) {
      ++$pm50;
    }elseif ($imovel->getPreco()<100000) {
      ++$p50_100;
    }elseif ($imovel->getPreco()<200000) {
      ++$p100_200;
    }elseif ($imovel->getPreco()<300000) {
      ++$p200_300;
    }elseif ($imovel->getPreco()<400000) {
      ++$p300_400;
    }elseif ($imovel->getPreco()<500000) {
      ++$p400_500;
    }elseif ($imovel->getPreco()<600000) {
      ++$p500_600;
    }elseif ($imovel->getPreco()<700000) {
      ++$p600_700;
    }elseif ($imovel->getPreco()<800000) {
      ++$p700_800;
    }elseif ($imovel->getPreco()<900000) {
      ++$p800_900;
    }elseif ($imovel->getPreco()<1000000) {
      ++$p900_1000;
    }else{
      ++$pM1000;
    }
  }

  header('Content-Type: application/csv; charset=UTF-8');
  header('Content-Disposition: attachment;filename="preco.csv";');

  $file=fopen("php://output", "w");

  fputcsv($file, array( utf8_decode("Menos de 50000 Euros"),$pm50 ), ";");
  fputcsv($file, array( utf8_decode("Entre 50000 a 100000 Euros"),$p50_100 ), ";");
  fputcsv($file, array( utf8_decode("Entre 100000 a 200000 Euros"),$p100_200 ), ";");
  fputcsv($file, array( utf8_decode("Entre 200000 a 300000 Euros"),$p200_300 ), ";");
  fputcsv($file, array( utf8_decode("Entre 300000 a 400000 Euros"),$p300_400 ), ";");
  fputcsv($file, array( utf8_decode("Entre 400000 a 500000 Euros"),$p400_500 ), ";");
  fputcsv($file, array( utf8_decode("Entre 500000 a 600000 Euros"),$p500_600 ), ";");
  fputcsv($file, array( utf8_decode("Entre 600000 a 700000 Euros"),$p600_700 ), ";");
  fputcsv($file, array( utf8_decode("Entre 700000 a 800000 Euros"),$p700_800 ), ";");
  fputcsv($file, array( utf8_decode("Entre 800000 a 900000 Euros"),$p800_900 ), ";");
  fputcsv($file, array( utf8_decode("Entre 900000 a 1000000 Euros"),$p900_1000 ), ";");
  fputcsv($file, array( utf8_decode("Apartir de 1000000 Euros"),$pM1000 ), ";");
  fclose($file);


?>
