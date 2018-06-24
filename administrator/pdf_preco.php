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

  //chamar biblioteca
  require("fpdf/fpdf.php");
  //criar objeto
  $pdf=new FPDF();
  //adicionar pagina
  $pdf->AddPage();
  //colocar font
  $pdf->SetFont("Arial","B",16);
  //imprimir tutulo
  $pdf->Cell(0,10, utf8_decode("Nº de Vendas Preço") ,1,1,"C");
  //imprimir resultados
  $pdf->Cell(95,10, "menos de 50000 Euros",1,0);
  $pdf->Cell(95,10, "$pm50 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 50000 a 100000 Euros",1,0);
  $pdf->Cell(95,10, "$p50_100 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 100000 a 200000 Euros",1,0);
  $pdf->Cell(95,10, "$p100_200 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 200000 a 300000 Euros",1,0);
  $pdf->Cell(95,10, "$p200_300 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 300000 a 400000 Euros",1,0);
  $pdf->Cell(95,10, "$p300_400 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 400000 a 500000 Euros",1,0);
  $pdf->Cell(95,10, "$p400_500 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 500000 a 600000 Euros",1,0);
  $pdf->Cell(95,10, "$p500_600 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 600000 a 700000 Euros",1,0);
  $pdf->Cell(95,10, "$p600_700 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 700000 a 800000 Euros",1,0);
  $pdf->Cell(95,10, "$p700_800 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 800000 a 900000 Euros",1,0);
  $pdf->Cell(95,10, "$p800_900 imoveis",1,1);
  $pdf->Cell(95,10, "Entre 900000 a 1000000 Euros",1,0);
  $pdf->Cell(95,10, "$p900_1000 imoveis",1,1);
  $pdf->Cell(95,10, "Apartir de 1000000 Euros",1,0);
  $pdf->Cell(95,10, "$pM1000 imoveis",1,1);
  $pdf->output();


?>
