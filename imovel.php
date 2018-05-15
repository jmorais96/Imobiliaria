

<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/pesquisa.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>

<body>

  <div class="header">
    <div class="icon">
      <img id="icon" src="images/home-icon-green.svg"/>
      <p id="homeIconName"><b>Imobiliária</b>XPTO</p>
    </div>
    <div class="navItems">
      <a href="index.php"><p id="navItem">HOME</p></a>
      <?php
      if(isset($_SESSION['user'])) {
        echo '<a href="area_cliente.php"><p id="navItem">ÁREA DE CLIENTE</p></a>
                <a href="logout.php"><p id="navItem">LOGOUT</p></a>';
      } else {
        echo '<a href="register.php"><p id="navItem">REGISTAR</p></a>
            <a href="login.php"><p id="navItem">LOGIN</p></a>';
      }
      ?>
    </div>
    <div class="phone">
      <img id="phoneIcon" src="images/call-answer.svg"/>
      <p id="phone">296 012 345</p>
    </div>
  </div>


  <div class="container_index">
    <h3>Resultado da Pesquisa</h3>
    <div id="caixas_pesquisa">
            <div class="pesquisa_grande">
                <img id="image" src="images/imoveis/foto">
                <h4>concelho</h4>
                <h6>tipologia</h6>
            </div>
    </div>

    <div id="sub_container">
      <div id="sobre">
            <!--preço-->
            <h1><br>preco<br></h1>
            <h3>Descrição:<br></h3>
             <h5><br>descricao<br></h5>
            <h5>
            Finalidade: finalidade<br>
            Tipo de imóvel: $tipo<br>
            Distrito: Ilha de ilha<br>
            Concelho: concelho ?><br>
            Freguesia: freguesia<br>
            Vendedor: nomeGestor .' '. $apelidoGestor<br>
            <br>
            </h5>
      </div>

      <div id="caixa_formulario">
          <div id="formulario">
              <form action="" method="POST">
                  <!--formulario-->
                   <h3>Marque a sua visita!<br></h3>

                   Contacto: <input id="field" type="number" name="phone" placeholder="Contacto Telefónico"><br>
                   <label> err_phone</label>

                    *Dia: <input id="field" type="date" name="dia" placeholder="ex:18/09/2018"><br>
                    <label> err_dia  </label>

                    *Hora: <input id="field" type="time" name="hora" placeholder="EX: 19:53"><br>
                    <label> err_hora  </label>

                    <input id="button_send" type="submit" value="Enviar" name="visita">
                    </form>

                    <h5>* Envie-nos a sua sugestão para avaliarmos disponilidade. Entraremos em contacto consigo o mais breve possível.</h5>
              </form>
            </div>
      </div>
    </div>
    </div>

  <div class="footer">
    <div class="icon">
      <img id="icon" src="images/home-icon-white.svg"/>
      <p id="name"><b>Imobiliária</b>XPTO</p>
    </div>
    <div class="address">
      <p id="address">Rua da Igreja, 25</p>
    </div>
  </div>

</body>

</html>
