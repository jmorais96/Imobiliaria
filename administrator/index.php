<?php


  // Incluir a classe Imobiliária
  require_once('../data/imobiliaria.class.php');

  // Incluir a classe Funcionario
  require_once("../data/funcionario.class.php");

  // Iniciar a sessão
  session_start();

  // Funcionalidade de login back-end
  if (isset($_POST['login'])){

    // Se os campos 'email' e 'password' estiverem devidamente preenchidos, o código abaixo é executado
    if(!empty($_POST['email']) && !empty($_POST['password'])){

            // Ligação à base de dados
            $db = new imobiliaria("../data/config.ini");
            //var_dump($db);
            $_SESSION['funcionario']=$db->loginFuncionario($_POST['email'], $_POST['password']);
            if (isset($_SESSION['funcionario'])) {
              if ($_SESSION['funcionario']->getTipoUser()=="Administrador") {
                header("location:login_success.php");
              }elseif ($_SESSION['funcionario']->getTipoUser()=="Gestor") {
                header("location:management/manager.php");
              }
            }

        /* Caso os campos 'email' e 'password' não estejam devidamente preenchidos, o user verá a mensagem abaixo definida */
        } else {
              $message = '<label>Todos os campos devem ser preenchidos</lable>';
          }
  }


  // RESTRIÇÕES DA PÁGINA DE LOGIN BACK-END
  // Impedir que um cliente aceda ao login administrativo
   if (isset($_SESSION['cliente'])) {
    header("location:../index.php");
  }

  // Impedir que um funcionário com a sessão já iniciada aceda ao login administrativo
  if (isset($_SESSION['funcionario'])) {
    header("location:login_success.php");
  }

?>

<!DOCTYPE html>
<html>

  <head>

    <!-- MetaTags -->
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="../css/styleLogin.css"/>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<title>Mais Imobiliária | Login administrativo</title>

  </head>
  <body>

    <div class="container_2">
       <div class="box_left_login">
            <div class="container">
                <div class="icon">
                   <img id="icon" src="../images/logo.png"/>

                   <!-- Formulário de login back-end -->
                   <form action="" method="POST">

                            <input type="text" name="email" placeholder="E-mail" class="form-control" >

                            <input type="password" name="password" placeholder="Password" class="form-control" >

                            <button type="submit" name="login" class="btn">Iniciar Sessão</button>
                    ´
                    </form>

                    <?php
                      // Mensagem que aparecerá caso o login back-end não seja bem-sucedido
                      if(isset($message)){
                        echo '<label class="text-danger">'.$message.'</label>';
                      }
                    ?>

                </div>
            </div>
        </div>

        </div>
    </div>

</body>
</html>
