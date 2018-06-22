<?php
require_once('../data/imobiliaria.class.php');
require_once("../data/funcionario.class.php");
session_start();

 if (isset($_POST['login'])){
     if(!empty($_POST['email']) && !empty($_POST['password'])){

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
      }
        //os campos se estiverem preenchidos executa
        else {
            $message = '<label>Todos os campos devem ser preenchidos</lable>';
        }
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

                   <form action="" method="POST">

                            <input type="text" name="email" placeholder="E-mail" class="form-control" >

                            <input type="password" name="password" placeholder="Password" class="form-control" >

                            <button type="submit" name="login" class="btn">Iniciar Sessão</button>
                    ´
                    </form>

                    <?php
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
