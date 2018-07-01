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

  // Reencaminhar o utilizar para o índex caso este não seja um funcionário
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }


  // Ligação à base de dados
  $bd = new imobiliaria("../data/config.ini");

  // Funcionalidade que aceita colocar um imóvel como destacado 
  $bd->aceitarDestaque($_GET['id']);

  // Redirecionar o user para a página 'login_success.php' 
  header("location:login_success.php");

?>