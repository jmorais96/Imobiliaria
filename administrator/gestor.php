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

  // Iniciar a sessão 
  session_start();

  // Reencaminhar o utilizar para o índex caso este não seja um funcionário
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }


// Ligação à base de dados
$bd = new imobiliaria("../data/config.ini");

// Obter todos os gestores registados e guardar os mesmos numa variável 
$gestores = $bd->getWorkers();

// Procedimentos associados aos pdf's estatísticos dos gestores 
header('Content-Type: application/csv; charset=UTF-8');
header('Content-Disposition: attachment;filename="gestor.csv";');

// Abrir o ficheiro 'gestor.csv' e introduzir as estatíticas no mesmo 
$file = fopen("php://output", "w");

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
          fputcsv($file, array( ($value->getFullName()),$total ), ";");
      }
    }
  }
  fclose($file);

?>