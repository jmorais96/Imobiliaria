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

  header('Content-Type: application/csv; charset=UTF-8');
  header('Content-Disposition: attachment;filename="tipo.csv";');

  $file=fopen("php://output", "w");

  foreach ($bd->query("select tipoImovel from tipo_imovel") as $tipoImovel) {
    $total=0;
    foreach ($imoveis as $imovel) {
      if($imovel->getTipoImovel()==$tipoImovel['tipoImovel']){
        ++$total;
      }
    }
      fputcsv($file, array(($tipoImovel['tipoImovel']),$total ), ";");
  }
  fclose($file);



?>
