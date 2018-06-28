<?php

  // Incluir a class User
  require_once('data/user.class.php');

  // Incluir a class Imobiliaria
  require_once('data/imobiliaria.class.php');

  // Incluir a class Imovel
  require_once('data/imovel.class.php');

  // Incluir a class Visita
  require_once('data/visita.class.php');

  // Iniciar a sessão 
  session_start();

  // Incluir a funcionalidade de logout
  require_once('assets/logout.php');

  // Impedir que um utilizador que não seja cliente tenha acesso à área associada ao mesmo 
  if (!isset($_SESSION['cliente'])) {
    header("location:index.php");
  }

  // Ligação à base de dados
  $bd = new imobiliaria("data/config.ini");

  // Funcionalidade de "update" nos dados do cliente 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['cliente']->validarPassword(md5($_POST['passwordAtual']))) {

      if ($_POST['firstname']!="") {
        $_SESSION['cliente']->setName($_POST['firstname']);
      }

      if ($_POST['lastname']!="") {
        $_SESSION['cliente']->setLastName($_POST['lastname']);
      }

      if ($_POST['email']!="") {
        if (!$bd->mailClienteExists($_POST['email'])) {
          $_SESSION['cliente']->setMail($_POST['email']);
        }

      }

      if ($_POST['password']!="") {
        $_SESSION['cliente']->setPassword($_POST['password']);
      }

      if ($_POST['contact']!="") {
        $_SESSION['cliente']->setContact($_POST['contact']);
      }

      $bd->updateCliente($_SESSION['cliente']->update());

    }
  }

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

        <!-- Link de navegação "Área de Cliente" -->
        <li class="nav-item">
            <a class="nav-link" href="area_cliente.php">Área de Cliente</a>
        </li>

        <!-- Link de navegação "Logout" -->
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
            
            <!-- Título da área de cliente -->
            <div class="pesquisa_grande">
                 <h3>Área de Cliente</h3>
            </div>
    </div>

      <div class="container_info">
            <div id="sub_container_info">
              
              <!-- Mensagem de "boas-vindas" -->
              <div id="caixa1a">
                 <h3>Bem-Vindo(a), <?php echo $_SESSION['cliente']->getFullName(); ?></h3>
              </div>

              <!-- Informações pessoais do cliente -->
              <div id="caixa1b">

                      <!-- Email do cliente -->
                      <div id="caixa2" class="caixa2">
                          <img id="icon2" src="images/email.svg">
                          <h3>E-mail: <?php  echo $_SESSION['cliente']->getMail(); ?></h3>
                      </div>

                      <!-- <div id="caixa2" "caixa2">
                         <img id="icon2" src="images/key.svg">
                         <h3>Password: </h3>
                      </div> -->

                      <!-- Contacto telefónico do cliente -->
                      <div id="caixa2" class="caixa2">
                         <img id="icon2" src="images/phone.svg">
                         <h3>Telefone: <?php echo $_SESSION['cliente']->getContact(); ?></h3>
                      </div>

                      <!-- Localização do cliente -->
                      <div id="caixa2" class="caixa2">
                        <img id="icon2" src="images/local.svg">
                        <h3> Habitação: <?php echo $_SESSION['cliente']->getIlha() . ", " . $_SESSION['cliente']->getConcelho() . ", " . $_SESSION['cliente']->getFreguesia();?></h3>
                      </div>

                      <!-- Opção para a alteração dos dados pessoais -->
                      <button id="mudarDados">Alterar dados pessoais</button>

                      <!-- Tabela com os dados que serão alterados -->
                      <table id="formDados" class="table table-bordered table-hover">

                        <form class="" action="" method="post" >

                          <!-- Alteração do nome próprio -->
                          <tr>
                            <td> <label for="firstname">Nome Próprio:</label> </td>
                            <td> <input type="text" name="firstname" value=""> </td>
                          </tr>
                          
                          <!-- Alteração do apelido -->
                          <tr>
                            <td> <label for="lastname">Apelido:</label> </td>
                            <td> <input type="text" name="lastname" value=""> </td>
                          </tr>
                          
                          <!-- Alteração da palavra-passe -->
                          <tr>
                            <td> <label for="password">Palavra-passe:</label> </td>
                            <td> <input type="password" name="password" value=""> </td>
                          </tr>

                          <!-- Alteração da palavra-passe - rewrite -->
                          <tr>
                            <td> <label for="password_rewrite">Reescreva a palavra-passe:</label> </td>
                            <td> <input type="password" name="password_rewrite" value=""> </td>
                          </tr>
                          
                          <!-- Alteração do email de preferência -->  
                          <tr>
                            <td> <label for="email">Email de preferência:</label> </td>
                            <td> <input type="email" name="email" value=""> </td>
                          </tr>
                          
                          <!-- Alteração do contacto de preferência -->
                          <tr>
                            <td> <label for="contact">Contacto de preferência:</label> </td>
                            <td> <input type="number" name="contact" value=""> </td>
                          </tr>
                          
                          <!-- Alteração da ilha de residência -->
                          <tr>
                            <td> <label for="island">Ilha de residência:</label> </td>
                            <td> <select name="ilha" id="ilha">
                                <?php $bd->selectIlha(); ?>
                            </select> </td>
                          </tr>
                          
                          <!-- Alteração do concelho de residência -->
                          <tr>
                            <td> <label for="concelho">Cidade de residência:</label> </td>
                            <td> <select name="concelho" id="concelho">
                                <option value="">Selecione um concelho</option>
                            </select> </td>
                          </tr>

                          <!-- Alteração da freguesia de residência -->
                          <tr>
                            <td> <label for="freguesia">Freguesia de residência:</label> </td>
                            <td> <select name="freguesia" id="freguesia">
                                <option value="">Selecione uma freguesia</option>
                            </select> </td>
                          </tr>

                          <!-- Pedido para inserção da palavra-passe atual, de modo a permitir que as alterações sejam sucedidas -->
                          <tr>
                            <td> <label for="passwordAtual">Password Atual</label> </td>
                            <td> <input type="password" name="passwordAtual" value="" required> </td>
                          </tr>

                          <!-- Botão de submissão do formulário de alteração de dados -->
                          <tr>
                            <td colspan="12"> <input type="submit" value="Proceder com a alteração dos Dados" class="alterarDados" name="registar"> </td>
                          </tr>

                        </form>

                      </table>

                </div>
            </div>
      </div>

      <!-- Verificação do estado das visitas -->
      <div id="caixa1a">
          <h3>Consulte aqui o estado das suas visitas:</h3>
      </div>

      </div>
      <div class=contain>
      <table class="table table-bordered table-hover">
        
          <thead>
            <tr>
              <th>Rua</th>
              <th>Data</th>
              <th>Hora</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
          <?php

            // Aceder às visitas presentes na base de dados 
            foreach ($bd->getVisitasUser($_SESSION['cliente']) as $value) {
          
          ?>

            <tr>
              <td> <?php echo $value->getRua() ?></td>
              <td> <?php echo $value->getData() ?> </td>
              <td> <?php echo $value->getHora() ?> </td>
              <td> <?php echo $value->getEstado() ?> </td>
            <tr>
        
         <?php } ?>

          </tbody>

         </table>  
          
        </div>
      </div>
    </div>
  </div>

    <!-- FOOTER -->
    <footer>
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
    </footer>
    <!-- FINAL DO FOOTER -->

  </body>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Latest compiled Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    
    <!-- Script para a localização do utilizador, dando concelhos e freguesias como opções a partir da ilha --> 
    <script type="text/javascript">

    $(document).ready(function(){
        $("#ilha").change(function(){
            let ilha = $("#ilha").val();
            $.ajax({
            type:'POST',
            url:'assets/concelho.php',
            data:"idIlha="+ ilha,
            success:function(html){
                $('#concelho').html(html);

            }
            });
        });

        $("#concelho").change(function(){
            let concelho = $("#concelho").val();
            $.ajax({
            type:'POST',
            url:'assets/freguesia.php',
            data:"idConcelho="+ concelho,
            success:function(html){
                $('#freguesia').html(html);

            }
            });
        });

    });

    </script>

</html>