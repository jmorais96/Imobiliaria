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
