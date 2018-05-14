
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Azores Property | Administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media='screen and (min-width: 260px) and (max-width: 767px)' href="../css/mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 768px) and (max-width: 1100px)' href="../css/tablet.css"/>
    <link rel="stylesheet" media='screen and (min-width: 1101px)' href="../css/admin_desktop.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
  </head>
  <body>
    <div class="nav_box">
      <div class="logo_box">
        <a href="../index.php"><img src="../images/logo.png" alt=""></a>
      </div>
      <div class="backend_admin">
        <h1>Administração</h1>
      </div>
      <div class="user_box">
        <a href="?acao=logout"><button id="modalBtn1" class="user_status">Logout</button></a>
      </div>
    </div>
    <div class="nav_holder">
    </div>
    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Estatisticas</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Imóveis em destaque</button>
      <button class="tablinks" onclick="openCity(event, 'Tokyo')" >Adicionar gestor</button>
      <button class="tablinks" onclick="openCity(event, 'Madrid')" >Edição de Gestores</button>
    </div>

    <div id="London" class="tabcontent">
      <div class="statistics">
      </div>
      <form class="" action="pdf_gestor.php" method="post">
        Vendas por gestor:
        <select class="" name="id">
          <!-- <?php
          //criar select para criar pdf de gestor
            $file=fopen("../data/$filegestor", "r");
            while (!feof($file)) {
              $gestor=fgetcsv($file,0,";");
              if(!empty($gestor[0])){
                if ($gestor[0]!=1) {
                  echo "<option value='$gestor[0]'> $gestor[3] </option>";
                }

              }
            }
            fclose($file);
          ?> -->
        </select>
        <input type="submit"  value=" Gerar pdf ">
      </form>



      <br>
        Vendas por tipo <a href="pdf_tipo.php"><button>Gerar pdf</button></a>
      <br>

        Vendas intrevalo de preço <a href="pdf_preco.php"><button>Gerar pdf</button></a>
        <br>




        <form class="" action="pdf_local.php" method="post">
          <select name="ilha" id="ilha" onchange="functionConcelho(this.id,'concelho') ">
            <option value="">Ilha em que procura:</option>

            <!-- <?php

            $file = fopen("../data/pesquisa/ilha.csv", "r");

            while (!feof($file)) {

              $ilha = fgetcsv($file, 0, ";");

                if($ilha[0]=="")
                break;

                echo '<option value="'.$ilha[1].'">'.$ilha[0].'</option>';
            }

            fclose($file);

            ?> -->

          </select>

          <!-- Concelho do imóvel procurado -->
          <select  name="concelho" id="concelho" onchange="functionFreguesia(this.id,'freguesia')">
            <option value="arrendar">Concelho em que procura:</option>
          </select>


          <input type="submit" name="" value="Gerar pdf">
        </form>

    </div>

    <div id="Paris" class="tabcontent">
      <div id="notifications">
        <button id="num_notifications">pendente</button>
        <button id="num_notifications1">$pendente</button>
        <div id="notifications_box">
          <!-- <?php

            //imprimir imoveis pendentes para destaque
            for ($i=0; $i <count($pendente) ; $i++) {
              //verificação de value da localidade para os seus nomes corretos nos ficheiros css
              $file_ilha_pendente=fopen("../data/pesquisa/ilha.csv","r");
              while (!feof($file_ilha_pendente)) {
                $data_ilha_pendente=fgetcsv($file_ilha_pendente,0,";");
                if ($data_ilha_pendente[1]==$pendente[$i][3]) {
                  break;
                }
              }
              fclose($file_ilha_pendente);
              $file_concelho_pendente=fopen("../data/pesquisa/concelho/".trim($data_ilha_pendente[1]).".csv","r");
              while (!feof($file_concelho_pendente)) {
                $data_concelho_pendente=fgetcsv($file_concelho_pendente,0,";");
                if (trim($data_concelho_pendente[1])==trim($pendente[$i][4])) {
                  break;
                }
              }
              fclose($file_concelho_pendente);
              $file_freguesia_pendente=fopen("../data/pesquisa/freguesia/".trim($data_concelho_pendente[1]).".csv","r");
              while (!feof($file_freguesia_pendente)) {
                $data_freguesia_pendente=fgetcsv($file_freguesia_pendente,0,";");
                if (trim($data_freguesia_pendente[1])==trim($pendente[$i][5])) {
                  break;
                }
              }
              fclose($file_freguesia_pendente);

          ?> -->
          <div class="notification">
          <a href="../p_imovel.php/id=pendente"><div class="thumbnail_notification">
            <div class="thumb_img_notification">
              <img src="../imoveis/idimovel/pendente_0.jpg" alt="">
            </div>
            <div class="thumbnail_info_notification">
              <p><?php echo $pendente[$i][1]; ?> - <?php echo $pendente[$i][2]; ?></p>
              <p><?php echo $data_ilha_pendente[0]; ?>- <?php echo $data_concelho_pendente[0]; ?> - <?php echo $data_freguesia_pendente[0]; ?></p>
              <p><?php echo $pendente[$i][6]; ?></p>
              <p><?php echo substr($pendente[$i][9],0,50)."..."; ?></p>
              <p><?php echo $pendente[$i][7]; ?></p>
            </div>
          </div></a>
          <div id="feature_aprovation">
            <button type="button" class="aprove_feature"> <a href="destaque.php?id=<?php echo $pendente[$i][0]; ?>">v</a></button>
            <button type="button" class="disaprove_feature"><a href="n_destaque.php?id=<?php echo $pendente[$i][0]; ?>">x</a></button>
          </div>
          </div>

        <?php
          }
        ?>

        </div>
      </div>
      <div class="management1">
