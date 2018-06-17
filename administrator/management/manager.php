<?php
  
  require_once('../../assets/logout.php');
  if (!isset($_POST['funcionario'])) {
    header("location:../index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">Azores Property | Gestão de conteúdos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media='screen and (min-width: 260px) and (max-width: 767px)' href="../../css/mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 768px) and (max-width: 1100px)' href="../../css/tablet.css"/>
    <link rel="stylesheet" media='screen and (min-width: 1101px)' href="../../css/admin_desktop-property.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
  </head>
  <body>
    <div class="nav_box">
      <div class="logo_box">
        <a href="../../index.php"><img src="../../images/logo.png" alt=""></a>
      </div>
      <div class="backend_admin">
        <h1>Gestão de conteúdos</h1>
      </div>
      <div class="user_box">
        <a href="?acao=logout"><button class="user_status">Logout</button></a>
      </div>
    </div>
    <div class="nav_holder">
    </div>
    <div class="admin_container">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Imóveis</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Adicionar imóveis</button>
      <button class="tablinks" onclick="openCity(event, 'Tokio')">Visitas</button>
    </div>
    <div id="London" class="tabcontent">
        <div class="management">

          <div class="thumbnail_management">
            <div class="thumb_img_management">
              <a href="../../p_imovel.php?id=<?php echo $data[0]; ?>"><img src="../../imoveis/<?php echo $data[0] ?>/<?php echo $data[0] ?>_0.jpg" class="img_pesquisa_m" alt=""></a>
                        </div>
            <div class="thumbnail_info_management">
              <p><?php echo $data[1] ?> - <?php echo $data[2] ?></p>
              <p><?php echo $data_ilha[0] ?> - <?php echo $data_concelho[0] ?> - <?php echo $data_freguesia[0] ?></p>
              <p><?php echo $data[6] ?></p>
              <p><?php echo substr($data[9],0,25)."..."; ?></p>
              <p><?php echo $data[7] ?></p>
            </div>
            <div class="buttons_management">
              <a href="propor.php?id=<?php echo $data[0]; ?>"> <button class="ask_for_feature"type="button" name="button">Propor a destaque</button></a>
              <a href="../../edicao_imovel.php?id=<?php echo $data[0]; ?>"><button class="edit" type="button" name="button">Editar</button></a>
              <a href="../../eliminar_imovel.php?id=<?php echo $data[0]; ?>"><button class="delete" type="button" name="button">Eliminar</button></a>

              <button class="visits_noti">visitas(<?php echo count($visitas); ?>)</button>
              <div class="notifications_box1">
                <div class="notification1">
                  <p><?php echo $data_cli[1]." ".$data_cli[2] ; ?>, quer visitar este imóvel dia <?php echo "$value1[4]"; ?> às <?php echo "$value1[5]";  ?></p>
                  <div id="visit_aprovation">
                    <button type="button" class="aprove_visit"> <a href="aceitar_visita.php?id=<?php echo $value1[0]; ?>">v</a></button>
                    <button type="button" class="disaprove_visit"><a href="negar_visita.php?id=<?php echo $value1[0]; ?>">x</a></button>
                  </div>
                </div>
          </div>
      </div>
    <div id="Paris" class="tabcontent">
        <form class="add_property" action="" method="post" enctype="multipart/form-data" >
          <div class="add_prop_box">
          <div><label>Finalidade</label></div>
              <select  name="finalidade">
                <option value="">Finalidade</option>
                <option value="arrendar">arrendar</option>
                <option value="comprar">comprar</option>
              </select>
            </div>
          <div class="add_prop_box">
          <div><label>Tipo de imóvel</label></div>
            <select  name="tipo_imovel" id="tipo_de_imovel" onchange="functionTipologia(this.id, 'tipologia')">
              <option value="">Tipo de imóvel</option>
              <option value="Terreno">Terrenos</option>
              <option value="Apartamento">Apartamentos</option>
              <option value="Moradia">Moradias</option>
              <option value="Quinta">Quintas</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Tipologia</label></div>
            <select  name="tipologia" id="tipologia">
              <option value="">Tipologia</option>
              <option value="T0">T0</option>
              <option value="T1">T1</option>
              <option value="T2">T2</option>
              <option value="T3">T3</option>
              <option value="T4">T4</option>
              <option value="T5">T5</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Ilha</label></div>
            <select  name="ilha" id="ilha" onchange="functionConcelho(this.id,'concelho')">
              <option value="">Ilha</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Concelho</label></div>
            <select  name="concelho" id="concelho" onchange="functionFreguesia(this.id,'freguesia')">
              <option value="Concelho">concelho</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Freguesia</label></div>
            <select  name="freguesia" id="freguesia">
              <option value="Freguesia">freguesia</option>
            </select>
          </div>
        <div class="add_prop_box">
          <div><label>Morada</label></div><input type="text" name="morada" value="morada"/>
        </div>
      <div class="add_prop_box">
          <div><label>Valor</label></div><input type="number" name="valor" value="valor"/>
        </div>
      <div class="add_prop_box">
          <div><label>Descrição do imovel</label></div><textarea name="descricao" value="descrição"/></textarea>
        </div>
      <div class="add_prop_box">
          <div><label>Destaque na homepage</label></div><input type="checkbox" name="featured" value="featured"/>
        </div>
      <div class="add_prop_box">
          <div><label>Imagem(s)</label></div><br><input type="file" name="img[]" accept="image/*" multiple>
        </div>
      <div class="add_prop_box">
          <input type="submit" value="criar"/>
        </div>
        </form>
    </div>
    <div id="Tokio" class="tabcontent">

    </div>
    </div>

    <script src="../../js/admin_container.js"></script>
    <script src="../../js/filter.js"></script>
    <script src="../../js/popup.js"></script><!-- Script para login -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
    $(document).on("click", ".visits_noti", function(event){
        event.preventDefault();
        $(this).next('.notifications_box1').toggle();
    });

    </script>
  </body>
</html>
