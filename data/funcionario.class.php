<?php
require_once('imobiliaria.class.php');
class funcionario extends imobiliaria {

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





}

?>
