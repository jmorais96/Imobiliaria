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

 if (isset($_GET['id'])) {
   $imovel=$bd->getImovel($_GET['id']);
 }



  // Criar a ligação à base de dados


if(isset($_POST['edit_imovel'])) {

 if($_POST['finalidade']==""){

   $_POST['finalidade']=$bd->query("select * from finalidade WHERE finalidade= :finalidade", array('finalidade' => $imovel->getFinalidade()));
   $_POST['finalidade']=$_POST['finalidade'][0]['idFinalidade'];
 }
 if($_POST['tipoImovel']==""){

   $_POST['tipoImovel']=$bd->query("select * from tipo_imovel WHERE tipoImovel= :tipoImovel", array('tipoImovel' => $imovel->getTipoImovel()));
   $_POST['tipoImovel']=$_POST['tipoImovel'][0]['idTipoImovel'];

 }
 if($_POST['area']=="")$_POST['area']=$imovel->getArea();
 if($_POST['preco']=="")$_POST['preco']=$imovel->getPreco();
 if($_POST['descricao']=="")$_POST['descricao']=$imovel->getDescricao();
 if($_POST['rua']=="")$_POST['rua']=$imovel->getRua();
 if($_POST['codPostal']=="")$_POST['codPostal']=$imovel->getCodPostal();
 if($_POST['lat']=="")$_POST['lat']=$imovel->getLat();
 if($_POST['lng']=="")$_POST['lng']=$imovel->getLng();
 //if($_POST['idFreguesia']=="")$_POST['idFreguesia']=$imovel->getIdFreguesia();
 if($_POST['situacao']=="")$_POST['situacao']=$imovel->getSituacao();
 if($_POST['estado']=="")$_POST['estado']=$imovel->getEstado();
 if($_POST['tipologia']=="")$_POST['tipologia']=$imovel->getTipologia();
 if($_POST['quartos']=="")$_POST['quartos']=$imovel->getQuartos();
 if($_POST['casasBanho']=="")$_POST['casasBanho']=$imovel->getCasasBanho();

//se nada for escrito mantem o valor senao escreve 1 para sim e 0 para nao
if (isset($_POST['garagem'])) {
  if($_POST['garagem']==""){
    if ($imovel->getGaragem() =="Sim") {
      $_POST['garagem']=1;
    } else {
      $_POST['garagem']=0;
    }
  } else {
    if($_POST['garagem']=="Sim") {
      $_POST['garagem']=1;
    } else {
      $_POST['garagem']=0;
    }
  }
}else {
  $_POST['garagem']=0;
}

if (isset($_POST['piscina'])) {
  if($_POST['piscina']==""){
       if ($imovel->getPiscina() =="Sim") {
          $_POST['piscina']=1;
       } else {
            $_POST['piscina']=0;
       }
   } else {
       if($_POST['piscina']=="Sim") {
            $_POST['piscina']=1;
       } else {
            $_POST['piscina']=0;
       }
   }
}else {
  $_POST['piscina']=0;
}

if (isset($_POST['mobilia'])) {
  if($_POST['mobilia']==""){
      if ($imovel->getMobilia() =="Sim") {
              $_POST['mobilia']=1;
           } else {
                $_POST['mobilia']=0;
       }
  } else {
       if($_POST['mobilia']=="Sim") {
            $_POST['mobilia']=1;
       } else {
            $_POST['mobilia']=0;
       }
   }
 }else {
   $_POST['mobilia']=0;
 }

if($_POST['dataConstrucao']!=="")$_POST['dataConstrucao']=$imovel->getDataConstrucao();
 if($_POST['informacao']=="")$_POST['informacao']=$imovel->getInformacao();

 //var_dump($_POST);
 $bd->editarImovel($imovel, $_POST['finalidade'], $_POST['tipoImovel'], $_POST['area'], $_POST['preco'], $_POST['descricao'], $_POST['rua'], $_POST['codPostal'], $_POST['lat'], $_POST['lng'], /*$_POST['idFreguesia'],*/ $_POST['situacao'], $_POST['estado'], $_POST['tipologia'], $_POST['quartos'], $_POST['casasBanho'], $_POST['garagem'], $_POST['piscina'], $_POST['mobilia'], $_POST['dataConstrucao'], $_POST['informacao'], $_POST['idImovel']);

 header("location:manager.php");

}

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
    <link rel="stylesheet" href="../../css/homepageManager.css" type="text/css">
    <link rel="stylesheet" href="../../css/gestor.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/gerirImovelTable.css">
    <link rel="stylesheet" type="text/css" href="../../css/imovel.css">

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



  <!-- HEADER/NAVBAR -->
  <div class="container-header ">
  <nav class="navbar navbar-expand-lg navbar-light ">

  <!-- Logótipo da página -->
  <a class="navbar-brand" href="manager.php"><img id="icon" class="logo" src="../../images/logo.png"/></a>

    <!-- Toogler que aparecerá nos menores ecrãs -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

  <!-- Link de navegação "Encerrar sessão" -->
  <a class="nav-link" href="?acao=logout">ENCERRAR SESSÃO</a>

