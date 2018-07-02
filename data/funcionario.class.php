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

  public function setEmail($email){
    $this->email=$email;
  }

  public function setPassword($password){
    $this->password=$password;
  }

  public function setNomeProprio($nomeProprio){
    $this->nomeProprio=$nomeProprio;
  }

  public function setSobrenome($sobrenome){
    $this->sobrenome=$sobrenome;
  }

  public function setContacto($contacto){
    $this->contacto=$contacto;
  }

  public function setTipoUser($tipoUser){
    $this->tipoUser=$tipoUser;
  }

  public function updateFuncionario(){
    $campos['email']=$this->email;
    $campos['password']=$this->password;
    $campos['nomeProprio']=$this->nomeProprio;
    $campos['sobrenome']=$this->sobrenome;
    $campos['contacto']=$this->contacto;
    $campos['tipoUser']=$this->tipoUser;

    return $campos;
  }

}

?>
