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

if($_POST['dataConstrucao']!=="")$_POST['dataConstrucao']=$imovel->getDataConstrucao();
 if($_POST['informacao']=="")$_POST['informacao']=$imovel->getInformacao();


 $bd->editarImovel($_POST['finalidade'], $_POST['tipoImovel'], $_POST['area'], $_POST['preco'], $_POST['descricao'], $_POST['rua'], $_POST['codPostal'], $_POST['lat'], $_POST['lng'], /*$_POST['idFreguesia'],*/ $_POST['situacao'], $_POST['estado'], $_POST['tipologia'], $_POST['quartos'], $_POST['casasBanho'], $_POST['garagem'], $_POST['piscina'], $_POST['mobilia'], $_POST['dataConstrucao'], $_POST['informacao'], $_POST['idImovel']);

 //header("location:manager.php");

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
  <a class="nav-link" href="?acao=logout">Encerrar sessão</a>

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
                echo '<h4>Login efetuado com sucesso. Bem-vindo '.$_SESSION['funcionario']->getFullName().'</h4>';
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
      <a href="manager.php" class="tablinks">< Retroceder</a>
    </div>


    <div id="imoveis" class="tabcontent">

     <div class="titulo">
         <h2>Lista de Imóveis</h2>
         <div class="wrap">
           <div class="search">
              <input type="text" class="searchTerm" placeholder="Pesquise aqui">
              <!--<button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
             </button>-->
           </div>
        </div>
     </div>

    <!-- AO CLICAR NO BOTAO EDITAR IMOVEL -->
  <div id="<?php echo $imovel->getIdImovel(); ?>" class="tabcontent">
      <div class="admin_container">
        <!-- Form para criar gestor -->
        <div class="boxh2">
            <h2>Editar imóvel</h2>
        </div>
        <form class="add_manager" action="" method="post">
          <label>Finalidade: <select class="" name="finalidade">
            <?php  $bd->selectFinalidade(); ?>
          </select> </label>
          <label>Descricao:<input type="text" name="descricao" value="<?php echo $imovel->getDescricao(); ?>" placeholder=""/></label>
          <label>Rua:<input type="text" name="rua" value="<?php echo $imovel->getRua(); ?>" placeholder=""/></label>
          <label>Código-postal:<input type="text" name="codigo" value="<?php echo $imovel->getCodPostal();?>" placeholder=""/></label>
          <label>Área:<input type="text" name="area" value="<?php echo $imovel->getArea();?>" placeholder=""/></label>
          <label>Preço:<input type="text" name="preco" value="<?php echo $imovel->getPreco();?>" placeholder=""/></label>
          <label>Situação:<input type="text" name="situacao" value="<?php echo $imovel->getSituacao();?>" placeholder=""/></label>
          <label>Estado:<input type="text" name="estado" value="<?php echo $imovel->getEstado();?>" placeholder=""/></label>
          <input type="hidden" name="idImovel" value="<?php echo $imovel->getIdImovel(); ?>">
          <label>Tipo Imovel:<select class="" name="tipoImovel">
            <?php  $bd->selectTipoImovel(); ?>
          </select></label>
          <label>Codigo Postal:<input type="text" name="codPostal" value="<?php echo $imovel->getCodPostal();?>" placeholder=""/></label>
          <label>Tipologia:<select class="" name="tipologia">
            <?php  $bd->selectTipologia() ?>
          </select></label>
          <label>Numero de Quartos:<input type="text" name="quartos" value="<?php echo $imovel->getQuartos();?>" placeholder=""/></label>
          <label>Numero de casas de banho:<input type="text" name="casasBanho" value="<?php echo $imovel->getCasasBanho();?>" placeholder=""/></label>
          <label>Garagem:<input type="checkbox" name="garagem" value="garagem" <?php if ($imovel->getGaragem()=="Sim") {echo "checked";} ?>></label>
          <label>Piscina:<input type="checkbox" name="piscina" value="piscina"<?php if ($imovel->getPiscina()=="Sim") {echo "checked";} ?>></label>
          <label>Mobilada:<input type="checkbox" name="mobilia" value="mobilia"<?php if ($imovel->getMobilia()=="Sim") {echo "checked";} ?>></label>
          <label>Data de Construcao:<input type="text" name="dataConstrucao" value="<?php echo $imovel->getDataConstrucao();?>" placeholder=""/></label>
          <label>Informações:<input type="text" name="informacao" value="<?php echo $imovel->getInformacao();?>" placeholder=""/></label>


          <!-- PARA LATITUDE E LONGITUDE DO IMOVEL -->
          <div class="map"style="height:500px; weight:500px;"></div>
          <input type="hidden" name="lat" value="">
          <input type="hidden" name="lng" value="">


          <input type="submit" name="edit_imovel" value="editar">

        </form>
      </div>
    </div>

  <!-- FIM DO BOTAO EDITAR IMOVEL -->


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


      var  markerImovel="";
      var position=""
      function latLng(lat, lng){
          markerImovel = new google.maps.Marker({
          position: { lat: lat, lng: lng }
        });

        $("[name=lat]").val(lat);
        $("[name=lng]").val(lng);
      markerImovel.setMap(map);
      }

      <?php $imovel->latLng(); ?>



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
