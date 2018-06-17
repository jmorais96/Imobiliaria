<?php
//include("assets/constantes.php");
require_once('../data/imobiliaria.class.php');
require_once("../data/funcionario.class.php");
session_start();

//se o login for feito com sucesso
if(isset($_SESSION['funcionario'])){
    echo '<h3>Login efetuado com sucesso. Bem-vindo '.$_SESSION['funcionario']->getFullName().'</h3>';
}
//caso contrario reencaminha de volta ao index.php
else{
    header('location:index.php');
}



if (isset($_GET['acao']) && $_GET['acao'] == 'logout'){
   session_destroy();

   header('location: index.php');
}
  
  $bd = new imobiliaria('../data/config.ini');
  
  if(isset($_POST['submit_manager'])) {

      if(!$bd->mailGestorExists($_POST['email'])) {

          $bd->registarGestor($_POST['email'], $_POST['nome'], $_POST['sobrenome'], $_POST['password'], $_POST['contacto']);

      }

  }

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Azores Property | Administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media='screen and (min-width: 260px) and (max-width: 767px)' href="../css/mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 768px) and (max-width: 1100px)' href="../css/tablet.css"/>
    <link rel="stylesheet" media='screen and (min-width: 1101px)' href="../css/admin_desktop-property.css"/>
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


        </div>
      </div>
      <div class="management1">

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


      </div>
    </div>
    <div id="Tokyo" class="tabcontent">
      <div class="admin_container">
        <!-- Form para criar gestor -->
        <h1>Adicionar gestor</h1>
        <form class="add_manager" action="" method="post">
          <label>Email:<input type="email" name="email" placeholder="exemplo@exemplo.pt" value=""/></label>
          <label>Nome próprio:<input type="text" name="nome" placeholder="Primeiro Nome" value=""/></label>
          <label>Apelido:<input type="text" name="sobrenome" placeholder="Apelido" value=""/></label>
          <label>Password:<input type="password" name="password" placeholder="Palavra passe" value=""/></label>
          <label>Comfirmar password:<input type="password" name="retype" placeholder="Confirmar a palavra passe" value=""/></label>
          <label>Contacto:<input type="contacto" name="contacto" placeholder="contacto" value=""/></label>

          
          <input type="submit" name="submit_manager" value="criar">

        </form> AQUI 
      </div>
    </div>

    <div id="Madrid" class="tabcontent">
      <div class="admin_container">

                <h1>LISTA DE GESTORES</h1>


      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

    

        // Localizacao
        $(document).ready(function(){
            $("#ilha").change(function(){
                let ilha = $("#ilha").val();
                $.ajax({
                type:'POST',
                url:'../assets/concelho.php',
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
                url:'../assets/freguesia.php',
                data:"idConcelho="+ concelho,
                success:function(html){
                    $('#freguesia').html(html);

                }
                });
            });


        });


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
