<!-- Adicionar a classe Imobiliária -->
<?php require_once('data/imobiliaria.class.php'); ?>

<?php

  if (isset($_SESSION['cliente']) || isset($_SESSION['admin'])) {

      header("location:index.php");

  }

  $bd=new imobiliaria("data/config.ini");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

/* necessário criar condições de inserção */

    $bd=new imobiliaria("data/config.ini");


}

// MENSAGENS DE VERIFICAÇÃO
$message = "";

// PROCESSO DE REGISTO
if(isset($_POST['registar'])) {

    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $password_rewrite = !empty($_POST['password_rewrite']) ? trim($_POST['password_rewrite']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $contact= !empty($_POST['contact']) ? trim($_POST['contact']) : null;
    $ilha = !empty($_POST['ilha']) ? trim($_POST['ilha']) : null;
    $concelho = !empty($_POST['concelho']) ? trim($_POST['concelho']) : null;
    $freguesia = !empty($_POST['freguesia']) ? trim($_POST['freguesia']) : null;

    $sql = 'INSERT INTO utilizador (email, nomeProprio, sobrenome, password, contacto
    VALUES(:email, :nomeProprio, :sobrenome, :password, :contacto)';




    // Verificar se existem campos vazios
    if(empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($password_rewrite)) {

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

    // Criar a classe utilizador
    class User extends Database {

        // $this->firstname = $firstname;
        // $this->lastname = $lastname;
        // $this->username = $username;
        // $this->password = $password;
        // $this->address = $address;


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
  <div class="container-header">
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img id="icon" src="images/logo.png"/></a>

  <!-- Toogler que aparecerá nos menores ecrãs -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto header-registo">

            <h3>Página de registo da imobiliária</h3>

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

    <!-- ÁREA DE REGISTO DA IMOBILIÁRIA -->
    <div class="register-wrapper">

        <form action="">

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

                <!-- Username do utilizador -->
                <div class="form-group">
                    <label for="username">Nome de utilizador</label>
                    <input type="text" name="username" id="username" placeholder="Escolha um nome de utilizador" class="form-control">
                </div>

            </div>

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

            <div id="location-form">

                <!-- Localização do utilizador -->

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



            <!-- Botão de submissão -->
<<<<<<< HEAD
            <button type="submit" class="btn-user">Criar conta</button>


=======
            <button type="submit" name="registar" class="btn-user">Criar conta</button>


>>>>>>> dev-paulo
        </form>

    </div>

    <!-- FINAL DA ÁREA DE REGISTO DA IMOBILIÁRIA -->

    <!-- FOOTER DA PÁGINA DE REGISTO -->
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
    <!-- FINAL DO FOOTER DA PÁGINA DE REGISTO -->

  </body>

    <!-- Ficheiros JavaScript pessois -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Script para a localização do utilizador -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#ilha").change(function(){
                let ilha = $("#ilha").val();
                $.ajax({
                type:'POST',
                url:'data/concelho.php',
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
                url:'data/freguesia.php',
                data:"idConcelho="+ concelho,
                success:function(html){
                    $('#freguesia').html(html);

                }
                });
            });


        });
    </script>



</html>
