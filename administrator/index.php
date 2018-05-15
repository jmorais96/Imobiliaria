<!-- <?php
  //carrega os ficheiros necessários
  include("assets/constantes.php");
  include(class_departamento);
  include(class_user);

  //se for enviado por post
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = user;
    //le o ficheiro
    $file = fopen($filename, "r");

    //precorre o ficheiro
    while(!feof($file)){
      $data = fgetcsv($file,0,";");
      //se a linha não estiver vazia
      if ($data[0]!="") {
        //cria um array com os utilizadores
        $users[]=new users($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[0]);

      }
    }
    fclose($file);

    //precorre o array
    foreach ($users as $user) {
      //se o username e password corresponderem
      if ($_POST['username'] == $user->getUsername() && $_POST['password'] == $user->getPassword()){
        //abre e precorre o ficheiro dos departamentos
        $file=fopen(departamento, "r");
        while (!feof($file)) {
          $data=fgetcsv($file, 0, ";");
          if ($data[0]=="") {
            break;
          }
          //cria objetos departamento até encontraar o desejado
          $departamento=new departamento($data[0], $data[1]);
          if ($data[0]==$user->getIdDepartamento()) {
            break;
          }
        }
        //inicia a sessão
        session_start();
        //da a variavel de sessão "departamento" o objeto do departamento
        $_SESSION['departamento']=$departamento;
        //da a variavel de sessão "user" o objeto do utilizador desejado
        $_SESSION['user'] = $user;
        //vai para o inbox
        header('location: inbox.php');
        break;
      }
    }

  }


?>
-->


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

                            <input type="text" name="username" placeholder="Username" value="" required>

                            <input type="password" name="password" placeholder="password" value="" required>

                            <input type="submit" value="login">
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
