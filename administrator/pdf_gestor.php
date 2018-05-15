<?php

  $id=$_POST['id'];
  $file=fopen("../data/gestores.csv", "r");
  while (!feof($file)) {
    $gestor=fgetcsv($file,0,";");
    if ($gestor[0]==$id) {
      break;
    }
  }
  $file=fopen("../data/vendas.csv", "r");
  while (!feof($file)) {
    $data=fgetcsv($file,0,";");
    if ($data[1]==$id) {
      $venda[]=$data;
      $ano[]=$data[9];
    }
  }
  fclose($file);

  if (isset($ano)) {


    $anos=array_unique($ano);

    $meses = array( 'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    );


    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10, utf8_decode("Vendas do gestor: ".$gestor[3]) ,1,1,"C");
    for ($i=0; $i <count($anos) ; $i++) {
      $pdf->Cell(0,10, utf8_decode("Ano ".$ano[$i]) ,1,1,"C");
      $total=0;
      for ($j=0; $j <12 ; $j++) {
        $contador=0;
        $valor=0;
        $totalano=0;
        foreach ($venda as $value) {
          if ($value[8]==$j+1) {
            $valor+=$value[6];
            $total+=$value[6];
            ++$contador;
          }
          ++$totalano;
        }
        $pdf->Cell(95,10, utf8_decode($meses[$j]." : "),1,0);
        $pdf->Cell(95,10, utf8_decode("$valor euros  com $contador vendas"),1,1);
      }
      $pdf->Cell(95,10, utf8_decode("Total do ano ". $ano[$i] .": "),1,0);
      $pdf->Cell(95,10, utf8_decode(" $total euros com $totalano vendas"),1,1);
    }
    $pdf->output();
  }else{

    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10, utf8_decode("Vendas do gestor: ".$gestor[3]) ,1,1,"C");
    $pdf->Cell(0,10, utf8_decode("Este gestor nao efecuou vendas ainda") ,1,1,"C");
    $pdf->output();

  }

?>
