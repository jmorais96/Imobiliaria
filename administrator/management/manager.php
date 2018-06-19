<?php


  // Incluir a classe Imobiliária
  require_once('../../data/imobiliaria.class.php');

  // Incluir a classe Funcionario
  require_once('../../data/funcionario.class.php');

  // Incluir a classe Imovel
  require_once('../../data/imovel.class.php');

  // Incluir a classe imagem
  require_once('../../data/imagem.class.php');

  // Incluir a classe user
  require_once('../../data/user.class.php');

  // Incluir a classe visita
  require_once('../../data/visita.class.php');

  // Iniciar a sessão
  session_start();

  // var_dump($_SESSION['funcionario']);

  // Incluir a funcionalidade de log out

  require_once('../../assets/logout.php');

  // Reencaminhar o utilizar para o índex caso este não seja um funcionário
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }


  // Criar a ligação à base de dados
  $bd = new imobiliaria("../../data/config.ini");

 if(isset($_POST['add_imovel'])) {

          $bd->adicionarImovel($_POST['gestor'], $_POST['finalidade'], $_POST['tipoImovel'], $_POST['area'], $_POST['preco'], $_POST['descricao'], $_POST['morada'], $_POST['codPostal'], $_POST['lat'], $_POST['long'], $_POST['freguesia'], $_POST['situacao'], $_POST['estado']);

          // Código aqui

  }


  $imoveis=$bd->imoveisGestor($_SESSION['funcionario']->getIdFuncionario());

  //var_dump($imoveis);
?>

