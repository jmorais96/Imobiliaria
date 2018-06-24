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

$gestores = $bd->getWorkers();
foreach ($gestores as $value) {

}

    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10, utf8_decode("Vendas por gestor") ,1,1,"C");
    foreach ($gestores as $value) {
      if ($value->getTipoUser()=="Gestor") {
        $imoveis=$bd->imoveisGestor($value->getIdFuncionario());
        if (isset($imoveis)) {
          $total=0;
          foreach ($imoveis as $imovel) {
            if ($imovel->getSituacao()=="Concluído") {
                ++$total;
            }
          }
            $pdf->Cell(95,10, utf8_decode($value->getFullName()." : "),1,0);
            $pdf->Cell(95,10, utf8_decode($total),1,1);

        }else {
          $pdf->Cell(95,10, utf8_decode($value->getFullName()." : "),1,0);
          $pdf->Cell(95,10, utf8_decode("0"),1,1);
        }
      }
    }

    $pdf->output();
    // require("fpdf/fpdf.php");
    // $pdf=new FPDF();
    // $pdf->AddPage();
    // $pdf->SetFont("Arial","B",16);
    // $pdf->Cell(0,10, utf8_decode("Vendas do gestor: ".$gestor[3]) ,1,1,"C");
    // $pdf->Cell(0,10, utf8_decode("Este gestor nao efecuou vendas ainda") ,1,1,"C");
    // $pdf->output();

?>
