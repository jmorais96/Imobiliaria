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

  require("fpdf/fpdf.php");
  $pdf=new FPDF();
  $pdf->AddPage();
  $pdf->SetFont("Arial","B",16);
  $pdf->Cell(0,10, utf8_decode("Nº de Imoveis por Local") ,1,1,"C");
  foreach ($bd->query('SELECT ilha FROM ilha') as $value) {
    $total=0;
    $pdf->Cell(95,10, utf8_decode($value['ilha']),1,0);
    foreach ($imoveis as $imovel) {
      if($imovel->getIlha()==$value['ilha']){
        ++$total;
      }
    }
    $pdf->Cell(95,10, utf8_decode("$total"),1,1);
  }
  $pdf->output();


?>
