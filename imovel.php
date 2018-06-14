<?php

  require_once('data/imovel.class.php');
  require_once('data/user.class.php');
  require_once('assets/logout.php');
  session_start();

  $bd = new imobiliaria('data/config.ini');

  if (!isset($_GET['imovel'])) {
    header("location:index.php");
  }

  $imovel=$bd->getImovel($_GET['imovel']);
  //var_dump($imovel);
?>

<html>

<head>

  <!-- MetaTags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <!-- Folhas de estilo -->
  <link rel="stylesheet" href="css/homepage.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">

  <!-- Ícones Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

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


        <!-- Link de navegação "Ares Cliente" -->
        <li class="nav-item">
            <a class="nav-link" href="area_cliente.php">Area Cliente</a>
        </li>

        <!-- Link de navegação que faz logout" -->
        <li class="nav-item">
            <a class="nav-link" href="?acao=logout">Logout</a>
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




  <div class="container_index">
    <h3>Resultado da Pesquisa</h3>
    <div id="caixas_pesquisa">
            <div class="pesquisa_grande">
                <img id="image" src="images/imoveis/foto">
                <h4>concelho</h4>
                <h6>tipologia</h6>
            </div>
    </div>

    <div id="sub_container">
      <div id="sobre">
            <!--preço-->
            <h1><br>Preco: <?php echo $imovel->getPreco(); ?><br></h1>
            <h3>Descrição:<?php echo $imovel->getDescricao(); ?><br></h3>
             <h5><br>descricao<br></h5>
            <h5>
            Finalidade: <?php echo $imovel->getFinalidade(); ?><br>
            Tipo de imóvel: <?php echo $imovel->getTipoImovel(); ?><br>
            Distrito: Ilha de <?php echo $imovel->getIlha(); ?><br>
            Concelho: <?php echo $imovel->getConcelho(); ?><br>
            Freguesia: <?php echo $imovel->getFreguesia(); ?><br>
            Vendedor: <?php echo $imovel->getidGestor(); ?><br>
            <br>
            </h5>
      </div>

      <div id="caixa_formulario">
          <div id="formulario">
              <form action="" method="POST">
                  <!--formulario-->
                   <h3>Marque a sua visita!<br></h3>

                   Contacto: <input id="field" type="number" name="phone" placeholder="Contacto Telefónico"><br>
                   <label> err_phone</label>

                    *Dia: <input id="field" type="date" name="dia" placeholder="ex:18/09/2018"><br>
                    <label> err_dia  </label>

                    *Hora: <input id="field" type="time" name="hora" placeholder="EX: 19:53"><br>
                    <label> err_hora  </label>

                    <input id="button_send" type="submit" value="Enviar" name="visita">
                    </form>

                    <h5>* Envie-nos a sua sugestão para avaliarmos disponilidade. Entraremos em contacto consigo o mais breve possível.</h5>
              </form>
            </div>
      </div>
    </div>
    </div>

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


    <!-- Ficheiros JavaScript pessois -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Latest compiled Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>



</html>
