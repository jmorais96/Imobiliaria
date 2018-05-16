<!-- Adicionar a classe imóvel -->
<?php require_once('data/imovel.class.php'); ?>

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
        
        <!-- Link de navegação "Registo" -->
        <li class="nav-item">
            <a class="nav-link" href="register.php">Registo</a>
        </li>
        
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


   <!-- ÁREA CENTRAL DA PÁGINA -->
   <div class="map" style="float:left;"></div>

    <!-- PESQUISA DO ÍNDEX -->
    <div class="container_form">

        <!-- Título do formulário de pesquisa -->
        <div class="formTitle">
            <img id="lupaIcon" src="images/lupa.png"/>
            <p>O que procuras?</p>
        </div>

        <!-- Formulário de pesquisa -->
        <div class="searchForm">
            <form id="searchForm" action="resultado_pesquisa.php" method="POST">

                <select id="index" name="finalidade">
                    <option value="">Finalidade pretendida</option>
                    <option id="index" value="Compra">Compra</option>
                    <option id="index" value="Aluguer">Aluguer</option>
                    <option id="index" value="Permuta">Permuta</option>
                </select>

                <select id="index" name="tipoImovel">
                    <option value="">Tipo de imóvel</option>
                    <option id="index" value="Apartamento">Apartamento</option>
                    <option id="index" value="Moradia">Moradia</option>
                    <option id="index" value="Terreno">Terreno</option>
                    <option id="index" value="Espaço Comercial">Espaço Comercial</option>
                    <option id="index" value="Armazém">Armazém</option>
                    <option id="index" value="Outros">Outros</option>
                </select>

                <select id="index" name="tipologia">
                    <option value="">Tipologia</option>
                    <option id="index" value="T0">T0</option>
                    <option id="index" value="T1">T1</option>
                    <option id="index" value="T2">T2</option>
                    <option id="index" value="T3">T3</option>
                    <option id="index" value="T4">T4</option>
                    <option id="index" value="T5">T5</option>
                    <option id="index" value="Outros">Outros</option>
                </select>

                <div class="formTitleSecondary">
                <img id="locationIcon" src="images/location.png"/>
                <p>Onde procuras?</p>
                </div>

                <select id="ilha" name="ilha">
                    <option value="">Selecione uma ilha</option>
                    <option id="saoMiguel" value="São Miguel">São Miguel</option>
                    <option id="santaMaria" value="Santa Maria">Santa Maria</option>
                    <option id="saoJorge" value="São Jorge">São Jorge</option>
                    <option id="corvo" value="Corvo">Corvo</option>
                    <option id="terceira" value="Terceira">Terceira</option>
                    <option id="faial" value="Faial">Faial</option>
                    <option id="flores" value="Flores">Flores</option>
                    <option id="pico" value="Pico">Pico</option>
                    <option id="graciosa" value="Graciosa">Graciosa</option>
                </select>

                <select id="concelho" name="concelho">
                    <option value="">Selecione um concelho</option>
                </select>

                <select id="freguesia" name="freguesia">
                    <option value="">Selecione uma freguesia</option>
                </select>

                <input id="index" type="text" name="preco" placeholder="Preço máximo do imóvel"/>

                <button id="encontrar">Encontrar Imóvel</button>
            </form>
        </div>
        <!-- Final do formulário de pesquisa -->
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
