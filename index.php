<!-- Adicionar a classe imóvel -->
<?php

    // Incluir a classe Imovel
    require_once('data/imovel.class.php');

    // Incluir a classe User
    require_once('data/user.class.php');

    // Incluir a classe Imagem
    require_once('data/imagem.class.php');

    // Iniciar a sessão
    session_start();

    // Incluir a funcionalidade de logout
    require_once('assets/logout.php');

    // Ligação à base de dados
    $bd = new imobiliaria('data/config.ini');

    // Operação que permite ao user (cliente) iniciar sessão
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $_SESSION['cliente']=$bd->loginCliente($_POST['mail'], $_POST['pass']);
      //var_dump($_SESSION['cliente']);
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

    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Script associado ao geocode -->
    <script>
    <?php
    if (isset($_SESSION['cliente'])) { ?>
       address = "<?php echo $_SESSION['cliente']->getFreguesia(); ?>";
       zoom=13;
      <?php } ?>
    </script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Título da página -->
    <title>Mais Imobiliária | Bem-vindo</title>

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

        <ul class="navbar-nav mx-auto">

        <!-- Link de navegação "Home" -->
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>

        <?php if (!isset($_SESSION['cliente'])) { ?>

        <!-- Link de navegação "Registo" -->
        <li class="nav-item">
            <a class="nav-link" href="register.php">Registo</a>
        </li>

        <!-- Link de navegação que abre o módulo de "Login" -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#loginWindow">Login</a>
        </li>

        <?php } else { ?>

        <!-- Link de navegação "Área de Cliente" -->
        <li class="nav-item">
            <a class="nav-link" href="area_cliente.php">Área de Cliente</a>
        </li>

        <!-- Link de navegação que permite fazer "logout" -->
        <li class="nav-item">
            <a class="nav-link" href="?acao=logout">Logout</a>
        </li>

        <?php } ?>

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


