<?php
  require_once('database.class.php');


  class imobiliaria extends Database {

    public function destaque($sql='select * from imoveisdestacados WHERE situacao = "Ativo"', $campos=[]){
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
          $id['lng'],
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

        if (isset($imoveis)) {
          for ($i=0; $i < count($imoveis) ; $i++) {
            $imoveis[$i]->addMarker();
          }
        }


    }

    public function pesquisa($sql='SELECT * FROM todosimoveis where situacao = "Ativo"', $campos=[]){
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
            $destacado=$destaque[0]['destacado'];
          }else {
            $destacado=NULL;
          }

          $imagens=$this->getImagens($id['idImovel']);
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
          $id['lng'],
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
        if (isset($imoveis)) {
          foreach ($imoveis as $value) {
            $resultado[]=$value->toMarker();
          }
        }else {
          $imovel="";
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
            $destacado=$destaque[0]['destacado'];
          }else {
            $destacado=NULL;
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
          $id['lng'],
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

        if (isset($imoveis)) {
          return $imoveis;
        }


    }

    public function getImovel($id){

      $sql="SELECT * FROM todosimoveis where idImovel= :idImovel";
      $idImovel= array('idImovel' => $id );
      $pesquisa=$this->query($sql,$idImovel);
      //var_dump($pesquisa);
      if (isset($pesquisa[0]['idImovel'])) {

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
          $destacado=$destaque[0]['destacado'];
        }else {
          $destacado=NULL;
        }

        $imagens=$this->getImagens($pesquisa[0]['idImovel']);

        $imovel = new imovel($pesquisa[0]['idImovel'],
        $pesquisa[0]['gestor'],
        $finalidade[0]['finalidade'],
        $tipoImovel[0]['tipoImovel'],
        $pesquisa[0]['area'],
        $pesquisa[0]['preco'],
        $pesquisa[0]['descricao'],
        $pesquisa[0]['rua'],
        $pesquisa[0]['codPostal'],
        $pesquisa[0]['lat'],
        $pesquisa[0]['lng'],
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

     public function editarImovel($finalidade, $tipoImovel, $area, $preco, $descricao, $rua, $codPostal, $lat, $lng, $situacao, $estado, $tipologia, $quartos, $casasBanho, $garagem, $piscina, $mobilia, $dataConstrucao, $informacao, $idImovel){

          $sql = 'UPDATE imovel SET finalidade=:finalidade, tipoImovel=:tipoImovel, area=:area, preco=:preco, descricao=:descricao, rua=:rua, codPostal=:codPostal, lat=:lat, lng=:lng, situacao=:situacao, estado=:estado WHERE idImovel = :idImovel';

        /*$print = */ array('finalidade'=>$finalidade, 'tipoImovel'=>$tipoImovel, 'area'=>$area, 'preco'=>$preco, 'descricao'=>$descricao, 'rua'=>$rua, 'codPostal'=>$codPostal, 'lat'=>$lat, 'lng'=>$lng,  'situacao'=>$situacao,
          'estado'=>$estado, 'idImovel'=>$idImovel);
        // $this->query($sql, $print);
      //   var_dump($print);

         if ($tipologia != NULL){
             $sql = 'UPDATE extras SET tipologia=:tipologia, quartos=:quartos, casasBanho=:casasBanho, garagem=:garagem, piscina=:piscina, mobilia=:mobilia, dataConstrucao=:dataConstrucao, informacao=:informacao WHERE idImovel = :idImovel';

          /* $print2 =*/  array('tipologia'=>$tipologia, 'quartos'=>$quartos, 'casasBanho'=>$casasBanho, 'garagem'=>$garagem, 'piscina'=>$piscina, 'mobilia'=>$mobilia, 'dataConstrucao'=>$dataConstrucao, 'informacao'=>$informacao, 'idImovel'=>$idImovel);
              //$this->query($sql, $print2);
              //var_dump($print2);
         }
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
          $id['lng'],
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
          $id['lng'],
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
        echo("<option value=".$value['idFinalidade']."   id='index'>".($value['finalidade'])."</option>");
      }

    }

    public function selectTipoImovel(){
      echo("<option value=''>Tipo de imóvel</option>");
      $sql='select * from tipo_imovel';
      $tipoImovel=$this->query($sql);
      foreach ($tipoImovel as $value) {
        echo("<option value=".$value['idTipoImovel']."   id='index'>".($value['tipoImovel'])."</option>");
      }

    }

    public function selectTipologia(){
      echo("<option value=''>Tipologia</option>");
      $sql='select * from tipologia';
      $tipologia=$this->query($sql);
      foreach ($tipologia as $value) {
        echo("<option value=".$value['idTipologia']."   id='index'>".($value['tipologia'])."</option>");
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
        return new funcionario(($info[0]["idFuncionario"]), ($info[0]["email"]), ($info[0]["password"]), ($info[0]["nomeProprio"]), ($info[0]["sobrenome"]),
         ($info[0]["contacto"]), ($tipoFuncionario[0]['tipo']));
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
    public function adicionarImovel($campos, $imagens) {
      unset($campos['add_imovel']);
      unset($campos['ilha']);
      unset($campos['concelho']);
      if (isset($campos['featured'])) {
        $destaque=0;
        unset($campos['featured']);
      }

      $sql = 'INSERT INTO imovel (gestor, finalidade, tipoImovel, area, preco, descricao, rua, codPostal, lat, lng, idFreguesia, situacao, estado) VALUES(:gestor, :finalidade, :tipoImovel, :area, :preco, :descricao, :morada, :codPostal, :lat, :lng, :freguesia, "Ativo", :estado)';

      // :gestor, ["gestor"]=> string(1) "2"
      // :finalidade, ["finalidade"]=> string(1) "2"
      // :tipoImovel, ["tipoImovel"]=> string(1) "3"
      // :area,  ["area"]=> string(6) "150*50"
      // :preco, ["preco"]=> string(2)  "10"
      // :descricao,  ["descricao"]=> string(9) "asdasdasd"
      // :morada,  ["morada"]=> string(6) "morada"
      // :codPostal,  ["codPostal"]=> string(8) "9500-320"
      // :lat,["lat"]=> string(17) "37.81310545857551"
      // :lng, ["lng"]=> string(0) ""
      // :freguesia  ["freguesia"]=> string(3)  "102"
      // :estado ["estado"]=> string(6) "pronto"
      // :tipologia, ["tipologia"]=> NULL
      // :quartos, ["quartos"]=> NULL
      // :casasBanho, ["casasBanho"]=> NULL
      // :garagem,  ["garagem"]=> int(1)
      // :piscina, ["piscina"]=> NULL
      // :mobilia,  ["mobilia"]=> NULL
      // :dataConstrucao,  ["dataConstrucao"]=> NULL
      // :informacao ["informação"]=> string(0) ""

      // $campos['gestor'];
      // $finalidade=$campos['finalidade'];
      // $tipoImovel=$campos['tipoImovel'];
      // $area=$campos['area'];
      // $preco=$campos['preco'];
      // $descricao=$campos['descricao'];
      // $morada=$campos['morada'];
      // $codPostal=$campos['codPostal'];
      // $lat=$campos['lat'];
      // $lng=$campos['lng'];
      // $freguesia=$campos['freguesia'];
      // $estado=$campos['estado'];


      if ($campos['tipologia']=="") {
        $campos['tipologia']=null;
      }

      if ($campos['quartos']=="") {
        $campos['quartos']=null;
      }

      if ($campos['casasBanho']=="") {
        $campos['casasBanho']=null;
      }

      if (isset($campos['garagem'])) {
        if ($campos['garagem']=="") {
          $campos['garagem']=null;
        }else {
          $campos['garagem']=1;
        }
      }else {
        $campos['garagem']=1;
      }

      if (isset($campos['piscina'])) {
        if ($campos['piscina']=="") {
          $campos['piscina']=null;
        }else {
          $campos['piscina']=1;
        }
      }else {
        $campos['piscina']=null;
      }

      if (isset($campos['mobilia'])) {
        if ($campos['mobilia']=="") {
        $campos['mobilia']=null;
        }else {
          $campos['mobilia']=1;
        }
      }else {
        $campos['mobilia']=null;
      }

      if ($campos['dataConstrucao']=="") {
        $campos['dataConstrucao']=null;
      }

      if (isset($campos['informacao'])) {
        if ($campos['informacao']=="") {
          $campos['informacao']=null;
        }
      }else {
        $campos['informacao']=null;
      }
      //var_dump($campos);

      $arr = array('gestor' => $campos['gestor'] , 'finalidade' => $campos['finalidade'], 'tipoImovel' => $campos['tipoImovel'], 'area' => $campos['area'], 'preco' => $campos['preco'], 'descricao' => $campos['descricao'],
       'morada' => $campos['morada'], 'codPostal' => $campos['codPostal'], 'lat' => $campos['lat'], 'lng' => $campos['lng'], 'freguesia' => $campos['freguesia'], 'estado' => $campos['estado']);

      $this->query($sql, $arr);

      $sql='SELECT idImovel from imovel order by idImovel desc limit 1';
      $idImovel=$this->query($sql);

      if (isset($campos['tipologia'])) {
        if ($campos['tipologia']!=NULL) {
          $sql = 'INSERT INTO extras (idImovel, tipologia, quartos, casasBanho, garagem, piscina, mobilia, dataConstrucao, informacao) VALUES(:idImovel, :tipologia, :quartos, :casasBanho, :garagem, :piscina, :mobilia, :dataConstrucao, :informacao)';
          $arr = array('idImovel' => $idImovel[0]['idImovel'],
           'tipologia' => $campos['tipologia'],
           'quartos' =>$campos['quartos'] ,
           'casasBanho' =>$campos['casasBanho'] ,
           'garagem' => $campos['garagem'],
           'piscina' => $campos['piscina'],
           'mobilia' => $campos['mobilia'],
           'dataConstrucao' => $campos['dataConstrucao'],
           'informacao' => $campos['informacao'] );
           //var_dump($arr);
           $this->query($sql, $arr);
        }
      }

      mkdir("../../imoveis/".$idImovel[0]['idImovel']);
      foreach ($_FILES['img']['name'] as $f => $name) {
          if(move_uploaded_file($_FILES["img"]["tmp_name"][$f], "../../imoveis/".$idImovel[0]['idImovel']."/$name" )) {
            $sql='INSERT into galeria (idImovel, nomeImagem, descricao) VALUES (:idImovel, :nomeImagem, NULL)';
            $this->query($sql, array('idImovel' => $idImovel[0]['idImovel'], 'nomeImagem' =>trim($name, " ")));
        }
      }

      if (isset($destaque)) {

        //echo "1";
        $sql = 'INSERT INTO destaque(idImovel, destacado) VALUES(:idImovel, :destacado)';
        $this->query($sql, array('idImovel' => $idImovel[0]['idImovel'] ,'destacado' => $destaque ));
        //echo "2";
      }

    }

    public function marcarComprado($id){
      $sql ='UPDATE imovel set situacao = "Concluído" where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));
    }

    public function marcarAtivo($id){
      $sql ='UPDATE imovel set situacao = "Ativo" where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));
    }

    public function getWorkers(){

      $sql="SELECT * FROM funcionario";
      $workers=$this->query($sql);

      foreach ($workers as $worker) {
        $sql = 'SELECT tipo FROM tipo_user WHERE idTipoUser = :idTipoUser';
        $tipoUser = $this->query($sql, array(":idTipoUser" => $worker['tipoUser']));

        $wkr[]=new funcionario($worker['idFuncionario'], $worker['email'],  $worker['password'], $worker['nomeProprio'], $worker['sobrenome'],  $worker['contacto'],  $tipoUser[0]['tipo']);
      }
      return $wkr;

    }

    public function eliminarImovel($id){

      $sql ='DELETE from extras where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));

      $sql ='DELETE from galeria where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));

      $sql ='DELETE from visita where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));

      $sql ='DELETE from imovel where idImovel = :idImovel';
      $this->query($sql, array('idImovel' => $id ));

    }

  }

?>
