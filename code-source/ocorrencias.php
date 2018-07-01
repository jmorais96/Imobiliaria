<?php

require_once('classes/database.class.php');

$bd=new Database('config.ini');

session_start();

if (isset($_POST['user'])){
  $sql='select * from utilizador where email =  :email and password = :password';
  $id=array('email'=> $_POST['user'], 'password'=> $_POST['pass']);
  $result=$bd->query($sql, $id);
  //var_dump($result);
  if ($result[0]['idUser']!="") {
    $_SESSION['user']=$result[0];
  }
}

if (isset($_POST['date'])){
  $sql='INSERT INTO Ocorrencia (data, descricao, cidadao, idcategoria, estado) values (:data, :descricao, :cidadao, :idcategoria, "Submetida")';
  $param=array('data'=>$_POST['date'],'descricao'=>$_POST['description'],'cidadao'=> $_SESSION['user']['idUser'], 'idcategoria'=> $_POST['categoria']);
  $result=$bd->query($sql, $param);
  echo "<script> alert('Ocorrencia submetida com sucesso'); </script>";
}


if (isset($_SESSION['user'])) {
  ?>

  <!DOCTYPE html>
  <html lang="pt" dir="ltr">
    <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="css/style.css">
      <title></title>
    </head>
    <body>
      <form class="" action="" method="post">
        <h1>Adicionar tipo de utilizador</h1>
        <input type="date" name="date" value="" placeholder="Novo tipo de utilizador..." required>
        <textarea name="description" rows="8" cols="80"placeholder="Descrição..."></textarea>
        <select class="" name="categoria" required>
          <?php

            $sql="SELECT * FROM categoria";
            $result=$bd->query($sql);
            foreach ($result as $row) {
              echo "<option value=' ". $row['idcategoria'] ."'>". $row['categoria']."</option>";
            }
          ?>

        </select>
        <input type="submit" name="" value="Submeter">
      </form>
    </body>
  </html>


<?php
} else {

?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <h1>Adicionar tipo de utilizador</h1>
      <input type="text" name="user" value="" placeholder="Novo tipo de utilizador..." required>
      <input type="password" name="pass" value="" required>
      <input type="submit" name="" value="Submeter">
    </form>
  </body>
</html>
<?php

}

?>
