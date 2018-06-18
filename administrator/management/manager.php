<?php
require_once('../../data/imobiliaria.class.php');
require_once("../../data/funcionario.class.php");
session_start();
//var_dump($_SESSION['funcionario']);
  require_once('../../assets/logout.php');
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }

  $bd=new imobiliaria("../../data/config.ini");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">Azores Property | Gestão de conteúdos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="../../css/homepage.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/gerirImovelTable.css">

    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Ficheiros JavaScript -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/main.js"></script>
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
      <button class="tablinks"  id="btnImoveis">Imóveis</button>
      <button class="tablinks" id="btnAdicionarImovel" >Adicionar imóveis</button>
      <button class="tablinks" id="btnAdicionarVisita">Visitas</button>
    </div>
    <div id="imoveis" class="tabcontent">
        <div class="management">

          <div class="thumbnail_management">
            <div class="thumb_img_management">
              <a href="../../p_imovel.php?id="><img src="../../imoveis/_0.jpg" class="img_pesquisa_m" alt=""></a>
                        </div>
            <div class="thumbnail_info_management">
              <p></p>
              <p></p>
              <p></p>
              <p></p>
              <p></p>
            </div>
            <div class="buttons_management">
              <a href="propor.php?id="> <button class="ask_for_feature"type="button" name="button">Propor a destaque</button></a>
              <a href="../../edicao_imovel.php?id="><button class="edit" type="button" name="button">Editar</button></a>
              <a href="../../eliminar_imovel.php?id="><button class="delete" type="button" name="button">Eliminar</button></a>

              <button class="visits_noti">visitas()</button>
              <div class="notifications_box1">
                <div class="notification1">
                  <p>, quer visitar este imóvel dia às </p>
                  <div id="visit_aprovation">
                    <button type="button" class="aprove_visit"> <a href="aceitar_visita.php?id=">v</a></button>
                    <button type="button" class="disaprove_visit"><a href="negar_visita.php?id=">x</a></button>
                  </div>
                </div>
          </div>
      </div>
    </div>
    </div>
  </div>

    <div id="adicionarImovel" class="tabcontent">
        <form class="add_property" action="" method="get" enctype="multipart/form-data" >
          <div class="add_prop_box">
          <div><label>Finalidade</label></div>
              <select  name="finalidade">
                <?php $bd->selectFinalidade() ?>
              </select>
            </div>
          <div class="add_prop_box">
          <div><label>Tipo de imóvel</label></div>
            <select  name="tipo_imovel" id="tipo_de_imovel">
              <?php $bd->selectTipoImovel() ?>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Tipologia</label></div>
            <select  name="tipologia" id="tipologia">
              <?php $bd->selectTipologia() ?>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Ilha</label></div>
            <select  name="ilha" id="ilha" >
              <?php $bd->selectIlha(); ?>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Concelho</label></div>
            <select  name="concelho" id="concelho" >
              <option value="">Selecione um concelho</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Freguesia</label></div>
            <select  name="freguesia" id="freguesia">
              <option value="">Selecione uma freguesia</option>
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
            <input type="hidden" name="lat" value="">
            <input type="hidden" name="lng" value="">
          </div>
        <!-- MAPA -->
      <div class="map" style="height:500px;"></div>
      <div class="add_prop_box">
          <input type="submit" value="criar"/>
        </div>
        </form>
    </div>
    <div id="visitas" class="tabcontent">

    </div>


    <!-- API Google Maps -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

      <!-- Ficheiros JavaScript pessois -->

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

      <!-- Latest compiled Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Popper.js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <script>
      $(document).on("click", ".visits_noti", function(event){
          event.preventDefault();
          $(this).next('.notifications_box1').toggle();
      });

      $("#ilha").change(function(){
          let ilha = $("#ilha").val();
          $.ajax({
          type:'POST',
          url:'../../assets/concelho.php',
          data:"idIlha="+ ilha,
          success:function(html){
              $('#concelho').html(html);
          }
          });
      });

      $("#concelho").change(function(){
          let concelho = $("#concelho").val();
          $.ajax({
          type:'POST',
          url:'../../assets/freguesia.php',
          data:"idConcelho="+ concelho,
          success:function(html){
              $('#freguesia').html(html);

          }
          });
      });

      $("#imoveis").show();
      $("#visita").hide();
      $("#adicionarImovel").hide();


      $("#btnAdicionarImovel").click(function(){
        $("#imoveis").hide();
        $("#visita").hide();
        $("#adicionarImovel").show();
      });


      $("#btnImoveis").click(function(){
        $("#adicionarImovel").hide();
        $("#visita").hide();
        $("#imoveis").show();
      });


      $("#btnAdicionarVisita").click(function(){
        $("#imoveis").hide();
        $("#adicionarImovel").hide();
        $("#visita").show();
      });

      marker="";
      google.maps.event.addListener(map, 'click', function(event) {
        if (marker == "") {
          placeMarker(event.latLng);
        }else {
          marker.setMap(null);
          marker="";
          placeMarker(event.latLng);
        }
      });

      function placeMarker(location) {
          marker = new google.maps.Marker({
          position: location,
          map: map
        });
        //console.log(location.toString());
        let coordenadas=location.toString().replace("(", "").replace(")", "").split(' ').join('').split(",");
        //console.log(coordenadas);
        console.log(coordenadas[0]);
        $("[name=lat]").val(coordenadas[0]);
        $("[name=lng]").val(coordenadas[1]);
      }

    </script>
  </body>
</html>
