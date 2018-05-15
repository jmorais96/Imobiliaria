<?php
//verificar se foi selecionado ilha, concelho ou freguesia guardando os resultados num array
if ($_POST['ilha']=="") {
  $file=fopen("../data/pesquisa/ilha.csv", "r");
  while (!feof($file)) {

    $data=fgetcsv($file,0,";");
    if ($data[0]=="") {
      break;
    }
    $locais[]=$data;
}
  fclose($file);

  $pos=3;

}elseif ($_POST['concelho']=="Concelho") {
  $file=fopen("../data/pesquisa/concelho/".$_POST['ilha'].".csv", "r");
  while (!feof($file)) {
    $data=fgetcsv($file,0,";");
    if ($data[0]=="") {
      break;
    }
    $locais[]=$data;
}
  fclose($file);

  $pos=4;

}else{

  $file=fopen("../data/pesquisa/freguesia/".trim($_POST['concelho']).".csv", "r");
  while (!feof($file)) {
    $data=fgetcsv($file,0,";");
    if ($data[0]=="") {
      break;
    }
  $locais[]=$data;
  }
  fclose($file);

  $pos=5;

}
$total=0;
require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10, utf8_decode("Nº de Vendas por Local") ,1,1,"C");
foreach ($locais as $key => $value) {
  $total=0;
  $file=fopen("../data/vendas.csv", "r");
  while(!feof($file)){
  $data=fgetcsv($file,0,";");
  if ($data[$pos]==$value[1]) {
    ++$total;
  }
  }
  fclose($file);

  $pdf->Cell(95,10, utf8_decode("$value[0]"),1,0);
  $pdf->Cell(95,10, utf8_decode("$total"),1,1);

}
$pdf->output();

?>
