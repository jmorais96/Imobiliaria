<?php
require_once('database.class.php');

class imobiliaria extends Database {

  public function pequisa($sql='select * from destaque where destaque=1'){


    $pesquisa=$this->query($sql);

    //var_dump($pesquisa);
    foreach ($pesquisa as $id) {
      //var_dump($id);
      $sql='select * from extras where idImovel = :idImovel';
      $result=$this->query($sql,$id['idImovel']);
      //echo "string".$id['idImovel'];
      $sql='select tipoImovel from tipo_imovel where idTipoImovel = :idTipoImovel';
      $tipoImovel=$this->query($sql, $id['tipoImovel']);
      $sql='select ilha from ilha where idIlha = :idIlha';
      $ilha=$this->query($sql, $id['idIlha']);
      $sql='select concelho from concelho where idConcelho = :idConcelho';
      $concelho=$this->query($sql, $id['idConcelho']);
      $sql='select ilha from freguesia where idFreguesia = :idFreguesia';
      $freguesia=$this->query($sql, $id['idFreguesia']);

      //echo ($result);
      if ($result['idImovel']!=NULL) {
        $imoveis[] = new imovel($id['idImovel'], $id['finalidade'], $tipoImovel['tipoImovel'], $id['tamanhoLote'], $id['preco'], $id['descricao'], $id['dataConstrucao'], $id['morada'], $id['destaque'], $id['estado'], $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia'], $tipologia[0]['tipologia'], $result['quartos'], $result['casasBanho'], $result['espacoExterior'], $result['garagem'], $result['piscina'], $result['mobilia']);
      }else {
        $imoveis[] = new imovel($id['idImovel'], $id['finalidade'], $tipoImovel['tipoImovel'], $id['tamanhoLote'], $id['preco'], $id['descricao'], $id['dataConstrucao'], $id['morada'], $id['destaque'], $id['estado'], $ilha[0]['ilha'], $concelho[0]['concelho'], $freguesia[0]['freguesia']);
      }

    }

      //echo sizeof($imoveis);
      for ($i=0; $i < sizeof($imoveis) ; $i++) {
        //var_dump($imoveis[$i]);
        echo $i;
        $imoveis[$i]->marcador();
      }


  }

}

?>
