<?php

  class imagem{

    private $idImagem;
    private $idImovel;
    private $nomeImagem;
    private $descricao;

    public function __construct($idImagem, $idImovel, $nomeImagem, $descricao){
      $this->idImagem=$idImagem;
      $this->idImovel=$idImovel;
      $this->nomeImagem=$nomeImagem;
      $this->descricao=$descricao;
    }

    public function getIdImagem(){
      return $this->idImagem;
    }

    public function getIdImovel(){
      return $this->idImovel;
    }

    public function getNomeImagem(){
      return $this->nomeImagem;
    }

    public function getDescricao(){
      return $this->descricao;
    }


  }

?>