<!--
        <?php

        if(isset($id_destaque)){
          //imprimir imoveis em destaque
          for ($i=0; $i <count($id_destaque) ; $i++) {

            $file=fopen("../imoveis/".$id_destaque[$i]."/".$id_destaque[$i]."imovel.csv", "r");
            $destaque=fgetcsv($file,0,";");
            fclose($file);
            //verificação de value da localidade para os seus nomes corretos nos ficheiros css
            $file_ilha=fopen("../data/pesquisa/ilha.csv","r");
            while (!feof($file_ilha)) {
              $data_ilha=fgetcsv($file_ilha,0,";");
              if ($data_ilha[1]==$destaque[3]) {
                break;
              }
            }
            fclose($file_ilha);
            $file_concelho=fopen("../data/pesquisa/concelho/".trim($data_ilha[1]).".csv","r");
            while (!feof($file_concelho)) {
              $data_concelho=fgetcsv($file_concelho,0,";");
              if (trim($data_concelho[1])==trim($destaque[4])) {
                break;
              }
            }
            fclose($file_concelho);
            $file_freguesia=fopen("../data/pesquisa/freguesia/".trim($data_concelho[1]).".csv","r");
            while (!feof($file_freguesia)) {
              $data_freguesia=fgetcsv($file_freguesia,0,";");
              if (trim($data_freguesia[1])==trim($destaque[5])) {
                break;
              }
            }
            fclose($file_freguesia);


        ?> -->
        <a href="../p_imovel.php?id=<?php echo $destaque[0]; ?>">
          <div class="thumbnail_management">
            <div class="thumb_img_management">
              <img src="../imoveis/<?php echo $destaque[0] ?>/<?php echo $destaque[0] ?>_0.jpg" alt="">
            </div>
            <div class="thumbnail_info_management">
              <p><?php echo $destaque[1]; ?></p>
              <p><?php echo $data_ilha[0]; ?> - <?php echo $data_ilha[0]; ?> - <?php echo $data_freguesia[0]; ?></p>
              <p><?php echo $destaque[6]; ?></p>
              <p><?php echo $destaque[7]; ?></p>
              <p><?php echo substr($destaque[9],0,100)."..."; ?></p>
            </div>
          </div>
        </a>


        <?php

        }
      }

        ?>
      </div>
    </div>
    <div id="Tokyo" class="tabcontent">
      <div class="admin_container">
        <!-- Form para criar gestor -->
        <h1>Adicionar gestor</h1>
        <form class="add_manager" action="" method="post">
          <label>Nome:<input type="text" name="nome" placeholder="Nome completo" value="<?php echo"$nome" ?>"/></label>
          <label>Username:<input type="text" name="username" placeholder="Nome de utilizador" value="<?php echo"$username" ?>"/></label>
          <label>Password:<input type="password" name="password" placeholder="Palavra passe" value="<?php echo"$password" ?>"/></label>
          <label>Comfirmar password:<input type="password" name="retype" placeholder="Confirmar a palavra passe" value="<?php echo"$retype" ?>"/></label>
          <input type="submit" name="submit_manager" value="criar">
        </form>
      </div>
    </div>

    <div id="Madrid" class="tabcontent">
      <div class="admin_container">

                <h1>LISTA DE GESTORES</h1>
                <!-- <?php
                //listar gestor
                  $file=fopen("../data/$filegestor", "r");
                  while (!feof($file)) {
                    $gestor=fgetcsv($file,0,";");
                    if(!empty($gestor[0])){
                      echo ("Nome:$gestor[3]<br>
                      Username:$gestor[1] <br>
                      Password: $gestor[2] ");
                      //verificar se o gestor é administrador para nao o poder eliminar
                      if($gestor[0]!=1){
                        echo "<a href='eliminar_gestor.php?id=$gestor[0]'> ELIMINAR </a>";
                      } ?>
                         <?php echo "<a href='editar_gestor.php?id=$gestor[0]'> EDITAR </a> <br>";
                    }
                  }
                  fclose($file);


                ?> -->

      </div>
    </div>
  </div>
  <script src="../js/admin_container.js"></script>
  <script src="../js/pesquisa.js"></script>
  <script src="../js/filter.js"></script>
  <script src="../js/popup.js"></script><!-- Script para login -->
  <script type="text/javascript">
    var num_notifications = document.getElementById('num_notifications');
    var num_notifications1 = document.getElementById('num_notifications1');
    var notifications_box = document.getElementById('notifications_box');
    num_notifications.onclick = function(){
      num_notifications.style.display = "none";
      num_notifications1.style.display = "flex";
      notifications_box.style.display = "flex";
  }

  num_notifications1.onclick = function(){
    num_notifications.style.display = "flex";
    num_notifications1.style.display = "none";
    notifications_box.style.display = "none";
}


function functionConcelho(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
  s2.options.length = 0;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(this.readyState == XMLHttpRequest.DONE){
        console.log(this.responseText);
        var lines = this.responseText.split("\n");
        for (var i = -1; i < lines.length; i++) {
          var newOption = document.createElement("option");
          if (i==-1) {
              newOption.value = "Concelho";
              newOption.innerHTML = "Concelho";
              s2.options.add(newOption);
            }else{
              if (lines[i]!="") {
                var elem = lines[i].split(";");
                newOption.value = elem[1];
                newOption.innerHTML = elem[0];
                s2.options.add(newOption);
              }
            }
          }
        }

    };
    xmlhttp.open("GET", "../data/pesquisa/concelho/"+s1.value+".csv", true);
    xmlhttp.send();


	}




  </script>
  <?php

  if (isset($_GET['acao']) && $_GET['acao']=='gestor') {
    echo "<script> window.alert('Este gestor tem imoveis em seu nome') </script>";
  }
  if (isset($_GET['acao']) && $_GET['acao']=='destaqueko') {
    echo "<script> window.alert('Já existe 6 imoveis em destaque') </script>";
  }
  ?>
</body>
</html>
