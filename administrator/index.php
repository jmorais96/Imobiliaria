<?php
include("data/funcionario.class.php");
session_start();

//$conn = new PDO('mysql:host=localhost;dbaname=bla', 'root', '');
$bd = new imobiliaria('data/config.ini');

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = $conn->prepare("SELECT COUNT('idFuncionario') FROM 'funcionario' WHERE 'email' = '.$email.' AND 'password' = '.$password.'");
    $query->execute();
    
    $count = $query->fetchColumn();
    
    if($count == "1"){
        $_SESSION['email'] = $email;
        header('location: admin.php');
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
    <script src="js/script.js"></script>
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

                            <input type="text" name="email" placeholder="e-mail" value="" required>

                            <input type="password" name="password" placeholder="password" value="" required>

                            <input type="submit" name="login" value="login">
                          </form>

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
