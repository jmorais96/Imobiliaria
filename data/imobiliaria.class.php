<?php
  require_once('database.class.php');


  class imobiliaria extends Database {

    public function destaque($sql='select * from imoveisdestacados', $campos=[]){
      //var_dump($campos);
      //echo "<script> alert('here'); </script>";
      $pesquisa=$this->query($sql,$campos);
      //echo " clearOverlays(); ";

        foreach ($pesquisa as $id) {

          $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
          $finalidade=$this->query($sql, array('idFinalidade' =>$id['finalidade'] ));

          $sql='select * from tipo_imovel where idTipoImovel = :tipoImovel';
          $tipoImovel=$this->query($sql, array('tipoImovel' =>$id['tipoImovel'] ));

          // var_dump($tipoImovel);

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => $id['idFreguesia']));

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

          if ($pesquisa[0]['tipologia']!=NULL) {
            $sql='select tipologia from tipologia where idTipologia = :idTipologia';
            $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
          }else {
            $tipologia[0]['tipologia']=NULL;
          }

          $sql='select destacado from destaque where idImovel = :idImovel';
          $destaque=$this->query($sql, array('idImovel' => $id['idImovel']));

          $imagens=$this->getImagens($pesquisa[0]['idImovel']);
          //var_dump($imagens);
          $imoveis[] = new imovel($id['idImovel'],
          $id['gestor'],
          $finalidade[0]['finalidade'],
          $tipoImovel[0]['tipoImovel'],
          $id['area'],
          $id['preco'],
          $id['descricao'],
          $id['rua'],
          $id['codPostal'],
          $id['lat'],
          $id['long'],
          $ilha[0]['ilha'],
          $concelho[0]['concelho'],
          $freguesia[0]['freguesia'],
          $id['situacao'],
          $id['estado'],
          $tipologia[0]['tipologia'],
          $id['quartos'],
          $id['casasBanho'],
          $id['garagem'],
          $id['piscina'],
          $id['mobilia'],
          $id['dataConstrucao'],
          $id['informacao'],
          $imagens,
          $destaque[0]['destacado'],
          $tipoImovel[0]['iconMarcador'] );

        }

        //var_dump($id);


        for ($i=0; $i < count($imoveis) ; $i++) {
          $imoveis[$i]->addMarker();
        }


    }

    public function pesquisa($sql='SELECT * FROM todosimoveis', $campos=[]){
      //var_dump($campos);
      //echo "<script> alert('here'); </script>";
      $pesquisa=$this->query($sql,$campos);
      //echo " clearOverlays(); ";

        foreach ($pesquisa as $id) {

          $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
          $finalidade=$this->query($sql, array('idFinalidade' =>$id['finalidade'] ));

          $sql='select * from tipo_imovel where idTipoImovel = :tipoImovel';
          $tipoImovel=$this->query($sql, array('tipoImovel' =>$id['tipoImovel'] ));

          // var_dump($tipoImovel);

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => $id['idFreguesia']));

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

          if ($pesquisa[0]['tipologia']!=NULL) {
            $sql='select tipologia from tipologia where idTipologia = :idTipologia';
            $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
          }else {
            $tipologia[0]['tipologia']=NULL;
          }

          $sql='select destacado from destaque where idImovel = :idImovel';
          $destaque=$this->query($sql, array('idImovel' => $id['idImovel']));
          if (isset($destaque[0])) {
            $destacado=1;
          }else {
            $destacado=0;
          }

          $imagens=$this->getImagens($pesquisa[0]['idImovel']);
          //var_dump($imagens);
          $imoveis[] = new imovel($id['idImovel'],
          $id['gestor'],
          $id['finalidade'],
          $tipoImovel[0]['tipoImovel'],
          $id['area'],
          $id['preco'],
          $id['descricao'],
          $id['rua'],
          $id['codPostal'],
          $id['lat'],
          $id['long'],
          $ilha[0]['ilha'],
          $concelho[0]['concelho'],
          $freguesia[0]['freguesia'],
          $id['situacao'],
          $id['estado'],
          $tipologia[0]['tipologia'],
          $id['quartos'],
          $id['casasBanho'],
          $id['garagem'],
          $id['piscina'],
          $id['mobilia'],
          $id['dataConstrucao'],
          $id['informacao'],
          $imagens,
          $destacado,
          $tipoImovel[0]['iconMarcador'] );

        }
        foreach ($imoveis as $value) {
          $resultado[]=$value->toMarker();
        }

        echo json_encode($resultado);


    }


    public function imoveisGestor($id){

      $sql='select * from todosimoveis where gestor = :idGestor ';
      $pesquisa=$this->query($sql, array('idGestor' => $id));

      //var_dump($pesquisa);

        foreach ($pesquisa as $id) {

          $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
          $finalidade=$this->query($sql, array('idFinalidade' =>$id['finalidade'] ));

          $sql='select * from tipo_imovel where idTipoImovel = :tipoImovel';
          $tipoImovel=$this->query($sql, array('tipoImovel' =>$id['tipoImovel'] ));

          // var_dump($tipoImovel);

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => $id['idFreguesia']));

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

          if ($pesquisa[0]['tipologia']!=NULL) {
            $sql='select tipologia from tipologia where idTipologia = :idTipologia';
            $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
          }else {
            $tipologia[0]['tipologia']=NULL;
          }

          $sql='select destacado from destaque where idImovel = :idImovel';
          $destaque=$this->query($sql, array('idImovel' => $id['idImovel']));
          if (isset($destaque[0])) {
            $destacado=0;
          }else {
            $destacado=1;
          }

          $imagens=$this->getImagens($id['idImovel']);
          //var_dump($imagens);
          $imoveis[] = new imovel($id['idImovel'],
          $id['gestor'],
          $id['finalidade'],
          $tipoImovel[0]['tipoImovel'],
          $id['area'],
          $id['preco'],
          $id['descricao'],
          $id['rua'],
          $id['codPostal'],
          $id['lat'],
          $id['long'],
          $ilha[0]['ilha'],
          $concelho[0]['concelho'],
          $freguesia[0]['freguesia'],
          $id['situacao'],
          $id['estado'],
          $tipologia[0]['tipologia'],
          $id['quartos'],
          $id['casasBanho'],
          $id['garagem'],
          $id['piscina'],
          $id['mobilia'],
          $id['dataConstrucao'],
          $id['informacao'],
          $imagens,
          $destaque,
          $tipoImovel[0]['iconMarcador'] );

        }

        return $imoveis;

    }

    public function getImovel($id){

      $sql="SELECT * FROM todosimoveis where idImovel= :idImovel";
      $idImovel= array('idImovel' => $id );
      $pesquisa=$this->query($sql,$idImovel);
      //var_dump($pesquisa);

      $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
      $finalidade=$this->query($sql, array('idFinalidade' => $pesquisa[0]['finalidade']));

      $sql='select * from tipo_imovel where idTipoImovel = :idTipoImovel';
      $tipoImovel=$this->query($sql, array('idTipoImovel' => $pesquisa[0]['tipoImovel']));

      $sql='select * from freguesia where idFreguesia = :idFreguesia';
      $freguesia=$this->query($sql, array('idFreguesia' => $pesquisa[0]['idFreguesia']));
      $sql='select * from concelho where idConcelho = :idConcelho';
      $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

      $sql='select * from ilha where idIlha = :idIlha';
      $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

      if ($pesquisa[0]['tipologia']!=NULL) {
        $sql='select tipologia from tipologia where idTipologia = :idTipologia';
        $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
      }else {
        $tipologia[0]['tipologia']=NULL;
      }


      $sql='select destacado from destaque where idImovel = :idImovel';
      $destaque=$this->query($sql, array('idImovel' => $id));
      if (isset($destaque[0])) {
        $destacado=0;
      }else {
        $destacado=1;
      }

      $imagens=$this->getImagens($pesquisa[0]['idImovel']);

      $imovel = new imovel($pesquisa[0]['idImovel'],
      $pesquisa[0]['gestor'],
      $finalidade[0]['finalidade'],
      $tipoImovel[0]['tipoImovel'],
      $pesquisa[0]['area'],
      $pesquisa[0]['prgetvisieco'],
      $pesquisa[0]['descricao'],
      $pesquisa[0]['rua'],
      $pesquisa[0]['codPostal'],
      $pesquisa[0]['lat'],
      $pesquisa[0]['long'],
      $ilha[0]['ilha'],
      $concelho[0]['concelho'],
      $freguesia[0]['freguesia'],
      $pesquisa[0]['situacao'],
      $pesquisa[0]['estado'],
      $tipologia[0]['tipologia'],
      $pesquisa[0]['quartos'],
      $pesquisa[0]['casasBanho'],
      $pesquisa[0]['garagem'],
      $pesquisa[0]['piscina'],
      $pesquisa[0]['mobilia'],
      $pesquisa[0]['dataConstrucao'],
      $pesquisa[0]['informacao'],
      $imagens,
      $destaque,
      $tipoImovel[0]['iconMarcador'] );

      //var_dump($imovel);
      return $imovel;

    }


    public function getImagens($id){
      $sql='select * from galeria WHERE idImovel = :idImovel';
      //var_dump($id);
      $imagens=$this->query($sql, array('idImovel' => $id ));
      //var_dump($imagens);
      if (count($imagens)>1) {

        foreach ($imagens as $imagem) {
          // var_dump($imagem);
          $img[]=new imagem($imagem['idImagem'], $imagem['idImovel'], $imagem['nomeImagem'], $imagem['descricao']);
        }
        return $img;
      }else {
        return $imagens = new imagem($imagens[0]['idImagem'], $imagens[0]['idImovel'], $imagens[0]['nomeImagem'], $imagens[0]['descricao']);
      }

    }

    public function proporDestaque($id){
        $sql ='INSERT INTO destaque (idImovel, destacado) VALUES(:idImovel, 0 )';
        $this->query($sql, array('idImovel' => $id ));
    }

    public function aceitarDestaque($id){
        $sql ='UPDATE destaque set destacado = 1 where idImovel = :idImovel';
        $this->query($sql, array('idImovel' => $id ));
    }

    public function negarDestaque($id){
        $sql ='DELETE FROM destaque WHERE idImovel = :idImovel';
        $this->query($sql, array('idImovel' => $id ));
    }

    public function imoveisPropostos(){
      $sql='select * from imoveispropostos';
      $pesquisa=$this->query($sql);
      //echo " clearOverlays(); ";

        foreach ($pesquisa as $id) {

          $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
          $finalidade=$this->query($sql, array('idFinalidade' =>$id['finalidade'] ));

          $sql='select * from tipo_imovel where idTipoImovel = :tipoImovel';
          $tipoImovel=$this->query($sql, array('tipoImovel' =>$id['tipoImovel'] ));

          // var_dump($tipoImovel);

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => $id['idFreguesia']));

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

          if ($pesquisa[0]['tipologia']!=NULL) {
            $sql='select tipologia from tipologia where idTipologia = :idTipologia';
            $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
          }else {
            $tipologia[0]['tipologia']=NULL;
          }

          $sql='select destacado from destaque where idImovel = :idImovel';
          $destaque=$this->query($sql, array('idImovel' => $id['idImovel']));

          $imagens=$this->getImagens($pesquisa[0]['idImovel']);
          //var_dump($imagens);
          $imoveis[] = new imovel($id['idImovel'],
          $id['gestor'],
          $finalidade[0]['finalidade'],
          $tipoImovel[0]['tipoImovel'],
          $id['area'],
          $id['preco'],
          $id['descricao'],
          $id['rua'],
          $id['codPostal'],
          $id['lat'],
          $id['long'],
          $ilha[0]['ilha'],
          $concelho[0]['concelho'],
          $freguesia[0]['freguesia'],
          $id['situacao'],
          $id['estado'],
          $tipologia[0]['tipologia'],
          $id['quartos'],
          $id['casasBanho'],
          $id['garagem'],
          $id['piscina'],
          $id['mobilia'],
          $id['dataConstrucao'],
          $id['informacao'],
          $imagens,
          $destaque[0]['destacado'],
          $tipoImovel[0]['iconMarcador'] );

        }
        if (isset($imoveis)){
          return $imoveis;
        }


    }

    public function imoveisDestacados(){
      $sql='select * from imoveisdestacados';
      $pesquisa=$this->query($sql);
      //echo " clearOverlays(); ";

        foreach ($pesquisa as $id) {

          $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';
          $finalidade=$this->query($sql, array('idFinalidade' =>$id['finalidade'] ));

          $sql='select * from tipo_imovel where idTipoImovel = :tipoImovel';
          $tipoImovel=$this->query($sql, array('tipoImovel' =>$id['tipoImovel'] ));

          // var_dump($tipoImovel);

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => $id['idFreguesia']));

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => $freguesia[0]['idConcelho']));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => $concelho[0]['idIlha']));

          if ($pesquisa[0]['tipologia']!=NULL) {
            $sql='select tipologia from tipologia where idTipologia = :idTipologia';
            $tipologia=$this->query($sql, array('idTipologia' =>$pesquisa[0]['tipologia']));
          }else {
            $tipologia[0]['tipologia']=NULL;
          }

          $sql='select destacado from destaque where idImovel = :idImovel';
          $destaque=$this->query($sql, array('idImovel' => $id['idImovel']));

          $imagens=$this->getImagens($pesquisa[0]['idImovel']);
          //var_dump($imagens);
          $imoveis[] = new imovel($id['idImovel'],
          $id['gestor'],
          $finalidade[0]['finalidade'],
          $tipoImovel[0]['tipoImovel'],
          $id['area'],
          $id['preco'],
          $id['descricao'],
          $id['rua'],
          $id['codPostal'],
          $id['lat'],
          $id['long'],
          $ilha[0]['ilha'],
          $concelho[0]['concelho'],
          $freguesia[0]['freguesia'],
          $id['situacao'],
          $id['estado'],
          $tipologia[0]['tipologia'],
          $id['quartos'],
          $id['casasBanho'],
          $id['garagem'],
          $id['piscina'],
          $id['mobilia'],
          $id['dataConstrucao'],
          $id['informacao'],
          $imagens,
          $destaque[0]['destacado'],
          $tipoImovel[0]['iconMarcador'] );

        }

        if (isset($imoveis)){
          return $imoveis;
        }


    }


    public function selectFinalidade(){
      echo(" <option value=''>Finalidade pretendida</option>");
      $sql='select * from finalidade';
      $finalidade=$this->query($sql);
      foreach ($finalidade as $value) {
        echo("<option value=".$value['idFinalidade']."   id='index'>".utf8_decode($value['finalidade'])."</option>");
      }

    }

    public function selectTipoImovel(){
      echo("<option value=''>Tipo de imóvel</option>");
      $sql='select * from tipo_imovel';
      $tipoImovel=$this->query($sql);
      foreach ($tipoImovel as $value) {
        echo("<option value=".$value['idTipoImovel']."   id='index'>".utf8_decode($value['tipoImovel'])."</option>");
      }

    }

    public function selectTipologia(){
      echo("<option value=''>Tipologia</option>");
      $sql='select * from tipologia';
      $tipologia=$this->query($sql);
      foreach ($tipologia as $value) {
        echo("<option value=".$value['idTipologia']."   id='index'>".utf8_decode($value['tipologia'])."</option>");
      }

    }

    public function selectIlha(){
      echo("<option value=''>Selecione uma ilha</option>");
      $sql='select * from ilha';
      $ilha=$this->query($sql);
      foreach ($ilha as $value) {
        echo("<option value=".($value['idIlha'])."   id='index'>".
        ($value['ilha']) ."</option>");
      }

    }

    public function selectConcelho($ilha){
      $sql='select * from concelho where idIlha = :idIlha';
      $ilha=  array('idIlha' => utf8_encode($ilha));
      $concelho=$this->query($sql, $ilha);
      echo("<option >Selecione um concelho</option>");
      foreach ($concelho as $value) {
        echo("<option value=".($value['idConcelho'])."   id='index'>".($value['concelho'])."</option>");

      }
    }

    public function selectFreguesia($concelho){
      $sql='select * from freguesia where idconcelho = :idConcelho';
      $concelho=  array('idConcelho' => utf8_encode($concelho));
      $freguesia=$this->query($sql, $concelho);
      echo("<option >Selecione uma freguesia</option>");
      foreach ($freguesia as $value) {
        echo("<option value=".($value['idFreguesia'])."   id='index'>".($value['freguesia'])."</option>");
      }
    }

    public function mailClienteExists($mail){
      $sql='select count(*) from utilizador where email = :email';
      $mail=  array('email' => utf8_encode($mail));
      $mail=$this->query($sql, $mail);
      //var_dump($mail);
      foreach ($mail[0] as $value) {
        if ($value==0) {
          return false;
        }else {
          return true;
        }
      }
    }

    public function registarCliente($mail, $nome, $sobrenome, $pass, $contact, $ilha, $concelho, $freguesia){
      $sql ='INSERT INTO utilizador (email, nomeProprio, sobrenome, password, contacto, idFreguesia) VALUES(:email, :nomeProprio, :sobrenome, :password, :contacto, :idFreguesia)';
      $arr = array('email' => ($mail) , 'nomeProprio' => ($nome), 'sobrenome' => ($sobrenome), 'password' => (md5($pass)), 'contacto' => ($contact), 'idFreguesia' => ($freguesia));
      $this->query($sql, $arr);
      //echo $mail;

      $sql ='SELECT idUser from utilizador order by email desc limit 1';
      //echo $sql;
      $idUser=$this->query($sql);
      //var_dump($idUser);
      //echo $idUser[0]['idUser'];

      $sql='select ilha from ilha where idIlha = :idIlha';
      $ilha = array('idIlha' => $ilha);
      $ilha=$this->query($sql, $ilha);

      $sql='select concelho from concelho where idConcelho = :idConcelho';
      $concelho = array('idConcelho' => $concelho);
      $concelho=$this->query($sql, $concelho);

      $sql='select freguesia from freguesia where idFreguesia = :idFreguesia';
      $freguesia = array('idFreguesia' => $freguesia);
      $freguesia=$this->query($sql, $freguesia);

      $user = new User($idUser[0]['idUser'], $mail, $nome, $sobrenome, $pass, $contact, $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia']);

      return $user;

    }

    public function loginCliente($email,$password){
      $sql = 'SELECT * FROM utilizador WHERE email = :email AND password = :password';
      $login = array('email' => utf8_encode($email), 'password' => utf8_encode(md5($password)));
      $info=$this->query($sql, $login);
      if (isset($info[0]["idUser"])) {


        $sql='select * from freguesia where idFreguesia = :idFreguesia';
        $freguesia=$this->query($sql, array('idFreguesia' => utf8_encode($info[0]['idFreguesia'])));
        //var_dump($freguesia);

        $sql='select * from concelho where idConcelho = :idConcelho';
        $concelho=$this->query($sql, array('idConcelho' => utf8_encode($freguesia[0]['idConcelho'])));

        $sql='select * from ilha where idIlha = :idIlha';
        $ilha=$this->query($sql, array('idIlha' => utf8_encode($concelho[0]['idIlha'])));


        $user = new User($info[0]["idUser"], $info[0]["email"], $info[0]["nomeProprio"], $info[0]["sobrenome"], $info[0]["password"], $info[0]["contacto"],
         $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia']);

        return $user;

      }else {
        echo "<script> alert('Não existe um utilizador com este email e password') </script>";
      }
    }



    public function loginFuncionario($email,$password){
      $sql = 'SELECT * FROM funcionario WHERE email = :email AND password = :password';
      $login = array('email' => utf8_encode($email), 'password' => utf8_encode(md5($password)));
      $info=$this->query($sql, $login);
      if(isset($info[0]["idFuncionario"])){
        $sql='select * from tipo_user where idTipoUser = :idTipoUser';
        $tipoFuncionario=$this->query($sql, array('idTipoUser' => utf8_encode($info[0]['tipoUser'])));
        //var_dump($tipoFuncionario);
        return new funcionario(utf8_decode($info[0]["idFuncionario"]), utf8_decode($info[0]["email"]), utf8_decode($info[0]["password"]), utf8_decode($info[0]["nomeProprio"]), utf8_decode($info[0]["sobrenome"]),
         utf8_decode($info[0]["contacto"]), utf8_decode($tipoFuncionario[0]['tipo']));
      }else {
        echo "<script> alert('Não existe um funcionário com estes dados') </script>";
      }

    }

    public function updateCliente($campos){
      $sql="UPDATE utilizador SET email = :email, nomeProprio = :nomeProprio, sobrenome = :sobrenome, password = :password, contacto = :contacto, idFreguesia = :idFreguesia  WHERE idUser = :idUser";
      $this->query($sql,$campos);
    }

      public function getAllUsers(){
          $stmt = $this->query('SELECT * FROM funcionario');
          //var_dump($stmt);
          foreach ($stmt as $row) {
            $uid = $row['idFuncionario'];
            return $uid;
          }

      }

      public function getUsers($idUser){
          $sql = 'SELECT * FROM utilizador where idUser= :idUser';
          $info=$this->query($sql, array('idUser' =>$idUser ));

          $sql='select * from freguesia where idFreguesia = :idFreguesia';
          $freguesia=$this->query($sql, array('idFreguesia' => utf8_encode($info[0]['idFreguesia'])));
          //var_dump($freguesia);

          $sql='select * from concelho where idConcelho = :idConcelho';
          $concelho=$this->query($sql, array('idConcelho' => utf8_encode($freguesia[0]['idConcelho'])));

          $sql='select * from ilha where idIlha = :idIlha';
          $ilha=$this->query($sql, array('idIlha' => utf8_encode($concelho[0]['idIlha'])));


          return new User($info[0]["idUser"], $info[0]["email"], $info[0]["nomeProprio"], $info[0]["sobrenome"], $info[0]["password"], $info[0]["contacto"],
           $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia']);

      }

      public function registarVisita($idUser, $dia, $hora, $imovel){
        $sql ='INSERT INTO visita (user, idImovel, dataVisita, estadoVisita) VALUES(:user, :idImovel, :dataVisita, :estadoVisita)';
        $dia = $dia . " " . $hora;
        $arr = array('user' => utf8_encode($idUser) , 'idImovel' => utf8_encode($imovel->getIdImovel()), 'dataVisita' => utf8_encode($dia), 'estadoVisita' => ("Em apreciação"));
        //var_dump($arr);
        $this->query($sql, $arr);
      }


      public function getVisitasUser($user){
        $sql="SELECT * FROM visita WHERE user = :idUser";
        $arr = array('idUser' => utf8_decode($user->getIdUser()));
        foreach ($this->query($sql, $arr) as $value) {
          $imovel=$this->getImovel($value['idImovel']);
          $visitas[] = new visita($value['idVisita'], $_SESSION['cliente'], $imovel, $value['dataVisita'], $value['estadoVisita']);
        }
        return $visitas;
      }

      public function getVisitasPendenteImovel($imovel){
        $sql="SELECT * FROM visita WHERE idImovel = :idImovel AND estadoVisita = 'Em apreciação'";
        $arr = array('idImovel' => utf8_decode($imovel->getIdImovel()));
        $visitas=[];
        foreach ($this->query($sql, $arr) as $value) {
          $imovel=$this->getImovel($value['idImovel']);
          $user=$this->getUsers($value['user']);
          $visitas[] = new visita($value['idVisita'], $user, $imovel, $value['dataVisita'], $value['estadoVisita']);
        }
        return $visitas;
      }

      
      public function getVisitasPendentes($gestor){
        $sql="SELECT * FROM visita WHERE estadoVisita = 'Em apreciaÃ'";
        $visitas=[];
        foreach ($this->query($sql) as $value) {
          $imovel=$this->getImovel($value['idImovel']);
          if ($imovel->getGestor()==$_SESSION['funcionario']->getIdFuncionario()) {
            $user=$this->getUsers($value['user']);
            $visitas[] = new visita($value['idVisita'], $user, $imovel, $value['dataVisita'], $value['estadoVisita']);
          }

        }
        return $visitas;
      }
      
      public function getVisitasAceites($gestor){
        $sql="SELECT * FROM visita WHERE estadoVisita = 'Aceite'";
        $visitas=[];
        foreach ($this->query($sql) as $value) {
          $imovel=$this->getImovel($value['idImovel']);
          if ($imovel->getGestor()==$_SESSION['funcionario']->getIdFuncionario()) {
            $user=$this->getUsers($value['user']);
            $visitas[] = new visita($value['idVisita'], $user, $imovel, $value['dataVisita'], $value['estadoVisita']);
          }

        }
        return $visitas;
      }

      public function aceitarVisita($id){
        $sql="UPDATE visita SET estadoVisita = :estadoVisita  WHERE idVisita = :idVisita";
        $this->query($sql, array('estadoVisita' => "Aceite", 'idVisita' => $id ));
      }

      public function negarVisita($id){
        $sql="UPDATE visita SET estadoVisita = :estadoVisita  WHERE idVisita = :idVisita";
        $this->query($sql, array('estadoVisita' => "Não aceite", 'idVisita' => $id ));
      }


      public function registarGestor($mail, $pass, $nome, $sobrenome, $contact){

        $sql = 'SELECT idTipoUser FROM tipo_user WHERE tipo = :tipo';
        $tipo = $this->query($sql, array(":tipo" => "Gestor"));

        $sql ='INSERT INTO funcionario (email, password, nomeProprio, sobrenome, contacto, tipoUser) VALUES(:email, :password, :nomeProprio, :sobrenome, :contacto, :tipoUser)';

        $arr = array('email' => ($mail) , 'password' => md5($pass), 'nomeProprio' => ($nome), 'sobrenome' => ($sobrenome), 'contacto' => ($contact), 'tipoUser' => $tipo[0]['idTipoUser']);
        $this->query($sql, $arr);

        return true;

    }

    public function editarGestor($sql, $campos){

        $this->query($sql, $campos);

    }

    public function mailGestorExists($mail){
      $sql='select count(*) from funcionario where email = :email';
      $mail=  array('email' => utf8_encode($mail));
      $mail=$this->query($sql, $mail);
      //var_dump($mail);
      foreach ($mail[0] as $value) {
        if ($value==0) {
          return false;
        }else {
          return true;
        }
      }
    }

    # Método que permite adicionar imóveis
    public function adicionarImovel($gestor, $finalidade, $tipoImovel, $tipologia, $area, $preco, $descricao, $morada, $codPostal, $lat, $long, $freguesia, $situacao, $estado) {

      $sql_tabela_imovel = 'INSERT INTO imovel(gestor, finalidade, tipoImovel, area, preco, descricao, rua, codPostal, lat, long, idFreguesia, situacao, estado) VALUES(:gestor, :finalidade, :tipoImovel, :area, :preco, :descricao, :morada, :codPostal, :lat, :long, :freguesia, :situacao, :estado)';

      $arr_tabela_imovel = array('gestor' => $gestor , 'finalidade' => $finalidade, 'tipoImovel' => $tipoImovel, 'area' => $area, 'preco' => $preco, 'descricao' => $descricao, 'morada' => $morada, 'codPostal' => $codPostal, 'lat' => $lat, 'long' => $long, 'freguesia' => $freguesia, 'situacao' => $situacao, 'estado' => $estado);
      $this->query($sql_tabela_imovel, $arr_tabela_imovel);

      $sql_tabela_extras = 'INSERT INTO extras(tipologia) VALUES(:tipologia)';
      $arr_tabela_extras = array('tipologia' => $tipologia);

      $this->query($sql_tabela_extras, $arr_tabela_extras);

      return true;

    }

       public function getWorkers(){
        $sql = 'SELECT idTipoUser FROM tipo_user WHERE tipo = :tipo';
        $tipoUser = $this->query($sql, array(":tipo" => "Gestor"));

        $sql="SELECT * FROM funcionario WHERE tipoUser = :tipoUser";
        $workers=$this->query($sql, array(":tipoUser" => $tipoUser[0]["idTipoUser"]));


        foreach ($workers as $worker) {
          $sql = 'SELECT tipo FROM tipo_user WHERE idTipoUser = :idTipoUser';
          $tipoUser = $this->query($sql, array(":idTipoUser" => $worker['tipoUser']));

          $wkr[]=new funcionario($worker['idFuncionario'], $worker['email'],  $worker['password'], $worker['nomeProprio'], $worker['sobrenome'],  $worker['contacto'],  $tipoUser[0]['tipo']);
        }
        return $wkr;

      }

  }

?>
