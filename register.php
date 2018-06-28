<?php
  
  // Incluir a classe Imobiliaria
  require_once('data/imobiliaria.class.php');

  // Incluir a class User 
  require_once('data/user.class.php');

  // Iniciar a sessão 
  session_start();
  
  // Se o user já for um cliente que se encontra registado, será redirecionado para o índex
  if (isset($_SESSION['cliente'])) {

      header("location:index.php");

  }

  // Ligação à base de dados 
  $bd = new imobiliaria("data/config.ini");


  // PROCESSO DE REGISTO
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Mensagens de verificação definidas atempadamente 
  $message = "";

  if(isset($_POST['registar'])) {

      $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
      $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
      $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
      $password_rewrite = !empty($_POST['password_rewrite']) ? trim($_POST['password_rewrite']) : null;
      $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
      $contact= !empty($_POST['contact']) ? trim($_POST['contact']) : null;
      $ilha = !empty($_POST['ilha']) ? trim($_POST['ilha']) : null;
      $concelho = !empty($_POST['concelho']) ? trim($_POST['concelho']) : null;
      $freguesia = !empty($_POST['freguesia']) ? trim($_POST['freguesia']) : null;

      //$sql = 'INSERT INTO utilizador (email, nomeProprio, sobrenome, password, contacto)
      //VALUES(:email, :nomeProprio, :sobrenome, :password, :contacto)';

      // Verificar se existem campos vazios
      if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password_rewrite)) {

          $message = "<p class='alert alert-danger'>Não podem existir campos por preencher!</p>";

      }

      // Verificação dos tamanhos das palavras-passe
      if(strlen($password) < 8) {

          $message = "<p class='alert alert-danger'>A palavra-passe necessita ter oito ou mais caracteres!</p>";

      } elseif(strlen($password) < 3) {

          $message = "<p class='alert alert-danger'>A palavra-passe necessita ter mais que três caracteres!</p>";
      }

      // Verificar se as palavras-passe digitadas correspondem
      if($password !== $password_rewrite) {

          $message = "<p class='alert alert-danger'>As palavras-passe digitadas necessitam ser iguais!</p>";
      } else {

          $password = $password_rewrite;

      }

      /* necessário criar condições de inserção */

        // Verificar se o email introduzido já se encontra na base de dados 
        if (!$bd->mailClienteExists($email)) {
          $_SESSION['cliente']= $bd->registarCliente($email, $firstname, $lastname, $password, $contact, $ilha, $concelho, $freguesia);
          //var_dump($_SESSION['cliente']);
          header("location:index.php");
        }

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
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">
    <link rel="stylesheet" href="css/register.css" type="text/css">

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
  <div class="container-header container-header-registo">
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img id="icon" src="images/logo.png"/></a>

        
        <ul class="navbar-nav mx-auto header-registo">
            <!-- Título do formulário de registo -->
            <h3>Registe-se na nossa imobiliária!</h3>

        </ul>


        <!-- Contacto Telefónico -->
        <div class="phone">
            <img id="phoneIcon" src="images/call-answer.svg" alt="Contacto Telefónico"/>
            <p id="phone-number">296 012 345</p>
        </div>

    </nav>
</div>
    <!-- FINAL DO HEADER/NAVBAR  -->

    <!-- ÁREA DE REGISTO DA IMOBILIÁRIA -->
    <div class="register-wrapper">

        <form action="" method="post">

            <!-- Informações básicas do utilizador -->
            <div id="top-form">

                <!-- Nome próprio do utilizador -->
                <div class="form-group">
                    <label for="firstname">Nome Próprio</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Escreva aqui o seu primeiro nome" class="form-control">
                </div>

                <!-- Apelido do utilizador -->
                <div class="form-group">
                    <label for="firstname">Apelido</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Escreva aqui o apelido" class="form-control">
                </div>

            </div>

            <!-- Palavras-passe a serem introduzidas -->
            <div id="pass-form">

                <!-- Palavra-passe do utilizador -->
                <div class="form-group">
                    <label for="password">Palavra-passe</label>
                    <input type="password" name="password" id="password" placeholder="Escolha uma palavra-passe" class="form-control">
                </div>

                <!-- Rewrite da palavra-passe do utilizador -->
                <div class="form-group">
                    <label for="password_rewrite">Reescreva a palavra-passe</label>
                    <input type="password" name="password_rewrite" id="password_rewrite" placeholder="Reescreva a palavra-passe escolhida" class="form-control">
                </div>

            </div>

            <!-- Contacto do utilizador - email serve como "username" -->
            <div id="contact-form">

                <!-- Email do utilizador -->
                <div class="form-group">
                    <label for="email">Email de preferência</label>
                    <input type="email" name="email" id="email" placeholder="utilizador@exemplo.com" class="form-control">
                </div>

                <!-- Contacto do utilizador -->
                <div class="form-group">
                    <label for="contact">Contacto de preferência</label>
                    <input type="text" name="contact" id="contact" placeholder="Escolha o seu contacto preferencial" class="form-control">
                </div>

            </div>

            <!-- Localização do utilizador -->
            <div id="location-form">

                <!-- Ilha do utilizador -->
                <div class="form-group">
                    <label for="island">Ilha de residência</label>
                    <select name="ilha" id="ilha" class="custom-select">
                        <?php $bd->selectIlha(); ?>
                    </select>
                </div>

                <!-- Cidade do utilizador -->
                <div class="form-group">
                    <label for="concelho">Cidade de residência</label>
                    <select name="concelho" id="concelho" class="custom-select">
                        <option value="">Selecione um concelho</option>
                    </select>
                </div>

                <!-- Freguesia do utilizador -->
                <div class="form-group">
                    <label for="freguesia">Freguesia de residência</label>
                    <select name="freguesia" id="freguesia" class="custom-select">
                        <option value="">Selecione uma freguesia</option>
                    </select>
                </div>

            </div>

            <!-- Botão de submissão do formulário de registo -->
            <button type="submit" name="registar" class="btn-user">Criar conta</button>

        </form>

    </div>

    <!-- FINAL DA ÁREA DE REGISTO DA IMOBILIÁRIA -->

    <!-- FOOTER DA PÁGINA DE REGISTO -->
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
    <!-- FINAL DO FOOTER DA PÁGINA DE REGISTO -->

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