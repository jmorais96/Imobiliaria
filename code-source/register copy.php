<!-- <?php session_start(); ?>

<?php include("assets/logout.php"); ?>

<?php include("registar_ok.php"); ?>

<?php

  if (isset($_SESSION['cliente']) || isset($_SESSION['admin'])) {

      header("location:index.php");
 
  }
 
?> -->

<!DOCTYPE html>
<html lang="pt" dir="ltr">

  <head>

    <!-- MetaTags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Título da página -->
    <title>Mais Imobiliária | Bem-vindo</title>

  </head>

<body>

  <!-- HEADER -->
  <div class="container_header">
     
     <div class="header">
            <div class="icon">
              <a href="index.php"><img id="icon" src="images/logo.png"/></a>
              <p id="homeIconName">
            </div>

            <div class="navItems">
                 <h3>Formulário de registo</h3>
            </div>

            <div class="phone">
              <img id="phoneIcon" src="images/call-answer.svg"/>
              <p id="phone-number">296 012 345</p>
            </div>

        </div>
  
  </div>
  <!-- FINAL DO HEADER -->

  <!-- FORMULÁRIO DE REGISTO --> 
  <div id="formulario-registo">

    <form action="">
    
    <!-- Nome próprio -->
    <label for="firstname">Nome próprio</label>
    <input type="text" name="firstname">
    
    <!-- Apelido -->
    <label for="lastname">Apelido</label>
    <input type="text" name="lastname">
    
    <!-- Username -->
    <label for="username">Username</label>
    <input type="text" name="username">
    
    <!-- Palavra-passe escolhida -->
    <label for="password">Escolha uma palavra-passe</label>
    <input type="password" name="password">
    
    <!-- Confirmação da palavra-passe escolhida -->
    <label for="password_rewrite">Reescreva a palavra-passe escolhida</label>
    <input type="text" name="password_rewrite">
    
    <!-- Morada -->
    <label for="address">Morada</label>
    <input type="text" name="address">

    <!-- Botão de submissão -->
    <button type="submit" name="submit">Submeter formulário</button>

    </form>

  </div>
  
  <!-- FINAL DO FORMULÁRIO DE REGISTO -->
  
    <!-- FOOTER -->
    <div class="container_footer">
      <div class="footer">
           <div class="icon">
              <img id="icon" src="images/logoBranco.png"/>
              <p id="homeIconName">
            </div>
            <div class="copyright">
				<p class="copyright"><span class="copyright-simbol">&#169;</span> 2018 MaisImobiliária</p>
            </div>
      </div>
    </div>
    <!-- FINAL DO FOOTER -->

  </body>

  <!-- API Google Maps -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

    <?php

      $bd = new imobiliaria('data/config.ini');
      $bd->pequisa();

    ?>

</html>