<!DOCTYPE html>
<html>

  <head>

    <!-- MetaTags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="../../css/homepage.css" type="text/css">
    <link rel="stylesheet" href="../../css/gestor.css" type="text/css">

    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Ficheiros JavaScript -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/main.js"></script>

    <!-- Título da página -->
    <title>Mais Imobiliária | Gestão de Conteúdos</title>

  </head>

  <body>

    <!-- HEADER DA ÁREA DE GESTÃO DE CONTEÚDOS -->
    <div class="container-header">
      <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="../../index.php"><img id="icon" src="../../images/logo.png" alt="Logótipo da imobiliária"/></a>

    <!-- Título da página -->
    <div class="navbar-nav mx-auto header-gestao">
        <h3>Gestão de conteúdos</h3>
    </div>

    <!-- Botão de logout -->
    <a href="?acao=logout"><button class="logout_gestor">Encerrar sessão</button></a>

  </div>
 </div>

      <div class="user_box">
      </div>
    </div>

    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" id="btnImoveis">Imóveis</button>
      <button class="tablinks" id="btnAdicionarImovel" >Adicionar imóveis</button>
      <button class="tablinks" id="btnAdicionarVisita">Visitas</button>
    </div>
    <div id="imoveis" class="tabcontent">
      <?php foreach ($imoveis as $imovel) {?>
        <div class="management">
          <div class="thumbnail_management">
            <div class="thumb_img_management">
              <a href="../../imovel.php?id=<?php echo $imovel->getIdImovel();?>"><img src="../../imoveis/<?php echo $imovel->getIdImovel();?>/<?php echo $imovel->getNomeImagemPrincipal();?>" class="img_pesquisa_m" alt=""></a>
                        </div>
            <div class="thumbnail_info_management">
              <p><?php echo $imovel->getRua();?></p>
              <p><?php echo $imovel->getIlha();?></p>
              <p><?php echo $imovel->getConcelho();?></p>
              <p><?php echo $imovel->getFreguesia();?></p>
              <p><?php echo $imovel->getTipoImovel();?></p>
            </div>
            <div class="buttons_management">
              <a href="propor.php?id="> <button class="ask_for_feature"type="button" name="button">Propor a destaque</button></a>
              <a href="../../edicao_imovel.php?id="><button class="edit" type="button" name="button">Editar</button></a>
              <a href="../../eliminar_imovel.php?id="><button class="delete" type="button" name="button">Eliminar</button></a>
              <?php $visitas=$bd->getVisitasPendenteImovel($imovel); ?>
              <button class="visits_noti">visitas(<?php if(isset($visitas)){ echo (count($visitas)); }else {echo "0"; } ?>)</button>
              <?php if (isset($visitas)) {
                foreach ($visitas as $value) {
              ?>
              <div class="notifications_box1">
                <div class="notification1">
                  <p><?php echo $value->getFullName(); ?>, quer visitar este imóvel dia <?php echo $value->getData(); ?> às <?php echo $value->getHora(); ?> </p>
                  <div id="visit_aprovation">
                    <button type="button" class="aprove_visit"> <a href="aceitar_visita.php?id=<?php echo $imovel->getIdImovel();?>">v</a></button>
                    <button type="button" class="disaprove_visit"><a href="negar_visita.php?id=<?php echo $imovel->getIdImovel();?>">x</a></button>
                  </div>
                </div>
              </div>
            <?php }} ?>
          </div>
        </div>
    </div>
  <?php } ?>
  </div>

    <!-- - - - - - - - - - - - - - - - - -->
    <!-- FORMULÁRIO DE ADIÇÃO DE IMÓVEIS -->
    <!-- - - - - - - - - - - - - - - - - -->
    <div id="adicionarImovel" class="tabcontent">
        <form class="add_property" action="" method="post" enctype="multipart/form-data" >
          <div class="add_prop_box">


        <!-- Finalidade do imóvel -->
        <div><label>Finalidade</label></div>
          <select  name="finalidade">
            <?php $bd->selectFinalidade() ?>
          </select>
        </div>


        <!-- Gestor do imóvel -->
      <input type="hidden" name="gestor" value="<?php echo $_SESSION['funcionario']->getIdFuncionario(); ?>">

      <!-- Finalidade do imóvel -->
      <div class="add_prop_box">
      <div><label>Finalidade</label></div>
        <select name="finalidade">
          <?php $bd->selectFinalidade() ?>
        </select>
      </div>

      <!-- Tipo do imóvel -->
      <div class="add_prop_box">
      <div><label for="tipoImovel">Tipo de imóvel</label></div>
        <select name="tipoImovel" id="tipoImovel">
          <?php $bd->selectTipoImovel() ?>
        </select>
      </div>

      <!-- Tipologia do imóvel -->
      <div class="add_prop_box">
        <div><label>Tipologia</label></div>
        <select name="tipologia" id="tipologia">
          <?php $bd->selectTipologia() ?>
        </select>
      </div>

      <!-- Área do imóvel -->
      <div class="add_prop_box">
      <div><label for="area">Área do imóvel</label></div>
        <input type="text" name="area" id="area" placeholder="150Km2">
      </div>

      <!-- Preço do imóvel -->
      <div class="add_prop_box">
      <div><label for="preco">Preço do imóvel</label></div>
        <input type="text" name="preco" id="preco" placeholder="5000€">
      </div>

      <!-- Descrição do imóvel -->
      <div class="add_prop_box">
        <div><label>Descrição do imovel</label></div><textarea name="descricao" value="descrição"/></textarea>
      </div>

      <!-- Situação do imóvel -->
      <div class="add_prop_box">
      <div><label for="situacao">Situação atual do imóvel</label></div>
      <select  name="situacao" id="situacao">
          <option value="">Selecione um estado</option>
          <option value="ativo">Ativo</option>
          <option value="concluido">Concluído</option>
      </select>
      </div>

      <!-- Estado do imóvel -->
      <div class="add_prop_box">
      <div><label for="estado">Estado do imóvel</label></div>
      <select  name="estado" id="estado">
          <option value="">Selecione um estado</option>
          <option value="obras">Em obras</option>
          <option value="pronto">Pronto a habitar</option>
      </select>
      </div>

      <!-- Ilha do imóvel -->
      <div class="add_prop_box">
      <div><label>Ilha</label></div>
        <select name="ilha" id="ilha" >
          <?php $bd->selectIlha(); ?>
        </select>
      </div>

      <!-- Concelho do imóvel -->
      <div class="add_prop_box">
        <div><label>Concelho</label></div>
          <select  name="concelho" id="concelho" >
            <option value="">Selecione um concelho</option>
          </select>
        </div>

      <!-- Freguesia do imóvel -->
      <div class="add_prop_box">
        <div><label>Freguesia</label></div>
          <select  name="freguesia" id="freguesia">
            <option value="">Selecione uma freguesia</option>
          </select>
        </div>

      <!-- Morada do imóvel -->
      <div class="add_prop_box">
        <div><label for="morada">Morada</label></div><input type="text" name="morada" value="morada"/>
      </div>

      <!-- Código postal do imóvel -->
      <div class="add_prop_box">
        <div><label>Código postal</label></div><input type="text" name="codPostal" placeholder="9500-503"/>
      </div>

      <!-- Opção para destaque na homepage -->
      <div class="add_prop_box">
          <div><label>Destaque na homepage</label></div><input type="checkbox" name="featured" value="featured"/>
        </div>

      <!-- Imagem(s) do imóvel -->
      <div class="add_prop_box">
        <div><label>Imagem(s)</label></div><br><input type="file" name="img[]" accept="image/*" multiple>
      </div>

      <!-- Latitude e longitude do imóvel -->
      <div class="add_prop_box">
        <input type="hidden" name="lat" value="">
        <input type="hidden" name="long" value="">
      </div>

      <!-- Mapa-->
      <div class="map" style="height:500px;"></div>

      <div class="add_prop_box">
          <input type="submit" name="add_imovel" value="Adicionar imóvel"/>
      </div>

    </form>

    </div>
    <!-- - - - - - - - - - - - - - - - - - - -  -->
    <!-- FIM DO FORMULÁRIO DE ADIÇÃO DE IMÓVEIS -->
    <!-- - - - - - - - - - - - - - - - - - - -  -->

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
