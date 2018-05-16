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
    <title>Mais Imobiliária | Página de Registo</title>

  </head>

  <body>

  <!-- HEADER/NAVBAR --> 
  <div class="container-header">
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img id="icon" src="images/logo.png"/></a>

  <!-- Toogler que aparecerá nos menores ecrãs -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">

        <!-- Link de navegação "Home" -->
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        
        <!-- Link de navegação "Registo" 
        <li class="nav-item">
            <a class="nav-link" href="register.php">Registo</a>
        </li>-->
        
        <!-- Link de navegação que abre o módulo de "Login" -->    
        <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
        </li>

        </ul>

    </div>
    
        <!-- Contacto Telefónico -->
        <div class="phone">
            <img id="phoneIcon" src="images/call-answer.svg" alt="Contacto Telefónico"/>
            <p id="phone-number">296 012 345</p>
        </div>

    </nav>
</div>
    <!-- FINAL DO HEADER/NAVBAR  -->

    <!-- PESQUISA DO ÍNDEX -->
    <div class="super_container_form">
       
    
        <div class="container_form2">

            <!-- Formulário de pesquisa -->

                <div class="formulario-registo">
                   <div class="formTitle2">
                        <img id="lupaIcon" src="images/lupa.png"/>
                        <p>Formulário de registo</p>
                    </div>
                   
                    <form id="formulario-registo" action="resultado_pesquisa.php" method="POST">

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

                        <button id="registar" name="registar">Registar</button>
                    </form>
                </div>
            <!-- Final do formulário de pesquisa -->
        </div>
   </div>
    <!-- FINAL DA PESQUISA DO ÍNDEX -->

    <!-- FOOTER -->
    <div class="container_footer">
      <div class="footer">
           <div class="icon">
              <img id="icon" src="images/logoBranco.png"/>
              <p id="homeIconName">
            </div>
            <div class="copyright">
				<p class="copyright"><span class="copyright-simbol">&#169;</span> 2018 Mais Imobiliária</p>
            </div>
      </div>
    </div>
    <!-- FINAL DO FOOTER -->

  </body>

  <!-- API Google Maps -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

    <!-- Ficheiros JavaScript pessois -->
    
    <!-- jQuery -->  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <?php

      $bd = new imobiliaria('data/config.ini');
      $bd->pequisa();

    ?>

</html>
