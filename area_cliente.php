<?php
/*
session_start();

$filenameUser = 'data/users.csv';
$fileUser = fopen($filenameUser, 'r'); //ler o ficheiro
while (!feof($fileUser)){
    $users = fgetcsv($fileUser,0,';'); //ir buscar dados ao csv
    
    if($users[0] == $_SESSION['user']){
        $name = $users[1];
        $apelido = $users[2];
        $email = $users[3];
        $password = $users[4];
        $telefone = $users[5];
        $ilha = $users[6];
        $concelho = $users[7];
        $freguesia = $users[8];
    }
}
fclose($fileUser);*/
?>

<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="stylesheet" type="text/css" href="css/area_cliente.css">
   <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>

<body>

  <div class="header">
    <div class="icon">
      <img id="icon" src="images/logo.png"/>
      <p id="homeIconName">
    </div>
    <div class="navItems">
      <a href="index.php"><p id="navItem">HOME</p></a>
        <a href="logout.php"><p id="navItem">LOGOUT</p></a>
    </div>
    <div class="phone">
      <img id="phoneIcon" src="images/call-answer.svg"/>
      <p id="phone">296 012 345</p>
    </div>
  </div>

  <div class="container_index">
    <div id="caixas_pesquisa">
            <div class="pesquisa_grande">
                 <h3>Área de Cliente</h3>
            </div>
    </div>
      <div class="container_info">
            <div id="sub_container_info">
              <div id="caixa1a">
                 <h3>Bem-Vindo(a), <?php echo $name ." ". $apelido; ?></h3>
              </div>
              <div id="caixa1b">  
                      <div id="caixa2">
                          <img id="icon2" src="images/email.svg">
                          <h3>E-mail: <?php echo $email ." "; ?></h3>
                      </div>
                      <div id="caixa2">
                         <img id="icon2" src="images/key.svg">
                         <h3>Password: <?php echo $password ." "; ?></h3>
                      </div>
                      <div id="caixa2">
                         <img id="icon2" src="images/phone.svg">
                         <h3>Telefone: <?php echo $telefone ." "; ?></h3>
                      </div>
                      <div id="caixa2">
                         <img id="icon2" src="images/address.svg">
                         <h3>Concelho: <?php echo $concelho ." "; ?></h3>
                      </div>
                      <div id="caixa2">
                         <img id="icon2" src="images/address.svg">
                         <h3>Freguesia: <?php echo $freguesia ." "; ?></h3>
                      </div>
                      <div id="caixa2">
                         <img id="icon2" src="images/address.svg">
                         <h3>Ilha: <?php echo $ilha ." "; ?></h3>  
                      </div>
                </div>
            </div>

          <div id="caixa1a">
              <h3>Consulte aqui o estado das suas visitas</h3>
          </div>

      </div>
      <div class=contain>
      <table class="table table-bordered table-hover">

        <?php
/*
        $filenameVisita = 'data/visitas.csv';
        $fileVisita = fopen($filenameVisita, 'r');
        while (($visitas = fgetcsv($fileVisita, 0, ';')) !== false) {

          if($visitas[3] == $_SESSION['user']){

            $idVisita = $visitas[0];
            $idImovel = $visitas[1];
            $idGestor = $visitas[2];
            $idUser = $visitas[3];
            $titulo = $visitas[4];
            $data = $visitas[9];
            $hora = $visitas[10];
            $estado = $visitas[11];

            echo '            

                    <thead>
                       <tr>
                           <th>IdVisita</th>
                           <th>IdImovel</th>
                           <th>Título</th>
                           <th>Data</th>
                           <th>Hora</th>
                           <th>Estado</th>
                       </tr> 
                    </thead>
                    <tbody>
                        <tr>';
                echo "<td> $idVisita </td>";
                echo "<td> $idImovel </td>";
                echo "<td> $titulo </td>";
                echo "<td> $data </td>";
                echo "<td> $hora </td>";
                echo "<td> $estado </td>";
                echo '</tbody>
                            
                                 ';

          }

        }
*/
        ?>

      </table>
        </div>
  </div>
      </div>
    </div>

  <div class="footer2">
    <div class="icon">
      <img id="icon" src="images/home-icon-white.svg"/>
      <p id="name"><b>Imobiliária</b>XPTO</p>
    </div>
    <div class="address">
      <p id="address">Rua da Igreja, 25</p>
    </div>
  </div>

</body>

</html>
