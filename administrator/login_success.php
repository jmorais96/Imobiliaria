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

  // Funcionalidade de logout
  if (isset($_GET['acao']) && $_GET['acao'] == 'logout'){
    session_destroy();

    header('location: index.php');
  }

  // Ligação à base de dados
  $bd = new imobiliaria('../data/config.ini');

  // Funcionalidade que permite registar um gestor
  if(isset($_POST['submit_manager'])) {

      // Verificar se o gestor já não se encontra registado
      if(!$bd->mailGestorExists($_POST['email'])) {

          // Registar um novo gestor
          $bd->registarGestor($_POST['email'], $_POST['nome'], $_POST['sobrenome'], $_POST['password'], $_POST['contacto']);

      }

  }

  // Funcionalidade que permite editar um gestor
  if(isset($_POST['edit_manager'])) {
  //codigo do botao de editar gestor

  // Comando SQL para proceder ao 'update' dos dados de um funcionário
  $sql="UPDATE funcionario SET ";

  // Definir um array que irá guardar os campos a serem alterados
  $campos=[];

  // Atualização do email do funcionário
  if ($_POST['email']) {

    $campos['email']=$_POST['email'];
    $sql .= "email = :email, ";
  }

  // Atualização do nome do funcionário
  if ($_POST['nome']) {
    $campos['nomeProprio']=$_POST['nome'];
    $sql .= "nomeProprio = :nomeProprio, ";
  }

  // Atualização do sobrenome do funcionário
  if ($_POST['sobrenome']) {
    $campos['sobrenome']=$_POST['sobrenome'];
    $sql .= "sobrenome = :sobrenome, ";
  }

  // Atualização da password do funcionário
  if ($_POST['password']) {
    $campos['password']=$_POST['password'];
    $sql .= "password = :password, ";
  }

  // Atualização do contacto do funcionário
  if ($_POST['contacto']) {
    $campos['contacto']=$_POST['contacto'];
    $sql .= "contacto = :contacto, ";
  }

  // Atualização do id do funcionário
  if ($_POST['id']) {
    $sql=substr($sql, 0, -2);
    $campos['idFuncionario']=$_POST['id'];
    $sql .= " where idFuncionario = :idFuncionario";
  }

   // Verificar se a nova password e o 'retype' da mesma correspondem
   if ((isset($_POST['password'])) && (isset($_POST['retype'])) ) {
     if ($_POST['password']==$_POST['retype']) {

       // Proceder por fim à edição do funcionário, utilizando a instrução SQL e o array com os campos
       if (md5($_POST['passAdmin'])==$_SESSION['funcionario']->getPassword()) {
         $bd->editarGestor($sql, $campos);
       }

     }
   } else {
     if (md5($_POST['passAdmin'])==$_SESSION['funcionario']->getPassword()) {
       $bd->editarGestor($sql, $campos);
     }
   }

}


if (!isset($_SESSION['funcionario'])) {
  header("location:../index.php");
}

