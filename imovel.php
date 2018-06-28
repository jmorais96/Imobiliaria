<?php

  // Incluir a classe Imovel
  require_once('data/imovel.class.php');

  // Incluir a classe User
  require_once('data/user.class.php');

  // Iniciar a sessão
  session_start();

  // Incluir funcionalidade de logout
  require_once('assets/logout.php');

  // Ligação à base de dados 
  $bd = new imobiliaria('data/config.ini');

  // Condição que define que um imóvel necessita possuir um id para ter uma página própria 
  if (!isset($_GET['id'])) {
    header("location:index.php");
  }

  // Receber as informações do imóvel da base de dados e guardar as mesmas numa variável 
  $imovel = $bd->getImovel($_GET['id']);
  if (!isset($imovel)){
    header("location:index.php");
  }

  //var_dump($imovel);
  //$todasImagens=$imovel->getNomeImagems();

  // Operação que permite ao user iniciar sessão 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pass'])) {
      $_SESSION['cliente'] = $bd->loginCliente($_POST['mail'], $_POST['pass']);
      //var_dump($_SESSION['cliente']);
    }

    // Funcionalidade que permite ao user marcar uma visita a um dado imóvel
    if (isset($_SESSION['cliente']) && isset($_POST['dia']) && isset($_POST['hora'])) {
      $bd->registarVisita($_SESSION['cliente']->getIdUser(), $_POST['dia'], $_POST['hora'], $imovel);
    }

  }