</nav>
 </div>
<!-- FINAL DO HEADER/NAVBAR  -->



<!-- FINAL DO HEADER/NAVBAR  -->

<div class="container_admin">
 <div class="nav_holder">
    </div>
    <div class="backend_admin">
        <h1>Gestão de Conteúdos</h1>
    </div>
    <div class="res_admin">
         <?php //se o login for feito com sucesso
            if(isset($_SESSION['funcionario'])){
                echo '<h4>Login efetuado com sucesso. Bem-vindo '.$_SESSION['funcionario']->getFullName().'!</h4>';
            }
            //caso contrario reencaminha de volta ao index.php
            else{
                header('location:index.php');
            }
        ?>

    </div>



      <div class="user_box">
      </div>


<div class="admin_container">
    <div class="tab">
      <a href="manager.php" class="tablinks retroceder"><i class="fas fa-chevron-left"></i> RETROCEDER</a>
    </div>


    <div id="imoveis" class="tabcontent">

    <!-- AO CLICAR NO BOTAO EDITAR IMOVEL -->
    <div id="<?php echo $imovel->getIdImovel(); ?>" class="tabcontent">
      <div class="admin_container">

        <!-- Título do formulário de edição de imóveis -->
        <h2 class="editar-titulo">Editar Imóvel <i class="far fa-edit fa-1x"></i></h2>

        <!-- - - - - - - - - - - - - - - - - -->
        <!-- FORMULÁRIO DE EDIÇÃO DE IMÓVEIS -->
        <!-- - - - - - - - - - - - - - - - - -->
        <form action="" method="post">

          <div class="row first_info">

          <!-- Finalidade do imóvel -->
          <div class="add_prop_box">
            <label>Finalidade:</label>
            <i class="fas fa-piggy-bank fa-2x" style="color: #808080"></i><select name="finalidade">
              <?php  $bd->selectFinalidade(); ?>
            </select>
          </div>

          <!-- Tipo do imóvel -->
          <div class="add_prop_box">
            <label>Tipo de imóvel:</label>
            <i class="fas fa-home fa-2x" style="color: #808080"></i><select name="tipoImovel">
            <?php  $bd->selectTipoImovel(); ?>
          </select>
          </div>

          <!-- Tipologia do imóvel -->
          <div class="add_prop_box">
          <label>Tipologia:</label>
          <i class="fas fa-building fa-2x" style="color: #808080"></i><select name="tipologia">
            <?php  $bd->selectTipologia() ?>
          </select>
          </div>

        </div>

        <div class="row second_info">

          <!-- Número de quartos do imóvel -->
          <div class="add_prop_box">
            <label>Número de Quartos</label>
            <i class="fas fa-bed fa-2x" style="color: #808080"></i><input type="text" name="quartos" value="<?php echo $imovel->getQuartos();?>" class="extras_number" />
          </div>

          <!-- Numero de casas de banho do imóvel -->
          <div class="add_prop_box">
            <label>Número de casas de Banho</label>
            <i class="fas fa-bath fa-2x" style="color: #808080"></i><input type="text" name="casasBanho" value="<?php echo $imovel->getCasasBanho();?>" class="extras_number"/>
          </div>

        </div>

        <div class="row third_info">

          <!-- Garagem -->
          <div class="add_prop_box add_prop_box_divisoes">
            <label>Garagem</label>
            <div class="row"><i class="fas fa-warehouse fa-2x" style="color: #808080"></i>
            <input type="checkbox" name="garagem" value="garagem" <?php if ($imovel->getGaragem()=="Sim") {echo "checked";} ?>></div>
          </div>

          <!-- Piscina -->
          <div class="add_prop_box add_prop_box_divisoes">
            <label>Piscina</label>
            <div class="row">
            <div class="info-piscina">
            <img src="../../images/piscina-icon-manager.png" alt="Ícone da piscina"></div><input type="checkbox" name="piscina" value="piscina"<?php if ($imovel->getPiscina()=="Sim") {echo "checked";} ?>></div>
          </div>

          <!-- Mobília -->
          <div class="add_prop_box add_prop_box_divisoes">
            <label>Mobilada</label>
            <div class="row"><i class="fas fa-box fa-2x" style="color: #808080"></i>
            <input type="checkbox" name="mobilia" value="mobilia"<?php if ($imovel->getMobilia()=="Sim") {echo "checked";} ?>></div>
          </div>

        </div>

        <!-- Informação sobre do imóvel -->
        <div class="add_prop_box2">
          <label>Informações sobre o imóvel</label>
          <textarea name="informacao"/><?php echo $imovel->getInformacao(); ?></textarea>
        </div>

        <div class="row forth_info">

        <!-- Data de construção do imóvel -->
        <div class="add_prop_box">
          <label>Data de construção</label>
          <div class="row">
            <div class="info-dataconstrucao">
            <img src="../../images/icons/construcao-icon-manager.png" alt="Ícone da data de construção do imóvel">
          </div>
          <input type="date" name="dataConstrucao" value="<?php echo $imovel->getDataConstrucao();?>" /></div>
        </div>

        <!-- Área do imóvel -->
        <div class="add_prop_box">
        <label for="area">Área do imóvel</label>
         <div class="row"><i class="fas fa-chart-area fa-2x" style="color: #808080"></i>
          <input type="text" name="area" id="area" value="<?php echo $imovel->getArea();?>" /></div>
        </div>

        <!-- Preço do imóvel -->
        <div class="add_prop_box">
        <label for="preco">Preço do imóvel</label>
          <div class="row"><i class="fas fa-money-bill-wave fa-2x" style="color: #808080"></i>
          <input type="text" name="preco" id="preco" value="<?php echo $imovel->getPreco();?>"/></div>
        </div>

      </div>

          <!-- Descrição do imóvel -->
          <div class="add_prop_box2">
          <label>Descricao:</label>
          <textarea name="descricao" value="descrição" rows="10"/><?php echo $imovel->getDescricao(); ?></textarea>

          <!-- Estado do imóvel -->
          <div class="add_prop_box2">
            <label for="estado">Estado do imóvel</label>
            <div class="row"><i class="fas fa-truck-loading fa-2x" style="color: #808080"></i>
            <select name="estado" id="estado">
                <option value="<?php echo $imovel->getEstado();?>"><?php echo $imovel->getEstado();?></option>
                <option value="Pronto a habitar">Pronto a habitar</option>
                <option value="Em obras">Em obras</option>
            </select></div>
          </div>

          <div class="row fifth_info_location">

        <!-- Ilha do imóvel -->
        <div class="add_prop_box">
        <label>Ilha</label>
        <div class="add_prop_location">
          <i class="fas fa-map fa-2x" style="color: #808080"></i>
          <select name="ilha" id="ilha">
            <option value="value="<?php echo $imovel->getIlha(); ?>><?php echo $imovel->getIlha();?></option>
            <?php $bd->selectIlha(); ?>
          </select></div>
        </div>

        <!-- Concelho do imóvel -->
        <div class="add_prop_box">
          <label>Concelho</label>
          <div class="add_prop_location">
            <i class="fas fa-compass fa-2x" style="color: #808080"></i><select name="concelho" id="concelho">
              <option value="<?php echo $imovel->getIlha();?>"><?php echo $imovel->getConcelho();?></option>
            </select></div>
          </div>

        <!-- Freguesia do imóvel -->
        <div class="add_prop_box">
          <label>Freguesia</label>
          <div class="add_prop_location">
            <i class="fas fa-location-arrow fa-2x" style="color: #808080"></i><select name="freguesia" id="freguesia">
              <option value="<?php echo $imovel->getFreguesia();?>"><?php echo $imovel->getFreguesia();?></option>
            </select></div>
          </div>

      </div>

      <div class="row sixth_info">

        <!-- Morada do imóvel -->
        <div class="add_prop_box">
          <label for="morada">Morada</label>
          <i class="fas fa-road fa-2x" style="color: #808080"></i>
          <input type="text" name="rua" id="morada_add" value="<?php echo $imovel->getRua(); ?>"/>
        </div>

        <!-- Código postal do imóvel -->
        <div class="add_prop_box">
          <label>Código postal</label>
          <div class="row">
            <div class="info-dataconstrucao">
            <img src="../../images/icons/codpostal-icon-manager.png" alt="Ícone do código postal do imóvel">
          </div>
          <input type="text" name="codPostal" id="codpostal_add" value="<?php echo $imovel->getCodPostal();?>"/></div>
        </div>

      </div>

      <!-- Situação do imóvel -->
      <div class="add_prop_box">
          <label for="situacao">Situação do imóvel</label>
          <i class="far fa-question-circle fa-2x" style="color: #808080"></i>
          <input type="text" name="situacao" value="<?php echo $imovel->getSituacao();?>"/>
      </div>

      <!-- Imagem(s) do imóvel -->
      <div class="add_prop_box">
        <div class="row">
        <i class="far fa-images fa-2x" style="color: #808080"></i><label>Imagem(s)</label>
        <br></div>
        <input type="file" name="img[]" multiple="multiple">
      </div>

      <!-- Id do imóvel como campo "hidden" -->
      <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">

          <!-- Para latitude e longitude do imóvel -->
          <div class="map"style="height:500px; weight:500px;"></div>
          <input type="hidden" name="lat" value="">
          <input type="hidden" name="lng" value="">

          <div class="add_prop_box add_prop_button">
            <input type="submit" name="edit_imovel" value="Editar Imóvel">
          </div>

        </form>
      </div>
    </div>

  </div>
    <!-- - - - - - - - - - - - - - - - - - - -  -->
    <!-- FIM DO FORMULÁRIO DE EDIÇÃO DE IMÓVEIS -->
    <!-- - - - - - - - - - - - - - - - - - - -  -->

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

      // Script para notificação de visitas
      $(document).on("click", ".visits_noti", function(event){
          event.preventDefault();
          $(this).next('.notifications_box1').toggle();
      });

      // Script para a localização do utilizador, dando concelhos e freguesias como opções a partir da ilha
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

      // Scripts para mudança de "tabs" na área de gestão
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

      // Script para a marcação da latitude e longitude
      var markerImovel="";
      var position=""
      function latLng(lat, lng){
          markerImovel = new google.maps.Marker({
          position: { lat: lat, lng: lng }
        });

        $("[name=lat]").val(lat);
        $("[name=lng]").val(lng);
      markerImovel.setMap(map);
      }

      // Acesso à latitude e longitude do imóvel
      <?php $imovel->latLng(); ?>

      // Script para o marcador do mapa
      google.maps.event.addListener(map, 'click', function(event) {
        if (markerImovel == "") {
          placeMarker(event.latLng);
        }else {
          markerImovel.setMap(null);
          markerImovel="";
          placeMarker(event.latLng);
        }
      });

      function placeMarker(location) {
          markerImovel = new google.maps.Marker({
          position: location,
          map: map
        });
        //console.log(location.toString());
        let coordenadas=location.toString().replace("(", "").replace(")", "").split(' ').join('').split(",");
        //console.log(coordenadas);
        $("[name=lat]").val(coordenadas[0]);
        $("[name=lng]").val(coordenadas[1]);
      }



    </script>
    </div>
  </body>
</html>
