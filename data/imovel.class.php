<?php
require_once('imobiliaria.class.php');
class imovel extends imobiliaria {

  // array(1) { [0]=> array(22) {
  //   ["idImovel"]=> string(1) "1"
  //   ["gestor"]=> string(1) "2"
  //   ["finalidade"]=> string(1) "1"
  //    ["tipoImovel"]=> string(1) "2"
  //    ["area"]=> string(9) "500m*500m"
  //    ["preco"]=> string(10) "1000000.00"
  //    ["descricao"]=> string(17) "Casa Muito Bonita"
  //    ["rua"]=> string(18) "Rua do Amorim, 7-G"
  //    ["codPostal"]=> string(8) "9500-102"
  //    ["lat"]=> string(10) "37.7484039"
  //    ["long"]=> string(11) "-25.6668802"
  //    ["idFreguesia"]=> string(2) "38"
  //    ["situacao"]=> string(5) "Ativo"
  //    ["estado"]=> string(8) "Em obras"
  //    ["tipologia"]=> NULL
  //    ["quartos"]=> NULL
  //    ["casasBanho"]=> NULL
  //    ["garagem"]=> NULL
  //    ["piscina"]=> NULL
  //    ["mobilia"]=> NULL
  //    ["dataConstrucao"]=> NULL
  //    ["informacao"]=> NULL } }


   private $idImovel;
   private $gestor;
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
   private $tipologia;
   private $quartos;
   private $casasBanho;
   private $garagem;
   private $piscina;
   private $mobilia;
   private $dataConstrucao;
   private $informacao;
   private $destaque;



  function __construct($idImovel, $gestor, $finalidade, $tipoImovel, $area, $preco, $descricao, $rua, $codPostal, $lat, $lng, $ilha, $concelho, $freguesia, $situacao, $estado, $tipologia, $quartos, $casasBanho, $garagem, $piscina, $mobilia, $dataConstrucao, $informacao, $destaque){

    $this->idImovel=$idImovel;
    $this->gestor=$gestor;
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
    $this->tipologia=$tipologia;
    $this->quartos=$quartos;
    $this->casasBanho=$casasBanho;
    $this->garagem=$garagem;
    $this->piscina=$piscina;
    $this->mobilia=$mobilia;
    $this->dataConstrucao=$dataConstrucao;
    $this->informacao=$informacao;
    $this->destaque=$destaque;

  }

  public function getIdImovel(){
    return   $this->idImovel;
  }

  public function getGestor(){
    return   $this->gestor;
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

  public function getTipologia(){
    return   $this->tipologia;
  }

  public function getQuartos(){
    return   $this->quartos;
  }

  public function getCasasBanho(){
    return   $this->casasBanho;
  }

  public function getGaragem(){
    return   $this->garagem;
  }

  public function getPiscina(){
    return   $this->piscina;
  }

  public function getMobilia(){
    return   $this->mobilia;
  }

  public function getDataConstrucao(){
    return   $this->dataConstrucao;
  }

  public function getInformacao(){
    return   $this->informacao;
  }

  public function getDestaque(){
    return   $this->destaque;
  }





  public function addMarker(){
    echo("addMarker(". $this->idImovel .", ". $this->lat .", ". $this->lng .", '" . $this->rua ."', '". $this->tipoImovel ."', '" . $this->area ."', '" . $this->preco ."' );");
  }


}

?>
