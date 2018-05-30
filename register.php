<!-- Adicionar a classe imóvel -->
<?php require_once('data/imovel.class.php'); ?>

<?php

  if (isset($_SESSION['cliente']) || isset($_SESSION['admin'])) {

      header("location:index.php");
 
  }
  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
/* necessário criar condições de incerção */
    
    $bd=new imobiliaria("data/config.ini");
    
}

?>

<!DOCTYPE html>
<html lang="pt" dir="ltr">

  <head>

    <!-- MetaTags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">
    <link rel="stylesheet" href="css/register.css" type="text/css">   

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Título da página -->
    <title>Mais Imobiliária | Página de Registo</title>

  </head>

  <body>

  <!-- HEADER/NAVBAR --> 
  <div class="container-header">
  <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img id="icon" src="images/logo.png"/></a>

  <!-- Toogler que aparecerá nos menores ecrãs -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto header-registo">

            <h3>Página de registo da imobiliária</h3>

        </ul>

    </div>
    
        <!-- Contacto Telefónico -->
        <div class="phone">
            <img id="phoneIcon" src="images/call-answer.svg" alt="Contacto Telefónico"/>
            <p id="phone-number">296 012 345</p>
        </div>

    </nav>
</div>
    <!-- FINAL DO HEADER/NAVBAR  -->

    <!-- ÁREA DE REGISTO DA IMOBILIÁRIA -->
    <div class="super_container_form_registo">
    
        <div class="container_form2">

            <!-- Formulário de registo -->

                <div class="formulario-registo">
                   
                    <form id="formulario-registo" action="" method="POST">

                        <!-- Nome próprio -->
                        <label for="firstname">Nome próprio</label>
                        <input type="text" name="firstname" placeholder="Escreva aqui o seu nome próprio" required class="form-control">

                         <!-- Apelido -->
                        <label for="lastname">Apelido</label>
                        <input type="text" name="lastname" placeholder="Escreva aqui o seu apelido" required class="form-control">

                        <!-- Username -->
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Escolha um nome de utilizador"  required class="form-control">

                        <!-- Palavra-passe escolhida -->
                        <label for="password">Escolha uma palavra-passe</label>
                        <input type="password" name="password" placeholder="Digite a palavra-passe pretendida" required class="form-control">

                        <!-- Confirmação da palavra-passe escolhida -->
                        <label for="password_rewrite">Reescreva a palavra-passe escolhida</label>
                        <input type="password" name="password_rewrite" placeholder="Reescreva a palavra-passe escolhida" required class="form-control">

                        <!-- Morada -->
                        <label for="address">Morada</label>
                        <input type="text" required name="address" placeholder="Escreva aqui qual é a sua morada" class="form-control">
                        
                        <!-- Botão de registo do formulário -->
                        <button id="registar" name="registar">Registar-se</button>
                    
                    </form>
                </div>
            <!-- Final do formulário de pesquisa -->
        </div>
   </div>
    <!-- FINAL DA ÁREA DE REGISTO DA IMOBILIÁRIA -->

    <!-- FOOTER DA PÁGINA DE REGISTO -->
    <div class="container_footer">
      <div class="footer">
           <div class="icon">
              <img id="icon" src="images/logoBranco.png"/>
              <p id="homeIconName">
            </div>
            <div class="copyright">
				<p class="copyright"><span class="copyright-simbol">&#169;</span> 2018 Mais Imobiliária</p>
            </div>
      </div>
    </div>
    <!-- FINAL DO FOOTER DA PÁGINA DE REGISTO -->

  </body>

    <!-- Ficheiros JavaScript pessois -->
    
    <!-- jQuery -->  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <?php
        
        if(isset($_POST['registar'])) {
            
            $firstname = $_POST['firstname']; 
            $lastname = $_POST['lastname'];
            $username = $_POST['username']; 
            $password = $_POST['password'];  
            $password_rewrite = $_POST['password_rewrite'];  
            $address = $_POST['address'];
             
        }
        

    ?>

</html>
