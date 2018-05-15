<?php
  $terreno=0;
  $apartamento=0;
  $moradia=0;
  $quinta=0;
  //verificar no ficheiro vendas e incrementar sempre que encontrar o devido tipo
  $file=fopen("../data/vendas.csv", "r");
  while (!feof($file)) {
    $data=fgetcsv($file,0,";");
    if ($data[2]=="Terreno") {
      ++$terreno;
    }
    if ($data[2]=="Apartamento") {
      ++$apartamento;
    }
    if ($data[2]=="Moradia") {
      ++$moradia;
    }
    if ($data[2]=="Quinta") {
      ++$quinta;
    }
  }
  fclose($file);

  //chamar biblioteca
  require("fpdf/fpdf.php");
  //novo objeto pdf
  $pdf=new FPDF();
  //adicionar pagina
  $pdf->AddPage();
  //colocar um font
  $pdf->SetFont("Arial","B",16);
  //imrimir celula do titilo
  $pdf->Cell(0,10, utf8_decode("Nº de Vendas por tipo") ,1,1,"C");
  //imprimir segundo os resultados
  $pdf->Cell(95,10, "Terrenos",1,0);
  $pdf->Cell(95,10, "$terreno",1,1);
  $pdf->Cell(95,10, "Apartamentos",1,0);
  $pdf->Cell(95,10, "$apartamento",1,1);
  $pdf->Cell(95,10, "Moradias",1,0);
  $pdf->Cell(95,10, "$moradia",1,1);
  $pdf->Cell(95,10, "Quintas",1,0);
  $pdf->Cell(95,10, "$quinta",1,1);
  $pdf->output();


?>
