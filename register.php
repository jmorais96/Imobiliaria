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

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">    
    <link rel="stylesheet"  href="css/register.css" type="text/css">    

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Título da página -->
    <title>Mais Imobiliária | Página de registo</title>

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
