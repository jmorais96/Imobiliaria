<?php

class funcionario {

    private $idFuncionario;
    private $email;
    private $password;
    private $nomeProprio;
    private $sobrenome;
    private $contacto;
    private $tipoUser;


  function __construct($idFuncionario, $email, $password, $nomeProprio, $sobrenome, $contacto, $tipoUser){
    $this->idFuncionario=$idFuncionario;
    $this->email=$email;
    $this->password=$password;
    $this->nomeProprio=$nomeProprio;
    $this->sobrenome=$sobrenome;
    $this->contacto=$contacto;
    $this->tipoUser=$tipoUser;
  }
 
  public function getIdFuncionario(){
    return $this->idFuncionario;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPassword(){
    return $this->password;
  }

  public function getNomeProprio(){
    return $this->nomeProprio;
  }

  public function getSobrenome(){
    return $this->sobrenome;
  }

  public function getContacto(){
    return $this->contacto;
  }

  public function getTipoUser(){
    return $this->tipoUser;
  }

  public function getFullName(){
    return $this->nomeProprio." ".$this->sobrenome;
  }





}

?>
