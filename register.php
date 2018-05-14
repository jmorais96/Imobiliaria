<!-- <?php session_start(); ?>

<?php include("assets/logout.php"); ?>

<?php include("registar_ok.php"); ?>

<?php

  if (isset($_SESSION['cliente']) || isset($_SESSION['admin'])) {

      header("location:index.php");

  }

?> -->

<!DOCTYPE html>
<html lang="pt">

  <head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Folhas de estilo utlizadas -->
    <link rel="stylesheet" media='screen and (min-width: 260px) and (max-width: 767px)' href="css/mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 768px) and (max-width: 1100px)' href="css/tablet.css"/>
    <link rel="stylesheet" media='screen and (min-width: 1101px)' href="css/desktop.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    <!-- Título da página -->
    <title>Azores Property | Formulário de registo</title>

  </head>

  <body>

    <!-- Header -->
    <div class="nav_box">
      <div class="logo_box">
        <a href="index.php"><img src="images/logo.png" alt=""></a>
      </div>

      <!-- Zona de pesquisa -->
      <div class="search_box">
        <form class="search_input" action="listagem.php" method="GET">
            <input class="caixa_pesquisa" type="search" name="search" placeholder="O que procura exatamente?">
            <input class="botao_pesquisa" type="submit" name="" value="Efetuar pesquisa avançada ">
        <div class="search_filter">
          <img id="icon_filter" src="images/icons/icon_down.png" alt="Abrir pesquisa detalhada"/>
          <img id="icon_filter1" src="images/icons/icon_up.png" alt="Fechar pesquisa detalhada"/>
          <div id="open_filter" class="search_filters_box">
        <div class="search_filters">

          <!-- Opções de pesquisa avançada -->
          <!-- Finalidade -->
          <select class="selection opcoes" name="finalidade">
            <option value="finalidade">A sua finalidade:</option>
            <option value="comprar">Comprar</option>
            <option value="arrendar">Arrendar</option>
          </select>

          <!-- Tipo de imóvel procurado -->
          <select class="selection opcoes" name="tipo_de_imovel" id="tipo_de_imovel" onchange="functionTipologia(this.id, 'tipologia')">
            <option value="tipo">O tipo de imóvel que procura:</option>
            <option value="Terreno">Terreno</option>
            <option value="Apartamento">Apartamento</option>
            <option value="Moradia">Moradia</option>
            <option value="Quinta">Quinta</option>
          </select>

          <!-- Tipologia do imóvel procurado -->
          <select class="selection opcoes" name="tipologia"  id="tipologia">
            <option value="">Tipologia do imóvel desejado:</option>
            <option value="T0">T0</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5+">T5+</option>
          </select>

          <!-- Ilha do imóvel procurado -->
            <select class="selection opcoes" name="ilha" id="ilha" onchange="functionConcelho(this.id,'concelho') ">
            <option value="">Ilha em que procura:</option>

            <!-- <?php

            $file = fopen("data/pesquisa/ilha.csv", "r");

            while (!feof($file)) {

              $ilha = fgetcsv($file, 0, ";");

                if($ilha[0]=="")
                break;

                echo '<option value="'.$ilha[1].'">'.$ilha[0].'</option>';
            }

            fclose($file);

            ?> -->

          </select>

          <!-- Concelho do imóvel procurado -->
          <select class="selection opcoes" name="concelho" id="concelho" onchange="functionFreguesia(this.id,'freguesia')">
            <option value="arrendar">Concelho em que procura:</option>
          </select>

          <!-- Freguesia do imóvel procurado -->
          <select class="selection opcoes" name="freguesia" id="freguesia" >
            <option value="arrendar">Freguesia em que procura:</option>
          </select>

          <!-- Valor mínimo do imóvel procurado -->
          <select class="selection opcoes" name="valor_minimo">
            <option value="">Preço mínimo desejado:</option>
            <option value="5000">5.000€</option>
            <option value="10000">10.000€</option>
            <option value="20000">20.000€</option>
            <option value="30000">30.000€</option>
            <option value="40000">40.000€</option>
            <option value="50000">50.000€</option>
            <option value="60000">60.000€</option>
            <option value="70000">70.000€</option>
            <option value="70000">80.000€</option>
            <option value="90000">90.000€</option>
            <option value="100000">100.000€</option>
            <option value="110000">110.000€</option>
            <option value="120000">120.000€</option>
            <option value="130000">130.000€</option>
            <option value="140000">140.000€</option>
            <option value="150000">150.000€</option>
            <option value="160000">160.000€</option>
            <option value="170000">170.000€</option>
            <option value="180000">180.000€</option>
            <option value="190000">190.000€</option>
            <option value="200000">200.000€</option>
            <option value="250000">250.000€</option>
            <option value="300000">300.000€</option>
            <option value="350000">350.000€</option>
            <option value="400000">400.000€</option>
            <option value="450000">450.000€</option>
            <option value="500000">500.000€</option>
            <option value="600000">600.000€</option>
            <option value="700000">700.000€</option>
            <option value="800000">800.000€</option>
            <option value="900000">900.000€</option>
            <option value="1000000">1.000.000€</option>
          </select>

          <!-- Valor máximo do imóvel procurado -->
          <select class="selection opcoes" name="valor_maximo">
            <option value="">Preço máximo desejado:</option>
            <option value="10000">10.000€</option>
            <option value="15000">15.000€</option>
            <option value="20000">20.000€</option>
            <option value="25000">25.000€</option>
            <option value="30000">30.000€</option>
            <option value="35000">35.000€</option>
            <option value="40000">40.000€</option>
            <option value="45000">45.000€</option>
            <option value="50000">50.000€</option>
            <option value="60000">60.000€</option>
            <option value="70000">70.000€</option>
            <option value="80000">80.000€</option>
            <option value="90000">90.000€</option>
            <option value="100000">100.000€</option>
            <option value="120000">120.000€</option>
            <option value="140000">140.000€</option>
            <option value="160000">160.000€</option>
            <option value="180000">180.000€</option>
            <option value="200000">200.000€</option>
            <option value="240000">240.000€</option>
            <option value="260000">260.000€</option>
            <option value="300000">300.000€</option>
            <option value="320000">320.000€</option>
            <option value="340000">340.000€</option>
            <option value="360000">360.000€</option>
            <option value="380000">380.000€</option>
            <option value="400000">400.000€</option>
            <option value="440000">440.000€</option>
            <option value="480000">480.000€</option>
            <option value="520000">520.000€</option>
            <option value="580000">580.000€</option>
            <option value="620000">620.000€</option>
            <option value="660000">660.000€</option>
            <option value="700000">700.000€</option>
            <option value="750000">750.000€</option>
            <option value="800000">800.000€</option>
            <option value="850000">850.000€</option>
            <option value="900000">900.000€</option>
            <option value="950000">950.000€</option>
            <option value="1000000">1.000.000€</option>
            <option value="2000000">2.000.000€</option>
            <option value="3000000">3.000.000€</option>
            <option value="">+5.000.000€</option>
          </select>
        </div>

          <!-- Botão que permite filtrar os resultados -->
          <button type="button" id="btn_filter" name="filter"><img src="images/icons/filter.png"/>Filtrar resultados</button>

        </div>
      </div>
    </form>
  </div>

      <!-- Login e registo tanto para o lado do cliente como para o lado do servidor -->
      <div class="user_box">

      <!-- <?php

      /* Caso o utilizador seja um cliente,
      * o seguinte bloco de código é ativado e
      * o utlizador entra no seu perfil de cliente */
      if (isset($_SESSION['cliente'])){

        ?>

          <a href="area_cliente.php"><button class="user_status verificar_visitas">Verificar visitas</button></a>
          <a href="editar_cliente.php"><button class="user_status">Editar dados</button></a>
          <a href="?acao=logout"><button class="user_status">Logout</button></a>

        <?php

        /* Caso o utilizador faça parte da administração,
        * o seguinte bloco de código é ativado e o utilizador
        * entra na área administrativa */
      } elseif(isset($_SESSION['admin'])) {

        ?>

        <a href="administrator/log_in.php"><button  class="user_status">Área Administrativa</button></a>
        <a href="administrator/admin.php?acao=logout"><button class="user_status">Logout</button></a>

        <?php

      /* Caso o utilizador não se encontre com sessão iniciada no website
      * ou não possua conta é apresentado com as opções predefinidas de Login
      * e Registo */
      } else {

        ?> -->

        <div class="login_registo">
          <button id="modalBtn" class="user_status">Login</button>
          <a href="registar.php"><button id="registarBtn" class="user_status">Registo</button></a>

      <!-- <?php } ?> -->

      </div>
    </div>

      <!-- Módulo de Login -->
      <div id="modal" class="modal">

        <div class="modal-content">

          <div class="modal_header">
              <h2>Acesso à área de cliente</h2>
              <span class="closeBtn">&times;</span>
          </div>

          <div class="modal_body">
            <form class="login" action="login_ok.php" method="post">
              <input type="email" name="mail" placeholder="Introduza o seu email">
              <input type="password" name="password" placeholder="Introduza a sua palavra-passe">
              <input type="submit" value="Iniciar sessão">
            </form>

          <div class="modal_footer">
            <h3>Ainda não possui conta? <a class="opcao_registo" href="registar.php">Registe-se agora!</a></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="featured_box1">

      <h1 class="titulo_geral text-center">Formulário de registo</h1>

      <div class="formulario_criar_conta">

        <form class="" action="" method="POST">

          <!-- Inserir nome próprio -->
          <div class="nome label_registo">
            <div>
              <p>Nome próprio:</p>
              <input type="text" name="nome" value="">

            </div>

          <!-- Inserir sobrenome -->
          <div class="sobrenome label_registo">
            <p>Sobrenome:</p>
            <input type="text" name="sobrenome" value="">
          </div>
        </div>

          <!-- Inserir email -->
          <div class="mail label_registo">
            <p>E-mail:</p>
            <input type="email" name="mail" value="">
            <!-- <?php echo "$err_username"; ?> -->
          </div>

          <!-- Inserir password -->
          <div class="password label_registo">
            <div>
              <p>Password:</p>
              <input type="password" name="password" value="">
              <!-- <?php echo "$err_password"; ?> -->
            </div>

            <!-- Inserir confirmação da password -->
            <div>
              <p>Confirmar Password:</p>
              <input type="password" name="retype" value="">
              <!-- <?php echo "$err_password"; ?> -->
            </div>
          </div>

          <!-- Inserir contacto telefónico -->
          <div class="contacto label_registo">
            <p for="numero">Contacto telefónico:</p>
            <input type="number" name="numero" value="">
            <!-- <?php echo "$err_numero"; ?> -->
          </div>

          <!-- Inserir localização -->
          <div class="local label_registo">
            <div>

              <select class="opcoes" name="ilha" id="reg_ilha" onchange="functionConcelho(this.id,'reg_concelho') ">
              <option value="">Ilha em que reside:</option>

              <!-- <?php

              $file = fopen("data/pesquisa/ilha.csv", "r");

              while (!feof($file)) {

                $ilha = fgetcsv($file, 0, ";");

                  if($ilha[0]=="")
                  break;

                  echo '<option value="'.$ilha[1].'">'.$ilha[0].'</option>';
              }

              fclose($file);

              ?> -->

            </select>

              <!-- <?php echo "<br>" . "$err_ilha"; ?> -->
            </div>

          <div>

              <!-- Inserir o concelho -->
              <select class="opcoes" name="concelho" id="reg_concelho" onchange="functionFreguesia(this.id,'reg_freguesia')">
                <option value="">Concelho em que reside:</option>
              </select>
              <!--<input type="text" name="concelho" value="<?php /*echo $concelho;*/ ?>"
              <?php /*echo "$err_concelho";*/ ?>-->
            </div>

            <div class="form-group">
              <select class="opcoes" name="freguesia" id="reg_freguesia" >
                <option value="">Freguesia em que reside:</option>
              </select>
              <!--<input type="text" name="freguesia" value="<?php /*echo $freguesia;*/ ?>">
              <?php /*echo "$err_freguesia"*/; ?>-->
            </div>
          </div>

          <!-- Submeter formulário -->
          <div class="criar_conta">
            <input class="submeter_form" type="submit" value="Criar conta">
          </div>

        </form>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <p class="texto_footer"> &#169; Azores Property 2018</p>
      <hr class="separador"></hr>
      <div class="media_icons">
        <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="#"><i class="fas fa-phone-square fa-2x"></i></a>
        <a href="#"><i class="fas fa-envelope-square fa-2x"></i></i></a>
      </div>
    </div>



    <!-- JavaScript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/pesquisa.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/popup.js"></script>

  </body>
</html>
