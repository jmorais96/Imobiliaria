<?php

  class visita{

      private $idVisita;
      private $user;
      private $imovel;
      private $dataHora;
      private $estado;

      public function  __construct($idVisita, $user, $imovel, $dataHora, $estado){
        $this->idVisita=$idVisita;
        $this->user=$user;
        $this->imovel=$imovel;
        $this->dataHora=$dataHora;
        $this->estado=$estado;
      }

      public function getIdVisita(){
        return $this->idVisita;
      }

      public function getIdGestor(){
        return $this->imovel->getGestor();
      }

      public function getRua(){
        return $this->imovel->getRua();
      }

      public function getCodPostal(){
        return $this->imovel->getCodPostal();
      }

      public function getHora(){
        $hora=explode(" ", $this->dataHora);
        return $hora[0];
      }

      public function getData(){
        $data=explode(" ", $this->dataHora);
        return $data[1];
      }

      public function getEstado(){
        return $this->estado;
      }

      public function getContactCliente(){
        return $this->user->getContact();
      }

      public function getFullName(){
        return $this->user->getFullName();
      }

      public function getContacto(){
        return $this->user->getContacto();
      }
  }

 ?>