?>

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
    <link rel="stylesheet" href="css/imovel.css" type="text/css">

    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script>
    address = "<?php echo $imovel->getFreguesia(); ?>";
    zoom=13;
    </script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Ionic Icons -->
    <script src="https://unpkg.com/ionicons@4.2.0/dist/ionicons.js"></script>

    <!-- Título da página -->
    <title>Mais Imobiliária | Perfil do Imóvel</title>

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

      <?php if (!isset($_SESSION['cliente'])) { ?>

      <!-- Link de navegação "Registo" -->
      <li class="nav-item">
          <a class="nav-link" href="register.php">Registo</a>
      </li>

      <!-- Link de navegação que abre o módulo de "Login" -->
      <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#loginWindow">Login</a>
      </li>

      <?php } else { ?>

      <!-- Link de navegação "Área de Cliente" -->
      <li class="nav-item">
          <a class="nav-link" href="area_cliente.php">Área de Cliente</a>
      </li>

      <!-- Link de navegação que faz logout" -->
      <li class="nav-item">
          <a class="nav-link" href="?acao=logout">Logout</a>
      </li>

      <?php } ?>

      </ul>

  </div>

  <!-- MÓDULO DE LOGIN -->
  <div class="modal fade" id="loginWindow">
      <div class="modal-dialog">
          <div class="modal-content">

              <!-- Header do módulo -->
              <div class="modal-header">
                  <h3 class="modal-title">Efetue o seu login</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Body do módulo -->
              <div class="modal-body">
                  <form action="" role="form" method="post">
                      <div class="form-inline">
                          <i class="fas fa-user-alt"></i> <input type="email" placeholder="Escreva aqui o seu email..." class="form-control input-email" name="mail">
                      </div>
                      <div class="form-inline">
                           <i class="fas fa-unlock"></i> <input type="password"  placeholder="Escreva aqui a sua palavra-passe..." class="form-control input-password" name="pass">
                      </div>
                      <!-- Footer do módulo -->
                      <div class="modal-footer">
                        <button class="btn btn-block">Iniciar Sessão</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>
  <!-- FINAL DO MÓDULO DE LOGIN -->

        <!-- Contacto Telefónico -->
        <div class="phone">
            <img id="phoneIcon" src="images/call-answer.svg" alt="Contacto Telefónico"/>
            <p id="phone-number">296 012 345</p>
        </div>

    </nav>
  </div>
  <!-- FINAL DO HEADER/NAVBAR -->

  <!-- - - - - - - - - - - - -->

  <!-- PERFIL DO IMÓVEL -->
  <div id="container_imovel">

    <!-- Título da página / nome e informação básica do imóvel -->
    <h2 class="text-center"><?php echo $imovel->getTipoImovel();?> | <?php echo $imovel->getRua();?> | <?php echo $imovel->getPreco();?> €</h2>

    <!-- Slider com as imagens associadas ao imóvel -->
    <div class="slider-wrapper">
        
        <!-- Container do slider com a imagem principal da galeria do imóvel -->
        <div class="slider-container">
          <img src="<?php echo "imoveis/" . $imovel->getIdImovel() . "/" . $imovel->getNomeImagemPrincipal(); ?>" alt="Imagem principal do imóvel">
        </div>
        
        <!-- Container com a lista de imagens que o user poderá escolher --> 
        <div class="img-container" id="img_container">
          <ul>
            
            <?php foreach($imovel->getImagens() as $imagem) {
            
            ?>

              <li><img src="<?php echo "imoveis/" . $imovel->getIdImovel() . "/" . $imagem->getNomeImagem(); ?>" alt="Imagem secundária do imóvel"></li>

            <?php } ?>

          </ul>
        </div>

    </div>
    <!-- FINAL DO SLIDER COM AS IMAGENS ASSOCIADAS AO IMÓVEL -->
              
    <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - -->

    <!-- ESPECIFICAÇÕES DO IMÓVEL -->
    <div id="sub_container">

      <!-- Descrição do imóvel -->
      <p><?php echo $imovel->getDescricao(); ?></p>

      <!-- Informações do imóvel em detalhe -->
      <h3><i class="fas fa-info-circle fa-1x"></i>Informações em detalhe:</h3>

      <!-- Divisão que contém a localização do imóvel -->
      <div class="row location">

      <!-- Ilha do imóvel -->
      <span id="info_group">
        <h5>Ilha:</h5>
        <p><i class="far fa-map fa-1x"></i><?php echo $imovel->getIlha(); ?></p>
      </span>

      <!-- Concelho do imóvel -->
      <span id="info_group">
        <h5>Concelho:</h5>
        <p><i class="far fa-compass fa-1x"></i><?php echo $imovel->getConcelho(); ?></p>
      </span>

      <!-- Freguesia do imóvel -->
      <span id="info_group">
        <h5>Freguesia:</h5>
        <p><i class="fas fa-location-arrow fa-1x"></i><?php echo $imovel->getFreguesia(); ?></p>
      </span>

      </div>
      
      <!-- Divisão que contém mais informações pertinentes acerca do imóvel --> 
      <div class="row info_second">

      <!-- Preço do imóvel -->
      <span id="info_group" class="info_group_down">
        <h5>Preço:</h5>
        <p><i class="fas fa-money-bill-wave fa-1x"></i><?php echo $imovel->getPreco(); ?> €</p>
      </span>

      <!-- Finalidade do imóvel -->
      <span id="info_group">
        <h5>Finalidade:</h5>
        <p><i class="fas fa-piggy-bank fa-1x"></i><?php echo $imovel->getFinalidade(); ?></p>
      </span>

      <!-- Tipo do imóvel -->
      <span id="info_group">
        <h5>Tipo:</h5>
        <p><i class="fas fa-home fa-1x"></i><?php echo $imovel->getTipoImovel(); ?></p>
      </span>

      <!-- Estado do imóvel -->
      <span id="info_group">
        <h5>Estado:</h5>
        <p><i class="fas fa-truck-loading fa-1x"></i><?php echo $imovel->getEstado(); ?></p>
      </span>

    </div>
    
    <!-- Divisão que contém as restantes informações acerca do imóvel e o mapa -->
    <div id="down_container">

    <div class="left_info_container">

      <!-- Rua do imóvel -->
      <span id="info_group">
      <h5>Rua do imóvel:</h5>
        <p><i class="fas fa-road fa-1x"></i><?php echo $imovel->getRua(); ?>
        <br>
      <div class="info-codpostal">
        <img src="images/icons/codpostal-icon.png" alt=""><p>Código postal: <?php echo $imovel->getCodPostal(); ?></p>
      </div>
      </span>

      <!-- Área do imóvel -->
      <span id="info_group">
      <h5>Área total do imóvel:</h5>
        <p><i class="fas fa-chart-area fa-1x"></i><?php echo $imovel->getArea(); ?></p>
      </span>

      <!-- Tipologia do imóvel -->
      <span id="info_group">
      <h5>Tipologia:</h5>
        <p><i class="fas fa-building fa-1x"></i>
        <?php if ($imovel->getTipologia()!=NULL) { ?>
        <?php echo $imovel->getTipologia(); ?><br>
        <?php } ?></p>
      </span>

      <!-- Número de quartos do imóvel -->
      <span id="info_group">
      <h5>Número de quartos:</h5>
        <p><i class="fas fa-bed fa-1x"></i>
        <?php if ($imovel->getQuartos()!=NULL) { ?>
        <?php echo $imovel->getQuartos(); ?> quartos
        <?php } ?>
      </span>

      <!-- Número de casas de banho do imóvel -->
      <?php if ($imovel->getCasasBanho()!=NULL) { ?>
      <span id="info_group">
      <h5>Número de casas de banho:</h5>
        <p><i class="fas fa-bath fa-1x"></i>
        <?php echo $imovel->getCasasBanho(); ?> casas de banho
        <?php } ?></p>
      </span>

      <!-- Verificar se o imóvel possui garagem -->
      <?php if ($imovel->getGaragem()!=NULL) { ?>
      <span id="info_group">
        <h5>Garagem:</h5>
        <p><i class="fas fa-warehouse fa-1x"></i>
        <?php echo $imovel->getGaragem(); ?>
        <?php } ?>
      </span>

      <!-- Verificar se o imóvel possui piscina -->
      <?php if ($imovel->getPiscina()!=NULL) { ?>
      <span id="info_group">
      <h5>Piscina:</h5>
      <div class="info-piscina">
        <img src="images/icons/piscina-icon.png" alt="Ícone da piscina">
          <p><?php echo $imovel->getPiscina(); ?>
          <?php } ?></p>
        </div>
      </span>

      <!-- Verificar se o imóvel possui mobília -->
      <?php if ($imovel->getMobilia()!=NULL) { ?>
      <span id="info_group">
      <h5>Mobilado:</h5>
        <p><i class="fas fa-box fa-1x"></i>
        <?php echo $imovel->getMobilia(); ?>
        <?php } ?></p>
      </span>

      <!-- Data de construção do imóvel -->
      <?php if ($imovel->getDataConstrucao()!=NULL) { ?>
      <span id="info_group">
      <h5>Data de construção:</h5>
      <div class="info-dataconstrucao">
        <img src="images/icons/construcao-icon.png" alt="Ícone da data de construção">
          <p><?php echo $imovel->getDataConstrucao(); ?>
          <?php } ?></p>
        </div>
      </span>

      <!-- Verificar se o imóvel possui informação -->
      <?php if ($imovel->getInformacao()!=NULL) { ?>
        <span id="info_group">
        <h5>Mobilado:</h5>
        <p><i class="fas fa-box fa-1x"></i>
        <?php echo $imovel->getInformacao(); ?>
        <?php } ?>
      </span>

      </div>
      <!-- FINAL DAS ESPECIFICAÇÕES DO IMÓVEL -->
      
      <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - -->

      <!-- FORMULÁRIO QUE PERMITE AO CLIENTE MARCAR UMA VISITA -->
      <?php if (isset($_SESSION['cliente'])) { ?>
      <div id="caixa_formulario">
          <div id="formulario">
              <form action="" method="POST">
                   
                   <!-- Título do formulário -->
                   <h3>Marque a sua visita!<br></h3>
                    
                   *Dia: <input id="field" type="date" name="dia" placeholder="ex:18/09/2018"><br>
                   <label> err_dia  </label>

                   *Hora: <input id="field" type="time" name="hora" placeholder="EX: 19:53"><br>
                   <label> err_hora  </label>

                   <input id="button_send" type="submit" value="Enviar" name="visita">
                   </form>

                   <h5>*  Envie-nos a sua sugestão de visita e avaliaremos a disponibilidade associada. Entraremos em contacto consigo o mais brevemente possível.</h5>
              </form>
            </div>
      </div>
    
    <?php } ?>
    <!-- FORMULÁRIO QUE PERMITE AO CLIENTE MARCAR UMA VISITA -->

    <!-- ÁREA DO MAPA -->
    <div class="map mx-auto"></div>
    <!-- FINAL DA ÁREA DO MAPA -->

    </div>

  </div>
  </div>

    <!-- FOOTER -->
    <footer>
      <div class="container_footer">
        <div class="footer">
              <div class="icon">
                <a href="index.php"><img id="icon" src="images/logoBranco.png"/></a>
                <p id="homeIconName">
              </div>
              <div class="copyright">
                <p class="copyright"><span class="copyright-simbol">&#169;</span> 2018 Mais Imobiliária</p>
              </div>
        </div>
      </div>
    </footer>
    <!-- FINAL DO FOOTER -->

  </body>

    <!-- Ficheiros JavaScript -->
    <script src="js/gallery-slider.js"></script>

    <!-- jQuery CDN da Google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- API Google Maps -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Script que atualiza o layout da página de acordo com o número de imagens do slider -->
    <script>

      var element = document.getElementById("img_container");
      var numberOfChildren = element.getElementsByTagName('li').length;

      if(numberOfChildren > 4) {
          $('.img-container').css("height", "74px");
      }

      if(numberOfChildren > 8) {
          $('.img-container').css("height", "174px");
      }

      if(numberOfChildren > 12) {
          $('.img-container').css("height", "274px");
      }

      if(numberOfChildren > 16) {
          $('.img-container').css("height", "374px");
      }

      if(numberOfChildren > 20) {
          $('.img-container').css("height", "474px");
      }

    </script>


    <!-- Script para o marcador do google maps -->
    <script>
    <?php $imovel->addMarker() ?>
    </script>

</html>