<!-- MÓDULO DE LOGIN -->
<div class="modal fade" id="loginWindow">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header do módulo -->
            <div class="modal-header">
                <h3 class="modal-title">Efetue o seu login</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body do módulo -->
            <div class="modal-body">
                <form action="" role="form" method="post">
                    <div class="form-inline">
                        <i class="fas fa-user-alt"></i> <input type="email" placeholder="Escreva aqui o seu email..." class="form-control input-email" name="mail">
                    </div>
                    <div class="form-inline">
                         <i class="fas fa-unlock"></i> <input type="password"  placeholder="Escreva aqui a sua palavra-passe..." class="form-control input-password" name="pass">
                    </div>
                    <!-- Footer do módulo -->
                    <div class="modal-footer">
                      <button class="btn btn-block">Iniciar Sessão</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- FINAL DO MÓDULO DE LOGIN -->
  <div class="container_body">

   <!-- ÁREA CENTRAL DA PÁGINA -->

   <!-- Mapa do índex -->
   <div class="map" style="float:left;"></div>

   <!-- Toogler do menu de pesquisa -->
   <div id="toogler">
    <i class="fas fa-arrow-circle-left btn_toogler"></i>
   </div>

    <!-- PESQUISA DO ÍNDEX -->
    <div class="container_form">

        <!-- Primeira parte do formulário - especificações -->
        <div class="formTitle">
            <img id="lupaIcon" src="images/lupa.png"/>
            <p>O QUE PROCURAS?</p>
        </div>

        <!-- Formulário de pesquisa -->
        <div class="searchForm">

            <div id="searchForm">

                <!-- Finalidade procurada -->
                <select id="index" name="finalidade">
                    <?php $bd->selectFinalidade(); ?>
                </select>

                <!-- Tipo de imóvel procurado -->
                <select id="index" name="tipoImovel">
                   <?php $bd->selectTipoImovel(); ?>
                </select>

                <!-- Tipologia de imóvel procurada -->
                <select id="index" name="tipologia">
                    <?php $bd->selectTipologia(); ?>
                </select>

                <!-- Segunda parte do formulário - localização -->
                <div class="formTitleSecondary">
                <img id="locationIcon" src="images/location.png"/>
                <p>Onde procuras?</p>
                </div>

                <!-- Ilha do imóvel pretendido -->
                <select id="ilha" name="ilha">
                    <?php $bd->selectIlha(); ?>
                </select>

                <!-- Concelho do imóvel pretendido -->
                <select id="concelho" name="concelho">
                    <option value="">Selecione um concelho</option>
                </select>

                <!-- Freguesia do imóvel pretendido -->
                <select id="freguesia" name="freguesia">
                    <option value="">Selecione uma freguesia</option>
                </select>

                <!-- Terceira parte do formulário - preço -->
                <input id="index" type="number" name="preco" placeholder="Preço máximo do imóvel"/>

                <!-- Botão de submissão do formulário -->
                <button id="encontrar">Encontrar Imóvel</button>

            </div>
        </div>
        <!-- Final do formulário de pesquisa -->

    </div>
    <!-- FINAL DA PESQUISA DO ÍNDEX -->

  </div>

    <!-- FOOTER -->
    <footer>
        <div class="container_footer">
            <div class="footer">
                <div class="icon">
                    <a href="index.php"><img id="icon" src="images/logoBranco.png"/></a>
                    <p id="homeIconName">
                </div>
                <div class="copyright">
                    <p class="copyright"><span class="copyright-simbol">&#169;</span> 2018 Mais Imobiliária</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FINAL DO FOOTER -->

  </body>

  <!-- API Google Maps -->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDrXJ1v5Tyan8210Bl76AnTl0HdcK0BdEY&callback=initMap"></script>

    <!-- Ficheiros JavaScript pessois -->
    <script src="js/homepage.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Latest compiled Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Script que permite escolher concelho e freguesia consoante a ilha escolhida -->
    <script type="text/javascript">

        $(document).ready(function(){

            $("#ilha").change(function(){
                let ilha = $("#ilha").val();
                $.ajax({
                type:'POST',
                url:'assets/concelho.php',
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
                url:'assets/freguesia.php',
                data:"idConcelho="+ concelho,
                success:function(html){
                    $('#freguesia').html(html);

                }
                });
            });

            // Acesso aos imóveis em destaque
            <?php $bd->destaque(); ?>

            // Script associado ao formulário de pesquisa
            $("#encontrar").click(function() {
              let sql="SELECT * FROM todosimoveis inner join freguesia USING (idFreguesia) INNER JOIN concelho USING(idconcelho) INNER JOIN ilha USING (idIlha)";
              //alert("here");
              let condicoes=[];
              let valores=[];

              if ($("[name= finalidade ]").val()){
                condicoes.push("finalidade = :finalidade");
                valores['finalidade']=$("[name= finalidade ]").val();
                //alert("here");
              }

              if ($("[name= tipoImovel ]").val()) {
                condicoes.push("tipoImovel = :tipoImovel");
                valores['tipoImovel']=$("[name= tipoImovel ]").val();
                //alert(valores);
              }

              if ($("[name= tipologia ]").val()) {
                condicoes.push("tipologia = :tipologia");
                valores['tipologia']=$("[name= tipologia ]").val();
              }

              if (($("[name= freguesia ]").val()) && $("[name= freguesia ]").val()!="Selecione uma freguesia" ) {
                condicoes.push("freguesia = :freguesia");
                valores['freguesia']=$("[name= freguesia ]").val();
              }

              if (($("[name= concelho ]").val()) && $("[name= concelho ]").val()!="Selecione um concelho" ) {
                condicoes.push("idConcelho = :concelho");
                valores['concelho']=$("[name= concelho ]").val();
              }

              if (($("[name= ilha ]").val()) && $("[name= ilha ]").val()!="Selecione uma ilha" ) {
                condicoes.push("idIlha = :ilha");
                valores['ilha']=$("[name= ilha ]").val();
              }

              if ($("[name= preco ]").val()) {
                condicoes.push("preco <= :preco");
                valores['preco']=$("[name= preco ]").val();
              }

              if (condicoes.length) {
                sql += " where ";
                for (var i = 0; i < condicoes.length; i++) {
                  sql += condicoes[i] + " and ";

                }
                sql=sql.substring(0, sql.length-4);
              }

              arr = "";
              for (var i in valores) {
                arr+= i + ': ' + valores[i] + "|";
              }
              if (arr != "") {
                arr=arr.substring(0, arr.length-1);
              }

              sql += " and situacao = 'Ativo'";

              $.ajax({
              type:'POST',
              url:'assets/pesquisa.php',
              async: true,
              data:{sql: sql, valores: arr},
              success:function(pesquisa){
                if (pesquisa!="") {
                  clearOverlays();
                  console.log(pesquisa);
                  pesquisa=JSON.parse(pesquisa)
                  for (imovel of pesquisa) {
                    addMarker(imovel[0], parseFloat(imovel[1]), parseFloat(imovel[2]), imovel[3], imovel[4], imovel[5], imovel[6], imovel[7], imovel[8], imovel[9], imovel[10], imovel[11]);
                  }
                }
              }
              });

            });

        });
    </script>

    <!-- Resposta ao pedido AJAX associado à pesquisa -->
    <script type="text/javascript" id="resposta"></script>

</html>
