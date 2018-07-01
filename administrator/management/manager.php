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

  require_once('../../assets/logout_manager.php');

  // Reencaminhar o utilizar para o índex caso este não seja um funcionário
  if (!isset($_SESSION['funcionario'])) {
    header("location:../index.php");
  }

  // Criar a ligação à base de dados
  $bd = new imobiliaria("../../data/config.ini");

 if(isset($_POST['add_imovel'])) {
   //var_dump($_POST);
   //var_dump($_FILES);

   $bd->adicionarImovel($_POST, $_FILES);

  }

  $imoveis=$bd->imoveisGestor($_SESSION['funcionario']->getIdFuncionario());

  //var_dump($imoveis);

if(isset($_POST['accept'])) {

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
    <script src="../../js/admin_container.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/main.js"></script>

    <!-- Título da página -->
    <title>Mais Imobiliária | Gestão de Conteúdos</title>

  </head>

  <body>

  <!-- HEADER/NAVBAR -->
  <div class="container-header">
  <nav class="navbar navbar-expand-lg navbar-light">

  <!-- Logótipo da página -->
  <a class="navbar-brand" href="manager.php"><img id="icon" class="logo" src="../../images/logo.png"/></a>

  <!-- Link de navegação "Encerrar sessão" -->
  <a class="nav-link" href="?acao=logout">ENCERRAR SESSÃO</a>

</nav>
</div>
<!-- FINAL DO HEADER/NAVBAR  -->

<div class="container_admin">
 <div class="nav_holder">
    </div>
    <div class="backend_admin">
        <h1>Gestão de Conteúdos</h1>
    </div>
    <div class="res_admin">
         <?php //se o login for efetuado com sucesso
            if(isset($_SESSION['funcionario'])){
                echo '<h4>Login efetuado com sucesso. Bem-vindo '.$_SESSION['funcionario']->getFullName().'!</h4>';
            }
            //caso contrário reencaminha de volta ao index.php
            else{
                header('location:index.php');
            }
        ?>

    </div>

      <div class="user_box">
      </div>


    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" id="btnImoveis" onclick="openCity(event, 'imoveis')">IMÓVEIS</button>
      <button class="tablinks" id="btnAdicionarImovel" onclick="openCity(event, 'adicionarImovel')">ADICIONAR IMÓVEIS</button>
      <button class="tablinks" id="btnAdicionarVisita" onclick="openCity(event, 'visita')">VISITAS</button>
    </div>


    <div id="imoveis" class="tabcontent">

     <div class="titulo">
         <h2>Lista de Imóveis</h2>
         <div class="wrap">
           <div class="search">
              <i class="fas fa-search fa-1x"></i><input type="text" id="filter" class="searchTerm" placeholder="Pesquise aqui...">
              <!--<button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
             </button>-->
           </div>
        </div>
     </div>

      <?php if (isset($imoveis)) {
         foreach ($imoveis as $imovel) {?>
        <div class="management">

          <div class="t_workers">
                 <h5><?php echo $imovel->getTipoImovel();?> | <?php echo $imovel->getRua();?> | <?php echo $imovel->getPreco();?> €</h5>
              </div>
          <div class="thumbnail_management">

            <div class="thumb_img_management">
              <a href="../../imovel.php?id=<?php echo $imovel->getIdImovel();?>">
                  <figure>
                      <img src="../../imoveis/<?php echo $imovel->getIdImovel();?>/<?php echo $imovel->getNomeImagemPrincipal();?>" class="img_pesquisa_m" alt="">
                  </figure>
              </a>
            </div>
              <div class="Titulos_Imoveis">
                  <b>Rua:</b>
                  <b>Ilha:</b>
                  <b>Concelho:</b>
                  <b>Freguesia:</b>
                  <b>Tipo:</b>
              </div>
              <div class="Resultados_Imoveis">
                  <p><?php echo $imovel->getRua();?></p>
                  <p><?php echo $imovel->getIlha();?></p>
                  <p><?php echo $imovel->getConcelho();?></p>
                  <p><?php echo $imovel->getFreguesia();?></p>
                  <p><?php echo $imovel->getTipoImovel();?></p>
             </div>

            <div class="buttons_management">
              <?php if ($imovel->getSituacao()=="Ativo") { ?>
                <a href="comprar.php?id=<?php echo $imovel->getIdImovel();?>"><button class="delete" type="button" name="button">Marcar como comprado</button></a>
              <?php }else { ?>
                <a href="n_comprar.php?id=<?php echo $imovel->getIdImovel();?>"><button class="delete" type="button" name="button">Voltar a ativar o imovel</button></a>
              <?php } ?>

              <?php if ($imovel->getDestaque()==NULL) { ?>
                <a href="propor.php?id=<?php echo $imovel->getIdImovel();?>"> <button class="ask_for_feature"type="button" name="button">Propor a destaque</button></a>
              <?php } ?>

             <a href="edicao_imovel.php?id=<?php echo $imovel->getIdImovel();?>"><button class="edit" type="button" name="button">Editar</button></a>
             <!--  <td><button class="edit" onclick="openCity(event, '<?php //echo $imovel->getIdImovel(); ?>')" >Editar</button></td>  -->

              <a href="eliminar_imovel.php?id=<?php echo $imovel->getIdImovel();?>"><button class="delete" type="button" name="button">Eliminar</button></a>

              <?php $visitas=$bd->getVisitasPendenteImovel($imovel); ?>
              <button class="visits_noti">Visitas(<?php if(isset($visitas)){ echo (count($visitas)); }else {echo "0"; } ?>)</button>

              <?php if (isset($visitas)) {
                foreach ($visitas as $value) {
              ?>
              <div class="notifications_box1">
                <div class="notification1">
                  <p><b><?php echo $value->getFullName(); ?></b> pretende visitar este imóvel dia <b><?php echo $value->getData(); ?></b> às <b><?php echo $value->getHora(); ?></b>. <br> <h2>Aceitar?</h2></p>
                  <div id="visit_aprovation">
                    <button type="button" class="aprove_visit"> <a href="aceitar_visita.php?id=<?php echo $value->getIdVisita();?>">
                    <!--icon aceitar-->
                    <img id="icon" src="../../images/icon_accept.png"/>
                    </a></button>
                    <button type="button" class="disaprove_visit"><a href="negar_visita.php?id=<?php echo $value->getIdVisita();?>">
                    <!--icon recusar-->
                    <img id="icon" src="../../images/icon_refuse.png"/>
                    </a></button>
                  </div>
                </div>
              </div>
            <?php }} ?>
          </div>
        </div>
    </div>
  <?php }} ?>
  </div>

    <!-- AO CLICAR EM EDITAR IMOVEL A PÁGINA MUDA PARA EDICAO_IMOVEL.PHP -->

    <!-- - - - - - - - - - - - - - - - - -->
    <!-- FORMULÁRIO DE ADIÇÃO DE IMÓVEIS -->
    <!-- - - - - - - - - - - - - - - - - -->

    <div id="adicionarImovel" class="tabcontent">
        <form class="add_property" action="" method="post" enctype="multipart/form-data" >

      <!-- Gestor do imóvel -->
      <input type="hidden" name="gestor" value="<?php echo $_SESSION['funcionario']->getIdFuncionario(); ?>">

      <!-- Título do formulário de adição do imóvel -->
      <h2>Novo Imóvel <i class="fas fa-plus-square fa-1x" style="color: #fff"></i></h2>

      <div class="row first_info">

        <!-- Finalidade do imóvel -->
        <div class="add_prop_box">
        <label>Finalidade</label>
          <i class="fas fa-piggy-bank fa-2x" style="color: #808080"></i><select name="finalidade">
            <?php $bd->selectFinalidade() ?>
          </select>
        </div>

        <!-- Tipo do imóvel -->
        <div class="add_prop_box">
        <div><label for="tipoImovel">Tipo de imóvel</label></div>
          <i class="fas fa-home fa-2x" style="color: #808080"></i><select name="tipoImovel" id="tipoImovel">
            <?php $bd->selectTipoImovel() ?>
          </select>
        </div>

     
     </div> 
     
     
      <div id="extras">

        <!-- Tipologia do imóvel -->
        <div class="add_prop_box">
          <div><label>Tipologia</label></div>
          <select name="tipologia" id="tipologia">
            <?php $bd->selectTipologia() ?>
          </select>
        </div>

        <!-- Numero de quartos do imóvel -->
        <div class="add_prop_box">
          <div><label>Numero de Quartos</label></div>
          <input type="number" name="quartos" value="">
        </div>

        <!-- Numero de casas de Banho do imóvel -->
        <div class="add_prop_box">
          <div><label>Numero de casas de Banho</label></div>
          <input type="number" name="casasBanho" value="">
        </div>

        <!-- Garagem  -->
        <div class="add_prop_box">
          <div><label>Garagem</label></div>
          <input type="checkbox" name="garagem" value="garagem">
        </div>

        <!-- Piscina  -->
        <div class="add_prop_box">
          <div><label>Piscina</label></div>
          <input type="checkbox" name="piscina" value="piscina">
        </div>

        <!-- Mobilia  -->
        <div class="add_prop_box">
          <div><label>Mobilada</label></div>
          <input type="checkbox" name="mobilia" value="mobilia">
        </div>

        <!-- Data de Construção do Imovel  -->
        <div class="add_prop_box">
          <div><label>Data de Construção</label></div>
          <input type="date" name="dataConstrucao" value="">
        </div>

        <!-- Informação sobre do imóvel -->
        <div class="add_prop_box">
          <div><label>Informação do imovel</label></div><textarea name="informacao"/></textarea>
        </div>

      </div>
     
     
     



       

      

      <div class="row forth_info">

        <!-- Data de construção do imóvel -->
        <div class="add_prop_box">
          <label>Data de construção</label>
          <div class="row">
            <div class="info-dataconstrucao">
            <img src="../../images/icons/construcao-icon-manager.png" alt="Ícone da data de construção do imóvel">
          </div>
          <input type="date" name="dataConstrucao" value=""></div>
        </div>

        <!-- Área do imóvel -->
        <div class="add_prop_box">
        <label for="area">Área do imóvel</label>
         <div class="row"><i class="fas fa-chart-area fa-2x" style="color: #808080"></i>
          <input type="text" name="area" id="area" placeholder="150Km2"></div>
        </div>

        <!-- Preço do imóvel -->
        <div class="add_prop_box">
        <label for="preco">Preço do imóvel</label>
          <div class="row"><i class="fas fa-money-bill-wave fa-2x" style="color: #808080"></i>
          <input type="text" name="preco" id="preco" placeholder="5000000€"></div>
        </div>

      </div>

      <!-- Descrição do imóvel -->
      <div class="add_prop_box2">
        <label>Descrição do imovel</label>
        <textarea name="descricao" value="descrição" rows="10"/></textarea>
      </div>

      <!-- Estado do imóvel -->
      <div class="add_prop_box">
      <label for="estado">Estado do imóvel</label>
      <div class="row"><i class="fas fa-truck-loading fa-2x" style="color: #808080"></i>
      <select name="estado" id="estado">
          <option value="">Selecione um estado</option>
          <option value="Em obras">Em obras</option>
          <option value="Pronto a habitar">Pronto a habitar</option>
      </select></div>
      </div>

      <div class="row fifth_info_location">

        <!-- Ilha do imóvel -->
        <div class="add_prop_box">
        <label>Ilha</label>
        <div class="add_prop_location">
          <i class="fas fa-map fa-2x" style="color: #808080"></i><select name="ilha" id="ilha" >
            <?php $bd->selectIlha(); ?>
          </select></div>
        </div>

        <!-- Concelho do imóvel -->
        <div class="add_prop_box">
          <label>Concelho</label>
          <div class="add_prop_location">
            <i class="fas fa-compass fa-2x" style="color: #808080"></i><select name="concelho" id="concelho">
              <option value="">Selecione um concelho</option>
            </select></div>
          </div>

        <!-- Freguesia do imóvel -->
        <div class="add_prop_box">
          <label>Freguesia</label>
          <div class="add_prop_location">
            <i class="fas fa-location-arrow fa-2x" style="color: #808080"></i><select name="freguesia" id="freguesia">
              <option value="">Selecione uma freguesia</option>
            </select></div>
          </div>

      </div>

      <div class="row sixth_info">

        <!-- Morada do imóvel -->
        <div class="add_prop_box">
          <label for="morada">Morada</label>
          <i class="fas fa-road fa-2x" style="color: #808080"></i>
          <input type="text" name="morada" id="morada_add" placeholder="Introduza aqui a morada do imóvel..."/>
        </div>

        <!-- Código postal do imóvel -->
        <div class="add_prop_box">
          <label>Código postal</label>
          <div class="row">
            <div class="info-dataconstrucao">
            <img src="../../images/icons/codpostal-icon-manager.png" alt="Ícone do código postal do imóvel">
          </div>
          <input type="text" name="codPostal" placeholder="9500-503" id="codpostal_add"/></div>
        </div>

      </div>

      <!-- Opção para colocar em destaque na homepage -->
      <div class="add_prop_box add_prop_destaque">
        <div class="row">
          <i class="fas fa-star fa-2x" style="color: #808080"></i><label>Destaque na homepage</label>
          <input type="checkbox" name="featured" value="featured"/></div>
        </div>

      <!-- Imagem(s) do imóvel -->
      <div class="add_prop_box">
        <div class="row">
        <i class="far fa-images fa-2x" style="color: #808080"></i><label>Imagem(s)</label>
        <br></div>
        <input type="file" name="img[]" multiple="multiple">
      </div>

      <!-- Latitude e longitude do imóvel -->
      <div class="add_prop_box">
        <input type="hidden" name="lat" value="">
        <input type="hidden" name="lng" value="">
      </div>

      <!-- Mapa-->
      <div class="map" style="height:500px;"></div>

      <div class="add_prop_box add_prop_button">
          <input type="submit" name="add_imovel" value="Adicionar imóvel"/>
      </div>

    </form>

    </div>
    <!-- - - - - - - - - - - - - - - - - - - -  -->
    <!-- FIM DO FORMULÁRIO DE ADIÇÃO DE IMÓVEIS -->
    <!-- - - - - - - - - - - - - - - - - - - -  -->

    <div id="visita" class="tabcontent">
     <div class="admin_container">

    <!-- LISTA VISITAS MARCADAS -->
    <h2>Lista de Visitas Aceites</h2>
     <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Nome do Cliente</th>
              <th>Contacto</th>
              <th>Imovel</th>
              <th>Data</th>
              <th>Hora</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
          <?php

            foreach ($bd->getVisitasAceites($_SESSION['funcionario']) as $value) {
          ?>

            <tr>
              <td> <?php echo $value->getFullName() ?> </td>
              <td> <?php echo $value->getContactCliente() ?> </td>
              <td> <?php echo $value->getRua() ?></td>
              <td> <?php echo $value->getData() ?> </td>
              <td> <?php echo $value->getHora() ?> </td>
              <td> <?php echo $value->getEstado() ?> </td>
            <tr>
         <?php
          }
         ?>
          </tbody>

      </table>
    </div>
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

      // Script para notificação de visitas
      $(document).on("click", ".visits_noti", function(event){
          event.preventDefault();
          $(this).next('.notifications_box1').toggle();
      });

      // Script para alteração dos extras consoante o tipo de imóvel
      $("#tipoImovel").change(function(){
          let tipoImovel = $("#tipoImovel").val();
          if (tipoImovel==1) {
            $('#extras').show();
          } else if (tipoImovel==2) {
            $('#extras').show();
          } else if (tipoImovel==7) {
            $('#extras').show();
          }else {
            $('#extras').hide();
          }
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

      // Script para o marcador do mapa
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

      // Script para o filtro da pesquisa
      $("#filter").on("keyup", function() {
        //alert('here');
        let value = $(this).val().toLowerCase();
        $(".management").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });


    </script>
    </div>
  </body>
</html>
