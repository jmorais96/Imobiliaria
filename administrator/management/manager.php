
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">Azores Property | Gestão de conteúdos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media='screen and (min-width: 260px) and (max-width: 767px)' href="../../css/mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 768px) and (max-width: 1100px)' href="../../css/tablet.css"/>
    <link rel="stylesheet" media='screen and (min-width: 1101px)' href="../../css/admin_desktop.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
  </head>
  <body>
    <div class="nav_box">
      <div class="logo_box">
        <a href="../../index.php"><img src="../../images/logo.png" alt=""></a>
      </div>
      <div class="backend_admin">
        <h1>Gestão de conteúdos</h1>
      </div>
      <div class="user_box">
        <a href="?acao=logout"><button class="user_status">Logout</button></a>
      </div>
    </div>
    <div class="nav_holder">
    </div>
    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Imóveis</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Adicionar imóveis</button>
      <button class="tablinks" onclick="openCity(event, 'Tokio')">Visitas</button>
    </div>
    <div id="London" class="tabcontent">
        <div class="management">
        <?php


        //se o gestor tem imoveis em seu nome
        if(isset($imoveis)){
          //ordenaos acendentemente
          arsort($imoveis);
          //imprime os imoveis
         foreach ($imoveis as $key => $value) {

            $file=fopen("../../imoveis/".$value."/".$value."imovel.csv", "r");
            $data=fgetcsv($file,0,";");
            fclose($file);

            //verificação de value da localidade para os seus nomes corretos nos ficheiros css
            $file_ilha=fopen("../../data/pesquisa/ilha.csv","r");
            while (!feof($file_ilha)) {
              $data_ilha=fgetcsv($file_ilha,0,";");
              if ($data_ilha[1]==$data[3]) {
                break;
              }
            }
            fclose($file_ilha);
            $file_concelho=fopen("../../data/pesquisa/concelho/".trim($data_ilha[1]).".csv","r");
            while (!feof($file_concelho)) {
              $data_concelho=fgetcsv($file_concelho,0,";");
              if (trim($data_concelho[1])==trim($data[4])) {
                break;
              }
            }
            fclose($file_concelho);
            $file_freguesia=fopen("../../data/pesquisa/freguesia/".trim($data_concelho[1]).".csv","r");
            while (!feof($file_freguesia)) {
              $data_freguesia=fgetcsv($file_freguesia,0,";");
              if (trim($data_freguesia[1])==trim($data[5])) {
                break;
              }
            }
            fclose($file_freguesia);


        ?>
          <div class="thumbnail_management">
            <div class="thumb_img_management">
              <a href="../../p_imovel.php?id=<?php echo $data[0]; ?>"><img src="../../imoveis/<?php echo $data[0] ?>/<?php echo $data[0] ?>_0.jpg" class="img_pesquisa_m" alt=""></a>
                        </div>
            <div class="thumbnail_info_management">
              <p><?php echo $data[1] ?> - <?php echo $data[2] ?></p>
              <p><?php echo $data_ilha[0] ?> - <?php echo $data_concelho[0] ?> - <?php echo $data_freguesia[0] ?></p>
              <p><?php echo $data[6] ?></p>
              <p><?php echo substr($data[9],0,25)."..."; ?></p>
              <p><?php echo $data[7] ?></p>
            </div>
            <div class="buttons_management">
              <a href="propor.php?id=<?php echo $data[0]; ?>"> <button class="ask_for_feature"type="button" name="button">Propor a destaque</button></a>
              <a href="../../edicao_imovel.php?id=<?php echo $data[0]; ?>"><button class="edit" type="button" name="button">Editar</button></a>
              <a href="../../eliminar_imovel.php?id=<?php echo $data[0]; ?>"><button class="delete" type="button" name="button">Eliminar</button></a>
              <?php
              $visitas= array();

                //verificar se existe visitas para este imovel
                $file_visitas=fopen("../../data/$filevisitas", "r");
                while (!feof($file_visitas)) {
                  $data_visita=fgetcsv($file_visitas, 0 ,";");
                  if($data_visita[6] == '$pendente') {


                  if ($data_visita[2]==$data[0]) {
                    $visitas[]=$data_visita;
                  }
                }
                }
                fclose($file_visitas);


               ?>
              <button class="visits_noti">visitas(<?php echo count($visitas); ?>)</button>
              <div class="notifications_box1">
                <?php

                if (isset($visitas)) {
                  foreach ($visitas as $value1){
                    $file_cli=fopen("../../data/$filecliente", "r");
                    while (!feof($file_cli)) {
                      $data_cli=fgetcsv($file_cli, 0,";");
                      if ($data_cli[0]==$value1[1]) {
                        break;
                      }
                    }


                ?>



                <div class="notification1">
                  <p><?php echo $data_cli[1]." ".$data_cli[2] ; ?>, quer visitar este imóvel dia <?php echo "$value1[4]"; ?> às <?php echo "$value1[5]";  ?></p>
                  <div id="visit_aprovation">
                    <button type="button" class="aprove_visit"> <a href="aceitar_visita.php?id=<?php echo $value1[0]; ?>">v</a></button>
                    <button type="button" class="disaprove_visit"><a href="negar_visita.php?id=<?php echo $value1[0]; ?>">x</a></button>
                  </div>


                </div>
                <?php
              fclose($file_cli);
                  }
                    }

                ?>
              </div>
            </div>
          </div>
          <?php
          unset($visitas);
        }
      }

          ?>
          </div>
      </div>
    <div id="Paris" class="tabcontent">
        <form class="add_property" action="" method="post" enctype="multipart/form-data" >
          <div class="add_prop_box">
          <div><label>Finalidade</label></div>
              <select  name="finalidade">
                <option value="">Finalidade</option>
                <option value="arrendar">arrendar</option>
                <option value="comprar">comprar</option>
              </select>
            </div>
          <div class="add_prop_box">
          <div><label>Tipo de imóvel</label></div>
            <select  name="tipo_imovel" id="tipo_de_imovel" onchange="functionTipologia(this.id, 'tipologia')">
              <option value="">Tipo de imóvel</option>
              <option value="Terreno">Terrenos</option>
              <option value="Apartamento">Apartamentos</option>
              <option value="Moradia">Moradias</option>
              <option value="Quinta">Quintas</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Tipologia</label></div>
            <select  name="tipologia" id="tipologia">
              <option value="">Tipologia</option>
              <option value="T0">T0</option>
              <option value="T1">T1</option>
              <option value="T2">T2</option>
              <option value="T3">T3</option>
              <option value="T4">T4</option>
              <option value="T5">T5</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Ilha</label></div>
            <select  name="ilha" id="ilha" onchange="functionConcelho(this.id,'concelho')">
              <option value="">Ilha</option>

              <?php

              $file = fopen("../../data/pesquisa/ilha.csv", "r");

              while (!feof($file)) {

                $ilha = fgetcsv($file, 0, ";");

                  if($ilha[0]=="")
                  break;

                  echo '<option value="'.$ilha[1].'">'.$ilha[0].'</option>';
              }

              fclose($file);

              ?>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Concelho</label></div>
            <select  name="concelho" id="concelho" onchange="functionFreguesia(this.id,'freguesia')">
              <option value="Concelho">concelho</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Freguesia</label></div>
            <select  name="freguesia" id="freguesia">
              <option value="Freguesia">freguesia</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Morada</label></div><input type="text" name="morada" value="morada"/>
        </div>
      <div class="add_prop_box">
          <div><label>Valor</label></div><input type="number" name="valor" value="valor"/>
        </div>
      <div class="add_prop_box">
          <div><label>Descrição do imovel</label></div><textarea name="descricao" value="descrição"/></textarea>
        </div>
      <div class="add_prop_box">
          <div><label>Destaque na homepage</label></div><input type="checkbox" name="featured" value="featured"/>
        </div>
      <div class="add_prop_box">
          <div><label>Imagem(s)</label></div><br><input type="file" name="img[]" accept="image/*" multiple>
        </div>
      <div class="add_prop_box">
          <input type="submit" value="criar"/>
        </div>
        </form>
    </div>
    <div id="Tokio" class="tabcontent">

      <?php
      //verificar visitas aceites pelo administrador
        $file_lista_visitas=fopen("../../data/$filevisitas","r");
        while (!feof($file_lista_visitas)) {
          $data_lista_visitas=fgetcsv($file_lista_visitas,0,";");
          if ($data_lista_visitas[3]==$_SESSION['admin']) {
            if ($data_lista_visitas[6]=="aceite") {
              $visitas_aceites[]=$data_lista_visitas;
            }
          }
        }
        if (isset($visitas_aceites)) {
          fclose($file_lista_visitas);
          foreach ($visitas_aceites as $row) {
            $file_lista_cliente=fopen("../../data/$filecliente","r");
            while (!feof($file_lista_cliente)) {
              $data_lista_cliente=fgetcsv($file_lista_cliente,0,";");
              if ($data_lista_cliente[0]==$row[1]) {
                break;
              }
            }
            fclose($file_lista_cliente);
            $file_lista_imovel=fopen("../../imoveis/$row[2]/$row[2]imovel.csv", "r");
            $data_lista_imovel=fgetcsv($file_lista_imovel,0,";");
            fclose($file_lista_imovel);
            echo "<strong>Visita ao imóvel ($data_lista_imovel[9])</strong> <br><br>";
            echo "Dia da visita: " . $row[4] . "<br>";
            echo "Hora da visita: " . $row[5] . "<br>";
            echo "Nome do cliente: " . $data_lista_cliente[1]." ".$data_lista_cliente[2] . "<br>";
            echo "Numero do cliente: " . $data_lista_cliente[5] . "<br>";
          }
        }


       ?>
    </div>
    </div>

    <script src="../../js/admin_container.js"></script>
    <script src="../../js/filter.js"></script>
    <script src="../../js/popup.js"></script><!-- Script para login -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
    $(document).on("click", ".visits_noti", function(event){
        event.preventDefault();
        $(this).next('.notifications_box1').toggle();
    });
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
        xmlhttp.open("GET", "../../data/pesquisa/concelho/"+s1.value+".csv", true);
        xmlhttp.send();


    	}

      function functionFreguesia(s2,s3){
      	var s2 = document.getElementById(s2);
      	var s3 = document.getElementById(s3);
        s3.options.length = 0;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if(this.readyState == XMLHttpRequest.DONE){
              console.log(this.responseText);
              var lines = this.responseText.split("\n");
              for (var i = -1; i < lines.length; i++) {
                var newOption = document.createElement("option");
                if (i==-1) {
                    newOption.value = "Freguesia";
                    newOption.innerHTML = "Freguesia";
                    s3.options.add(newOption);
                  }else{
                    if (lines[i]!="") {
                      var elem = lines[i].split(";");
                      newOption.value = elem[1];
                      newOption.innerHTML = elem[0];
                      s3.options.add(newOption);
                    }
                  }
              }
            }

          };
          xmlhttp.open("GET", "../../data/pesquisa/freguesia/"+s2.value+".csv", true);
          xmlhttp.send();

      	}
        function functionTipologia(s1,s2){
          var s1 = document.getElementById(s1);
          var s2 = document.getElementById(s2);
          s2.options.length = 0;
          if (s1.value=="Terreno") {
            var newOption = document.createElement("option");
            newOption.value = "T0";
            newOption.innerHTML = "T0";
            s2.options.add(newOption);
          }else{
            var newOptiont0 = document.createElement("option");
            newOptiont0.value = "T0";
            newOptiont0.innerHTML = "T0";
            s2.options.add(newOptiont0);
            var newOptiont1 = document.createElement("option");
            newOptiont1.value = "T1";
            newOptiont1.innerHTML = "T1";
            s2.options.add(newOptiont1);
            var newOptiont2 = document.createElement("option");
            newOptiont2.value = "T2";
            newOptiont2.innerHTML = "T2";
            s2.options.add(newOptiont2);
            var newOptiont3 = document.createElement("option");
            newOptiont3.value = "T3";
            newOptiont3.innerHTML = "T3";
            s2.options.add(newOptiont3);
            var newOptiont4 = document.createElement("option");
            newOptiont4.value = "T4";
            newOptiont4.innerHTML = "T4";
            s2.options.add(newOptiont4);
            var newOptiont5 = document.createElement("option");
            newOptiont5.value = "T5+";
            newOptiont5.innerHTML = "T5+";
            s2.options.add(newOptiont5);
          }
        }
    </script>
  </body>
</html>
