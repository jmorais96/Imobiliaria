<?php
require_once ('data/user.class.php');
session_start();

if (!isset($_SESSION['cliente'])) {
  header("location:index.php");
}

/*
$filenameUser = 'data/users.csv';
$fileUser = fopen($filenameUser, 'r'); //ler o ficheiro
while (!feof($fileUser)){
    $users = fgetcsv($fileUser,0,';'); //ir buscar dados ao csv

    if($users[0] == $_SESSION['user']){
        $name = $users[1];
        $apelido = $users[2];
        $email = $users[3];
        $password = $users[4];
        $telefone = $users[5];
        $ilha = $users[6];
        $concelho = $users[7];
        $freguesia = $users[8];
    }
}
fclose($fileUser);*/
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
  <link rel="stylesheet" href="css/area_cliente.css" type="text/css">
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
    <div id="caixas_pesquisa">
            <div class="pesquisa_grande">
                 <h3>Área de Cliente</h3>
            </div>
    </div>

      <div class="container_info">
            <div id="sub_container_info">
              <div id="caixa1a">
                 <h3>Bem-Vindo(a), <?php echo $_SESSION['cliente']->getFullName(); ?></h3>
              </div>
              <div id="caixa1b">
                      <div id="caixa2">
                          <img id="icon2" src="images/email.svg">
                          <h3>E-mail: <?php  echo $_SESSION['cliente']->getMail(); ?></h3>
                      </div>
                      <!-- <div id="caixa2">
                         <img id="icon2" src="images/key.svg">
                         <h3>Password: </h3>
                      </div> -->
                      <div id="caixa2">
                         <img id="icon2" src="images/phone.svg">
                         <h3>Telefone: <?php echo $_SESSION['cliente']->getContact(); ?></h3>
                      </div>

                      <div id="caixa2">
                        <img id="icon2" src="images/address.svg">
                        <h3>Ilha: <?php echo $_SESSION['cliente']->getIlha();?></h3>
                      </div>

                      <div id="caixa2">
                         <img id="icon2" src="images/address.svg">
                         <h3>Concelho: <?php echo $_SESSION['cliente']->getConcelho(); ?></h3>
                      </div>

                      <div id="caixa2">
                         <img id="icon2" src="images/address.svg">
                         <h3>Freguesia: <?php echo $_SESSION['cliente']->getFreguesia(); ?></h3>
                      </div>
                      
                </div>
            </div>

          <div id="caixa1a">
              <h3>Consulte aqui o estado das suas visitas</h3>
          </div>

      </div>
      <div class=contain>
      <table class="table table-bordered table-hover">

        <?php
/*
        $filenameVisita = 'data/visitas.csv';
        $fileVisita = fopen($filenameVisita, 'r');
        while (($visitas = fgetcsv($fileVisita, 0, ';')) !== false) {

          if($visitas[3] == $_SESSION['user']){

            $idVisita = $visitas[0];
            $idImovel = $visitas[1];
            $idGestor = $visitas[2];
            $idUser = $visitas[3];
            $titulo = $visitas[4];
            $data = $visitas[9];
            $hora = $visitas[10];
            $estado = $visitas[11];

            echo '

                    <thead>
                       <tr>
                           <th>IdVisita</th>
                           <th>IdImovel</th>
                           <th>Título</th>
                           <th>Data</th>
                           <th>Hora</th>
                           <th>Estado</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr>';
                echo "<td> $idVisita </td>";
                echo "<td> $idImovel </td>";
                echo "<td> $titulo </td>";
                echo "<td> $data </td>";
                echo "<td> $hora </td>";
                echo "<td> $estado </td>";
                echo '</tbody>

                                 ';

          }

        }
*/
        ?>

      </table>
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
