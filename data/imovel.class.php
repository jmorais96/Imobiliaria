<?php
require_once('imobiliaria.class.php');
class imovel extends imobiliaria {


   private $idImovel;
   private $idGestor;
   private $finalidade;
   private $tipoImovel;
   private $area;
   private $preco;
   private $descricao;
   private $rua;
   private $codPostal;
   private $lat;
   private $lng;
   private $ilha;
   private $concelho;
   private $freguesia;
   private $situacao;
   private $estado;

  // private $idImovel;
  // private $finalidade;
  // private $tipoImovel;
  // private $tipologia;
  // private $tamanho;
  // private $quartos;
  // private $casasBanho;
  // private $mobilia;
  // private $dataConstrucao;
  // private $garagem;
  // private $espacoExterior;
  // private $piscina;
  // private $preco;
  // private $descricao;
  // private $ilha;
  // private $concelho;
  // private $freguesia;
  // private $morada;
  // private $estado;
  // private $destaque;



  function __construct($idImovel, $idGestor, $finalidade, $tipoImovel, $area, $preco, $descricao, $rua, $codPostal, $lat, $lng, $ilha, $concelho, $freguesia, $situacao, $estado){
    $this->idImovel=$idImovel;
    $this->idGestor=$idGestor;
    $this->finalidade=$finalidade;
    $this->tipoImovel=$tipoImovel;
    $this->area=$area;
    $this->preco=$preco;
    $this->descricao=$descricao;
    $this->rua=$rua;
    $this->codPostal=$codPostal;
    $this->lat=$lat;
    $this->lng=$lng;
    $this->ilha=$ilha;
    $this->concelho=$concelho;
    $this->freguesia=$freguesia;
    $this->situacao=$situacao;
    $this->estado=$estado;

  }

  public function getIdImovel(){
    return   $this->idImovel;
  }

  public function getidGestor(){
    return   $this->idGestor;
  }

  public function getFinalidade(){
    return   $this->finalidade;
  }

  public function getTipoImovel(){
    return   $this->tipoImovel;
  }

  public function getArea(){
    return   $this->area;
  }

  public function getPreco(){
    return   $this->preco;
  }

  public function getDescricao(){
    return   $this->descricao;
  }

  public function getRua(){
    return   $this->rua;
  }

  public function getCodPostal(){
    return   $this->codPostal;
  }

  public function getLat(){
    return   $this->lat;
  }

  public function getLng(){
    return   $this->lng;
  }

  public function getIlha(){
    return   $this->ilha;
  }

  public function getConcelho(){
    return   $this->concelho;
  }

  public function getFreguesia(){
    return   $this->freguesia;
  }

  public function getSituacao(){
    return   $this->situacao;
  }

  public function getEstado(){
    return   $this->estado;
  }



  public function addMarker(){
    echo("addMarker(". $this->lat .", ". $this->lng .", '" . $this->rua ."', '". $this->tipoImovel ."', '" . $this->area ."', '" . $this->preco ."' );");
  }


}

?>
