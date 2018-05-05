<?php
require_once('imobiliaria.class.php');
class imovel extends imobiliaria {

  private $idImovel;
  private $finalidade;
  private $tipoImovel;
  private $tipologia;
  private $tamanho;
  private $quartos;
  private $casasBanho;
  private $mobilia;
  private $dataConstrucao;
  private $garagem;
  private $espacoExterior;
  private $piscina;
  private $preco;
  private $descricao;
  private $ilha;
  private $concelho;
  private $freguesia;
  private $morada;
  private $estado;
  private $destaque;



  function __construct($id, $finalidade, $tipo, $tamanho, $preco, $descricao, $data, $morada, $destaque, $estado, $ilha ,$concelho, $freguesia=NULL, $tipologia=NULL, $quartos=NULL, $casasBanho=NULL, $espacoExterior=NULL, $garagem=NULL, $piscina=NULL, $mobilia=NULL){
    $this->idImovel=$id;
    $this->finalidade=$finalidade;
    $this->tipoImovel=$tipo;
    $this->tamanho=$tamanho;
    $this->preco=$preco;
    $this->destaque=$destaque;
    $this->descricao=$descricao;
    $this->estado=$estado;
    $this->data=$data;
    $this->ilha=$ilha;
    $this->concelho=$concelho;
    $this->freguesia=$freguesia;
    $this->morada=$morada;
    $this->tipologia=$tipologia;
    $this->quartos=$quartos;
    $this->casasBanho=$casasBanho;
    $this->mobilia=$mobilia;
    $this->garagem=$garagem;
    $this->espacoExterior=$espacoExterior;
    $this->piscina=$piscina;

  }


  public function marcador(){

      // echo "<script>alert('here');</script>";
     echo " <script type=\"text/javascript\">
     addMarker(\"$this->morada\");
     </script>";
  }


}

?>
