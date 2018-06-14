<?php
require_once('database.class.php');

class imobiliaria extends Database {

  public function pesquisa($sql='select * from imoveisdestcados', $campos=[]){
    //var_dump($campos);
    //echo "<script> alert('here'); </script>";
    $pesquisa=$this->query($sql,$campos);
    //echo " clearOverlays(); ";


    //var_dump($pesquisa);
    foreach ($pesquisa as $imovel) {
      $sql='select * from imovel where idImovel = :idImovel';
      $idImovel= array('idImovel' => $imovel['idImovel'] );
      $pesquisa=$this->query($sql,$idImovel);
      //var_dump($pesquisa);
      foreach ($pesquisa as $id) {
        $sql='select * from extras where idImovel = :idImovel';
        $extra=$this->query($sql,$id['idImovel']);

        $sql='select finalidade from finalidade where idFinalidade = :idFinalidade';

        $finalidade=$this->query($sql, $id['finalidade']);

        $sql='select tipoImovel from tipo_imovel where idTipoImovel = :idTipoImovel';
        $tipoImovel=$this->query($sql, $id['tipoImovel']);

        $sql='select ilha from freguesia where idFreguesia = :idFreguesia';
        $freguesia=$this->query($sql, $id['idFreguesia']);

        $sql='select concelho from concelho where idConcelho = :idConcelho';
        $concelho=$this->query($sql, $freguesia['idConcelho']);

        $sql='select ilha from ilha where idIlha = :idIlha';
        $ilha=$this->query($sql, $concelho['idIlha']);

      }
      //var_dump($id);
      if ($extra['idImovel']!=NULL) {
        $imoveis[] = new imovel($id['idImovel'], $id['finalidade'], $tipoImovel['tipoImovel'], $id['tamanhoLote'], $id['preco'], $id['descricao'], $id['dataConstrucao'], $id['morada'], $id['destaque'], $id['estado'], $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia'], $tipologia[0]['tipologia'], $extra['quartos'], $extra['casasBanho'], $extra['espacoExterior'], $extra['garagem'], $extra['piscina'], $extra['mobilia']);
      }else {
        $imoveis[] = new imovel($id['idImovel'], $id['gestor'], $finalidade[0]['finalidade'], $tipoImovel[0]['tipoImovel'], $id['area'], $id['preco'], $id['descricao'], $id['rua'], $id['codPostal'], $id['lat'], $id['long'], $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia'], $id['situacao'], $id['estado']);
      }

    }


      for ($i=0; $i < count($imoveis) ; $i++) {
        $imoveis[$i]->addMarker();
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
      echo("<option value=".$value['idIlha']."   id='index'>".
      ($value['ilha']) ."</option>");
    }

  }

  public function selectConcelho($ilha){
    $sql='select * from concelho where idIlha = :idIlha';
    $ilha=  array('idIlha' => $ilha);
    $concelho=$this->query($sql, $ilha);
    echo("<option >Selecione um concelho</option>");
    foreach ($concelho as $value) {
      echo("<option value=".$value['idConcelho']."   id='index'>".($value['concelho'])."</option>");

    }
  }

  public function selectFreguesia($concelho){
    $sql='select * from freguesia where idconcelho = :idConcelho';
    $concelho=  array('idConcelho' => $concelho);
    $freguesia=$this->query($sql, $concelho);
    echo("<option >Selecione uma freguesia</option>");
    foreach ($freguesia as $value) {
      echo("<option value=".$value['idFreguesia']."   id='index'>".($value['freguesia'])."</option>");
    }
  }

  public function mailExists($mail){
    $sql='select count(*) from utilizador where email = :email';
    $mail=  array('email' => $mail);
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

  public function registar($mail, $nome, $sobrenome, $pass, $contact, $ilha, $concelho, $freguesia){
    $sql ='INSERT INTO utilizador (email, nomeProprio, sobrenome, password, contacto, idFreguesia) VALUES(:email, :nomeProprio, :sobrenome, :password, :contacto, :idFreguesia)';
    $arr = array('email' => $mail , 'nomeProprio' => $nome, 'sobrenome' => $sobrenome, 'password' => $pass, 'contacto' => $contact, 'idFreguesia' => $freguesia);
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

  public function loginFuncionario($email,$password){
    $sql = 'SELECT COUNT(idFuncionario) FROM funcionario WHERE email = :email AND password = :password';
    $login = array('email' => $email, 'password' => $password);
    $count=$this->query($sql, $login);


 var_dump("<script> console.log(".$count.") </script>");

 /*   if($count == "1"){
        $_SESSION['email'] = $email;
        header('location: admin.php');
    }*/
  }

    public function getAllUsers(){
        $stmt = $this->query('SELECT * FROM funcionario');
        //var_dump($stmt);
        foreach ($stmt as $row) {
          $uid = $row['idFuncionario'];
          return $uid;
        }

    }

}




?>
