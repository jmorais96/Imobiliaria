<?php
// Incluir a classe Imobiliária
require_once('../data/imobiliaria.class.php');

// Incluir a classe Funcionario
require_once('../data/funcionario.class.php');

// Incluir a classe Imovel
require_once('../data/imovel.class.php');

// Incluir a classe imagem
require_once('../data/imagem.class.php');

// Incluir a classe user
require_once('../data/user.class.php');

// Incluir a classe visita
require_once('../data/visita.class.php');

// Iniciar a sessão
session_start();

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

if(isset($_POST['edit_manager'])) {
//codigo do botao de editar gestor

  $sql="UPDATE funcionario SET ";

  $campos=[];
  if ($_POST['email']) {

    $campos['email']=$_POST['email'];
    $sql .= "email = :email, ";
  }
  if ($_POST['nome']) {
    $campos['nomeProprio']=$_POST['nome'];
    $sql .= "nomeProprio = :nomeProprio, ";
  }

  if ($_POST['sobrenome']) {
    $campos['sobrenome']=$_POST['sobrenome'];
    $sql .= "sobrenome = :sobrenome, ";
  }

  if ($_POST['password']) {

    $campos['password']=$_POST['password'];
    $sql .= "password = :password, ";
  }

  if ($_POST['contacto']) {
    $campos['contacto']=$_POST['contacto'];
    $sql .= "contacto = :contacto, ";
  }

  if ($_POST['id']) {
    $sql=substr($sql, 0, -2);
    $campos['idFuncionario']=$_POST['id'];
    $sql .= " where idFuncionario = :idFuncionario";
  }

   if ((isset($_POST['password'])) && (isset($_POST['retype'])) ) {
     if ($_POST['password']==$_POST['retype']) {

       if (md5($_POST['passAdmin'])==$_SESSION['funcionario']->getPassword()) {
         $bd->editarGestor($sql, $campos);
       }

     }
   }else {
     if (md5($_POST['passAdmin'])==$_SESSION['funcionario']->getPassword()) {
       $bd->editarGestor($sql, $campos);
     }
   }

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
    <link rel="stylesheet" href="../css/homepage.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/gerirImovelTable.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">

    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Título da página -->
    <title>Mais Imobiliária | Bem-vindo</title>

  </head>

  <body>

    <!-- HEADER/NAVBAR -->
  <div class="container-header">
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img id="icon" src="../images/logo.png"/></a>

  <!-- Toogler que aparecerá nos menores ecrãs -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">

        <!-- Link de navegação "Home" -->
        <li class="nav-item">
            <a class="nav-link" href="?acao=logout">Logout</a>
        </li>

        </ul>

    </div>

        <!-- Contacto Telefónico -->
        <div class="phone">
            <img id="phoneIcon" src="../images/call-answer.svg" alt="Contacto Telefónico"/>
            <p id="phone-number">296 012 345</p>
        </div>

    </nav>
</div>
<!-- FINAL DO HEADER/NAVBAR  -->

<div class="container_admin">

    <!--<div class="nav_box">
      <div class="user_box">
        <a href="?acao=logout"><button id="modalBtn1" class="user_status">Logout</button></a>
      </div>
    </div>-->
    <div class="nav_holder">
    </div>
    <div class="backend_admin">
        <h1>Administração</h1>
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
    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Estatísticas</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Imóveis em destaque</button>
      <button class="tablinks" onclick="openCity(event, 'Tokyo')" >Adicionar gestor</button>
      <button class="tablinks" onclick="openCity(event, 'Madrid')" >Edição de Gestores</button>
    </div>

    <div id="London" class="tabcontent">
      <div class="statistics">
      </div>
      Vendas por gestor:<a href="pdf_gestor.php"> <button type="button" name="button">Gerar PDF</button> </a>

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
        <?php
        $propostos = $bd->imoveisPropostos();
        ?>
        <button id="num_notifications">Pendentes:<?php if (is_array($propostos)){echo count($propostos);}else{echo "0";} ?></button>
        <button id="num_notifications1">Pendentes:<?php if (is_array($propostos)){echo count($propostos);}else{echo "0";} ?></button>
        <div id="notifications_box">
          <?php

          if (isset($propostos)) {

           foreach ($bd->imoveisPropostos() as $pendente){

          ?>

          <div class="notification">
          <a href="../p_imovel.php/id=pendente"><div class="thumbnail_notification">
            <div class="thumb_img_notification">
              <img src="../imoveis/<?php echo $pendente->getIdImovel(); ?>/<?php echo $pendente->getNomeImagemPrincipal(); ?>" alt="">
            </div>
            <div class="thumbnail_info_notification">
              <p> Finalidade: <?php echo $pendente->getFinalidade(); ?></p>
              <p><?php echo $pendente->getIlha(); ?> - <?php echo $pendente->getConcelho(); ?> - <?php echo $pendente->getFreguesia(); ?></p>
              <p><?php echo $pendente->getRua(); ?></p>
              <p><?php echo $pendente->getPreco(); ?></p>
            </div>
          </div></a>
          <div id="feature_aprovation">
            <a class="aprove_feature" href="destaque.php?id=<?php echo $pendente->getIdImovel(); ?>"><button type="button" >v</button></a>
            <a class="disaprove_feature" href="n_destaque.php?id=<?php echo $pendente->getIdImovel(); ?>"><button type="button" >x</button></a>
          </div>
          </div>

        <?php } }?>

        </div>
      </div>
      <div class="management1">

        <?php
          $destaque = $bd->imoveisDestacados();

          if (isset($destaque)) {

            foreach ($destaque as $destaque){ ?>

          <a href="../p_imovel.php?id=<?php echo $destaque->getIdImovel(); ?>">
            <div class="thumbnail_management">
              <div class="thumb_img_management">
                <img src="../imoveis/<?php echo $destaque->getIdImovel(); ?>/<?php echo $destaque->getNomeImagemPrincipal(); ?>" alt="">
              </div>
              <div class="thumbnail_info_management">
                <p> Finalidade: <?php echo $destaque->getFinalidade(); ?></p>
                <p><?php echo $destaque->getIlha(); ?> - <?php echo $destaque->getConcelho(); ?> - <?php echo $destaque->getFreguesia(); ?></p>
                <p><?php echo $destaque->getRua(); ?></p>
                <p><?php echo $destaque->getPreco(); ?></p>
              </div>
            </div>
          </a>

        <?php }} ?>

      </div>
    </div>
    <div id="Tokyo" class="tabcontent">
      <div class="admin_container">
        <!-- Form para criar gestor -->
        <div class="boxh2">
            <h2>Adicionar gestor</h2>
        </div>
        <form class="add_manager" action="" method="post">
          <label>Email:<input type="email" name="email" placeholder="exemplo@exemplo.pt" value=""/></label>
          <label>Nome próprio:<input type="text" name="nome" placeholder="Primeiro Nome" value=""/></label>
          <label>Apelido:<input type="text" name="sobrenome" placeholder="Apelido" value=""/></label>
          <label>Password:<input type="password" name="password" placeholder="Palavra passe" value=""/></label>
          <label>Comfirmar password:<input type="password" name="retype" placeholder="Confirmar a palavra passe" value=""/></label>
          <label>Contacto:<input type="contacto" name="contacto" placeholder="contacto" value=""/></label>


          <input type="submit" name="submit_manager" value="criar">

        </form>
      </div>
    </div>

    <div id="Madrid" class="tabcontent">
      <div class="admin_container">

        <h2>Lista de Gestores</h2>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Nome Próprio</th>
              <th>Apelido</th>
              <th>Email</th>
              <th>Contacto</th>
              <th>Editar</th>
            </tr>
          </thead>
          <tbody>
          <?php

                foreach ($bd->getWorkers() as $value) {
              ?>

            <tr>
              <td> <?php echo $value->getNomeProprio() ?> </td>
              <td> <?php echo $value->getSobrenome() ?> </td>
              <td> <?php echo $value->getEmail() ?></td>
              <td> <?php echo $value->getContacto() ?> </td>
             <td><button class="edit" onclick="openCity(event, '<?php echo $value->getEmail(); ?>')" >editar</button></td>
            <tr>
         <?php
          }
         ?>
          </tbody>

      </table>


    </div>
  </div>


 <!-- AO CLICAR NO BOTAO EDITAR GESTOR -->
    <?php
     foreach ($bd->getWorkers() as $value) {
    ?>
  <div id="<?php echo $value->getEmail(); ?>" class="tabcontent">
      <div class="admin_container">
        <!-- Form para criar gestor -->
        <div class="boxh2">
            <h2>Editar gestor</h2>
        </div>
        <form class="add_manager" action="" method="post">
          <label>Email:<input type="email" name="email" value="<?php echo $value->getEmail(); ?>" placeholder=""/></label>
          <label>Nome próprio:<input type="text" name="nome" value="<?php echo $value->getNomeProprio(); ?>" placeholder=""/></label>
          <label>Apelido:<input type="text" name="sobrenome" value="<?php echo $value->getSobrenome(); ?>" placeholder=""/></label>
          <label>Password:<input type="password" name="password" value="" placeholder=""/></label>
          <label>Confirmar password:<input type="password" name="retype" value="" placeholder=""/></label>
          <label>Contacto:<input type="contacto" name="contacto" value="<?php echo $value->getContacto(); ?>" placeholder=""/></label>
          <label>Password Administrativa:<input type="password" name="passAdmin" value="" placeholder=""/></label>
          <input type="hidden" name="id" value="<?php echo $value->getIdFuncionario(); ?>">

          <input type="submit" name="edit_manager" value="editar">

        </form>
      </div>
    </div>

    <?php
  }
  ?>
   <!-- FIM DO BOTAO EDITAR IMOVEL -->

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
</div>
</body>
</html>
