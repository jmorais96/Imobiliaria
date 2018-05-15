<!-- Adicionar a classe imóvel -->
<?php require_once('data/imovel.class.php'); ?>

<!DOCTYPE html>
<html lang="pt" dir="ltr">
  
  <head>
    
    <!-- MetaTags -->
    <meta charset="utf-8">
    
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
                <a href="index.php"><p id="navItem">Home</p></a>
                 <a href="register.php"><p id="navItem">Registo</p></a>
                <a href="logout.php"><p id="navItem">Login</p></a>
            </div>
            
            <div class="phone">
              <img id="phoneIcon" src="images/call-answer.svg"/>
              <p id="phone-number">296 012 345</p>
            </div>
      
        </div>
  </div>
  <!-- FINAL DO HEADER -->

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