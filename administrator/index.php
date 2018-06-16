<?php
require_once('../data/imobiliaria.class.php');
require_once("../data/funcionario.class.php");
session_start();

//var_dump($_SESSION['funcionario']);
 if (isset($_POST['login'])){
     if(!empty($_POST['email']) && !empty($_POST['password'])){

          $db = new imobiliaria("../data/config.ini");
          //var_dump($db);
          $_SESSION['funcionario']=$db->loginFuncionario($_POST['email'], $_POST['password']);
          if (!isset($_SESSION['funcionario'])) {
            $message = '<label>Não existe um funcionario com estes email e password</lable>';
          }else{
            var_dump($_SESSION['funcionario']);
            if ($_SESSION['funcionario']->getTipoUser()=="Administrador") {
              header("location:login_success.php");
            }elseif ($_SESSION['funcionario']->getTipoUser()=="Gestor") {
              header("location:management/manager.php");
            }else {
              echo "<script>alert('here');</script>";
            }
          }
        }
        //os campos se estiverem preenchidos executa
        else {
            $message = '<label>Todos os campos devem ser preenchidos</lable>';
        }
 }


/*try {
    $bd = new imobiliaria('../data/config.ini');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['login'])){
        //os campos se estiverem vazios aparece msg
        if(empty($_POST['email']) || empty($_POST['password'])){
            $message = '<label>Todos os campos devem ser preenchidos</lable>';
        }
        //os campos se estiverem preenchidos executa
        else {
            $query = 'SELECT * FROM funcionario WHERE email = :email AND password = :password';
            $sttm = $db->prepare($query);
            $sttm->execute(
                array(
                    'email'=>$_POST['email'],
                   'password'=>$_POST['password']
                )
            );
            //verificar se os campos correspondem a algum da base de dados. Se sim reencaminha para login_success.php
            $count = $sttm->rowCount();
            if($count == 1){
                $_SESSION['email'] = $_POST['email'];
                header('location:login_success.php');
            }
            else {
                $message = '<label>Dados incorretos</label>';
            }
        }

    }
}
catch (PDOException $e) {
    echo 'Conecção falhou: ' . $e->getMessage();
}*/

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
