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

  //chamar biblioteca
  require("fpdf/fpdf.php");
  //novo objeto pdf
  $pdf=new FPDF();
  //adicionar pagina
  $pdf->AddPage();
  //colocar um font
  $pdf->SetFont("Arial","B",16);
  //imrimir celula do titilo
  $pdf->Cell(0,10, utf8_decode("Nº de Imoveis por tipo de Imovel") ,1,1,"C");

  $id=$bd->query("select idImovel from todosimoveis");
  foreach ($id as $value) {
    $imoveis[]=$bd->getImovel($value['idImovel']);
  }

  foreach ($bd->query("select tipoImovel from tipo_imovel") as $tipoImovel) {
    $total=0;
    $pdf->Cell(95,10, utf8_decode($tipoImovel['tipoImovel']),1,0);
    foreach ($imoveis as $imovel) {
      if($imovel->getTipoImovel()==$tipoImovel['tipoImovel']){
        ++$total;
      }
    }
    $pdf->Cell(95,10, "$total",1,1);
  }
  $pdf->output();



?>
