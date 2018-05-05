<?php

  require_once('data/imovel.class.php');

?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
      <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <title></title>
  </head>
  <body>
  <div class="container_header">
     <div class="header">
            <div class="icon">
              <img id="icon" src="images/logo.png"/>
              <p id="homeIconName">
            </div>
            <div class="navItems">
                <a href="index.php"><p id="navItem">HOME</p></a>
                 <a href="register.php"><p id="navItem">REGISTAR</p></a>
                <a href="logout.php"><p id="navItem">LOGIN</p></a>
            </div>
            <div class="phone">
              <img id="phoneIcon" src="images/call-answer.svg"/>
              <p id="phone">296 012 345</p>
            </div>
      </div>
  </div>

    <!-- <div class="pesquisa">
      <form class="" action="" method="post">
        <input type="text" id="local" name="" value="">
        <input type="submit" value="Pesquisar...">
      </form>
    </div> -->
    <div class="map">

    </div>
    <div class="container_footer">
      <div class="footer">
           <div class="icon">
              <img id="icon" src="images/logoBranco.png"/>
              <p id="homeIconName">
            </div>
            <div class="copyright">
				<p class="copyright">&#169; 2018 MaisImobiliária</p>
            </div>
      </div>
    </div>
  </body>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

    <?php

      $bd = new imobiliaria('data/config.ini');
      $bd->pequisa();
    ?>

</html>