if (isset($_SESSION['funcionario'])) {
  if ($_SESSION['funcionario']->getTipoUser()=="Gestor") {
    header("location:management/manager.php");
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
    <title>Mais Imobiliária | Área Administrativa</title>

  </head>

  <body>

    <!-- HEADER/NAVBAR -->
    <div class="container-header">
    <nav class="navbar navbar-expand-lg navbar-light">
    
    <!-- Logótipo da página -->
    <a class="navbar-brand" href="login_success.php"><img id="icon" class="logo" src="../images/logo.png"/></a>

    <!-- Link de navegação "Encerrar sessão" -->
    <a class="nav-link encerrar_admin" href="?acao=logout" style="margin-right: 20%; padding: 5px 50px;">ENCERRAR SESSÃO</a>

    </nav>
  </div>
<!-- FINAL DO HEADER/NAVBAR  -->

<div class="container_admin" style="margin: 0 10%;">

    <!--<div class="nav_box">
      <div class="user_box">
        <a href="?acao=logout"><button id="modalBtn1" class="user_status">Logout</button></a>
      </div>
    </div>-->
    <div class="nav_holder">
    </div>
    <div class="backend_admin">
        <h1>Área Administrativa</h1>
    </div>
    <div class="res_admin">
         <?php

            // Mensagem que aparecerá caso o login seja efetuado com sucesso
            if(isset($_SESSION['funcionario'])){
                echo '<h4>Login efetuado com sucesso. Bem-vindo '.$_SESSION['funcionario']->getFullName().'!</h4>';

            /* Caso o admin não consiga efetuar o login é reencaminhado para a página 'index.php' do back-end */
            } else {
                header('location:index.php');
            }

            ?>

    </div>

    <!-- Tabuladores da área de administração -->
    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Estatísticas</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Imóveis em destaque</button>
      <button class="tablinks" onclick="openCity(event, 'Tokyo')" >Adicionar gestor</button>
      <button class="tablinks" onclick="openCity(event, 'Madrid')" >Edição de Gestores</button>
    </div>

    <!-- SECÇÃO DAS ESTATÍSITICAS -->
    <div id="London" class="tabcontent">
      
      <div class="row pdf_first_row">
        
        <div class="pdf_box">
          Vendas por gestor:<a href="gestor.php" onclick="window.open('pdf_gestor.php');"> 
          <button type="button" name="button">Gerar PDF</button> </a>
        </div>
        
        <div class="pdf_box">
          Imóveis por tipo:<a href="tipo.php" onclick="window.open('pdf_tipo.php');"> 
          <button>Gerar PDF</button></a>
        </div>
      
      </div>
      
      <div class="row pdf_second_row">
      
      <div class="pdf_box">
        Imóveis por preço:<a href="preco.php" onclick="window.open('pdf_preco.php');">
        <button>Gerar PDF</button></a>
      </div>

      <div class="pdf_box">
        Imóveis por local:<a href="local.php" onclick="window.open('pdf_local.php');"> 
        <button>Gerar PDF</button></a>
      </div>
      
      </div>
    
    </div>
    <!-- FINAL SECÇÃO DAS ESTATÍSITICAS -->

    <!-- - - - - - - - - - - - - - - - - -->

    <!-- SECÇÃO DOS IMÓVEIS PROPOSTOS PARA DESTAQUE -->
    <div id="Paris" class="tabcontent">
      <div id="notifications">

        <!-- Acesso aos imóveis propostos -->
        <?php

          $propostos = $bd->imoveisPropostos();

        ?>

        <!-- Notificações dos imóveis -->
        <p id="num_notifications" class="imoveis_pendentes_msg">Número de imóveis pendentes: <?php if (is_array($propostos)){echo count($propostos);}else{echo "0";} ?></p>
        <p id="num_notifications1">Número de imóveis pendentes:<?php if (is_array($propostos)){echo count($propostos);}else{echo "0";} ?></p>
        
        <div id="notifications_box">
          <?php

          if (isset($propostos)) {

           foreach ($bd->imoveisPropostos() as $pendente){

          ?>

          <!-- Notificação associada a cada imóvel e detalhes do mesmo -->
          <div class="notification">
          
          <a href="../p_imovel.php/id=pendente" class="imovel_proposto">
          
          <div class="thumbnail_notification">
            
          <div class="thumb_img_notification">
              <img src="../imoveis/<?php echo $pendente->getIdImovel(); ?>/<?php echo $pendente->getNomeImagemPrincipal(); ?>" alt="Imagem principal do imóvel">
            </div>
            
            <div class="thumbnail_info_notification">
              <p><i class="fas fa-piggy-bank fa-1x" style="color: #fff"></i> Finalidade: <?php echo $pendente->getFinalidade(); ?></p>
              <p><i class="fas fa-map fa-1x" style="color: #fff"></i> Localização: <?php echo $pendente->getIlha(); ?> - <?php echo $pendente->getConcelho(); ?> - <?php echo $pendente->getFreguesia(); ?></p>
              <p><i class="fas fa-road fa-1x" style="color: #fff"></i> Morada: <?php echo $pendente->getRua(); ?></p>
              <p><i class="fas fa-money-bill-wave fa-1x" style="color: #fff"></i> Preço: <?php echo $pendente->getPreco(); ?></p>
            </div>
          </div>
        
        </a>

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

          // Acesso aos imóveis destacados
          $destaque = $bd->imoveisDestacados();

          if (isset($destaque)) {

            foreach ($destaque as $destaque){ ?>

          <a class="imovel_proposto" href="../p_imovel.php?id=<?php echo $destaque->getIdImovel(); ?>">
              <div class="thumbnail_management">
              
              <div class="thumb_img_management">
                <img src="../imoveis/<?php echo $destaque->getIdImovel(); ?>/<?php echo $destaque->getNomeImagemPrincipal(); ?>" alt="Imagem principal do imóvel">
              </div>

              <div class="thumbnail_info_management">
                <p><i class="fas fa-piggy-bank fa-1x" style="color: #fff"></i> Finalidade: <?php echo $destaque->getFinalidade(); ?></p>
                <p><i class="fas fa-map fa-1x" style="color: #fff"></i> Localização: <?php echo $destaque->getIlha(); ?> - <?php echo $destaque->getConcelho(); ?> - <?php echo $destaque->getFreguesia(); ?></p>
                <p><i class="fas fa-road fa-1x" style="color: #fff"></i> Morada: <?php echo $destaque->getRua(); ?></p>
                <p><i class="fas fa-money-bill-wave fa-1x" style="color: #fff"></i> Preço: <?php echo $destaque->getPreco(); ?>€</p>
              </div>
            </div>
          </a>

        <?php } } ?>

      </div>
    </div>

    <!-- SECÇÃO DOS IMÓVEIS PROPOSTOS PARA DESTAQUE -->
    
    <!-- - - - - - - - - - - - - - - - - - - - - - -->

    <!-- SECÇÃO DA ADIÇÃO DE NOVOS GESTORES -->
    <div id="Tokyo" class="tabcontent">
      <div class="admin_container">

        <!-- FORMULÁRIO QUE CRIA GESTORES -->
        <div class="boxh2">
            <h2>Adicionar Novo Gestor</h2>
        </div>
       
       <form class="add_manager" action="" method="post">

          <!-- Email do gestor -->
          <label>Email:<input type="email" name="email" placeholder="exemplo@exemplo.pt" value=""/></label>

          <!-- Nome próprio do gestor -->
          <label>Nome próprio:<input type="text" name="nome" placeholder="Primeiro Nome" value=""/></label>

          <!-- Apelido do gestor -->
          <label>Apelido:<input type="text" name="sobrenome" placeholder="Apelido" value=""/></label>

          <!-- Password do gestor -->
          <label>Palavra-passe:<input type="password" name="password" placeholder="Escreva aqui a palavra-passe" value=""/></label>

          <!-- Password 'retype' do gestor -->
          <label>Confirmar palavra-passe:<input type="password" name="retype" placeholder="Confirmar a palavra-passe escolhida" value=""/></label>

          <!-- Contacto do gestor -->
          <label>Contacto:<input type="contacto" name="contacto" placeholder="Contacto de preferência escolhido" value=""/></label>

          <!-- Botão de submissão para o formulário que cria novos gestores -->
          <div class="add_prop_box add_prop_button">
            <input type="submit" name="submit_manager" value="Adicionar gestor">
          </div>

        </form>
      </div>
    </div>
    <!-- FINAL FORMULÁRIO QUE CRIA GESTORES -->

    <!-- Listagem dos gestores -->
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
              <th class="editar_gestor">Editar</th>
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

  <!-- FORMULÁRIO QUE EDITA GESTORES -->

  <!-- Obter a listagem de todos os gestores -->
  <?php
    foreach ($bd->getWorkers() as $value) {
  ?>

  <!-- Obter o email de cada gestor -->
  <div id="<?php echo $value->getEmail(); ?>" class="tabcontent">

      <div class="admin_container">

        <!-- Formulário que edita gestores -->
        <div class="boxh2">
            <h2>Editar Gestor</h2>
        </div>

        <form class="add_manager" action="" method="post">

          <!-- Novo email do gestor -->
          <label>Email:<input type="email" name="email" value="<?php echo $value->getEmail(); ?>" placeholder=""/></label>

          <!-- Alteração do nome próprio do gestor -->
          <label>Nome próprio:<input type="text" name="nome" value="<?php echo $value->getNomeProprio(); ?>" placeholder=""/></label>

          <!-- Alteração do apelido do gestor -->
          <label>Apelido:<input type="text" name="sobrenome" value="<?php echo $value->getSobrenome(); ?>" placeholder=""/></label>

          <!-- Alteração da password do gestor -->
          <label>Palavra-passe:<input type="password" name="password" value="" placeholder="Escreva aqui a nova palavra-passe do gestor"/></label>

          <!-- Confirmação da nova password do gestor -->
          <label>Confirmar palavra-passe:<input type="password" name="retype" value="" placeholder="Reescreva a nova palavra-passe escolhida"/></label>

          <!-- Novo contacto do gestor -->
          <label>Contacto:<input type="contacto" name="contacto" value="<?php echo $value->getContacto(); ?>" placeholder=""/></label>

          <!-- Pedido da password administrativa de modo ao admin poder efetuar as alterações -->
          <label>Password Administrativa:<input type="password" name="passAdmin" value="" placeholder="Introduza aqui a sua palavra-passe de administrador"/></label>

          <!-- Id do funcionário enviado como campo 'hidden' -->
          <input type="hidden" name="id" value="<?php echo $value->getIdFuncionario(); ?>">
          
          <!-- Botão de submissão para o formulário que edita gestores -->
          <div class="add_prop_box add_prop_button">
            <input type="submit" name="edit_manager" value="editar">
          </div>

        </form>
      </div>
    </div>
    <!-- FINAL DO FORMULÁRIO QUE EDITA GESTORES -->

    <?php } ?>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Ficheiros JavaScript -->
  <script src="../js/admin_container.js"></script>

  <!-- Script para as notificações -->
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

    /* Script para a localização do utilizador, dando concelhos e freguesias como opções a partir da ilha */
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

  // Aviso para o facto de um gestor possuir imóveis em seu nome
  if (isset($_GET['acao']) && $_GET['acao']=='gestor') {
    echo "<script> window.alert('Este gestor tem imóveis em seu nome') </script>";
  }

  // Aviso para o facto de já existirem 6 imóveis em destaque
  if (isset($_GET['acao']) && $_GET['acao']=='destaqueko') {
    echo "<script> window.alert('Já existem 6 imoveis em destaque') </script>";
  }
  ?>

</div>
</body>
</html>
