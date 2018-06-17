<?php
require_once('../data/imobiliaria.class.php');
require_once("../data/funcionario.class.php");
session_start();

 if (isset($_POST['login'])){
     if(!empty($_POST['email']) && !empty($_POST['password'])){

          $db = new imobiliaria("../data/config.ini");
          //var_dump($db);
          $_SESSION['funcionario']=$db->loginFuncionario($_POST['email'], $_POST['password']);
            var_dump($_POST);
            var_dump($_SESSION['funcionario']);
            if ($_SESSION['funcionario']->getTipoUser()=="Administrador") {
              header("location:login_success.php");
            }elseif ($_SESSION['funcionario']->getTipoUser()=="Gestor") {
              header("location:management/manager.php");
            }else {
              echo "<script>alert('here');</script>";
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
  	<title>Integrated Managment System</title>
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleLogin.css"/>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--<script src="js/script.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>


    <div class="header">
           <div class="box_header_left_login">
               <div class="subbox_header_left">


               </div>
           </div>
           <div class="box_header_right_login">

            </div>
    </div>


    <div class="container_2">
       <div class="box_left_login">
            <div class="container">
                <div class="icon">
                   <img id="icon" src="../images/logo.png"/>

                   <form action="" method="POST">

                            <input type="text" name="email" placeholder="e-mail" class="form-control" >

                            <input type="password" name="password" placeholder="password" class="form-control" >

                            <input type="submit" name="login" class="btn btn-info" value="login">
                    </form>

                    <?php
                      if(isset($message)){
                        echo '<label class="text-danger">'.$message.'</label>';
                      }
                    ?>

                </div>
            </div>
        </div>
        <div class="box_right_login">
            <div class="subbox_right">
                <div class="subbox_row">


                </div>
            </div>

        </div>
    </div>


</body>


</html>
