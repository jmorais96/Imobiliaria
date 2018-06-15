<?php

  require_once('imobiliaria.class.php');
  class User{

    private $idUser;
    private $mail;
    private $firstname;
    private $lastname;
    private $password;
    private $contact;
    private $ilha;
    private $concelho;
    private $freguesia;

    public function __construct($idUser, $mail, $firstname, $lastname, $pass, $contact, $ilha, $concelho, $freguesia){

      $this->idUser=$idUser;
      $this->mail=$mail;
      $this->firstname=$firstname;
      $this->lastname=$lastname;
      $this->password=$pass;
      $this->contact=$contact;
      $this->ilha=$ilha;
      $this->concelho=$concelho;
      $this->freguesia=$freguesia;

    }

    public function getIdUser(){
      return $this->idUser;
    }

    public function getMail(){
      return $this->mail;
    }

    public function getName(){
      return $this->firstname;
    }

    public function getLastName(){
      return $this->lastname;
    }

    public function getContact(){
      return $this->contact;
    }

    public function getIlha(){
      return $this->ilha;
    }

    public function getConcelho(){
      return $this->concelho;
    }

    public function getFreguesia(){
      return $this->freguesia;
    }

    public function getFullName(){
      return $this->firstname . " ". $this->lastname;
    }


    public function setName($name){
      $this->firstname=$name;
    }

    public function setLastName($lastname){
      $this->lastname=$lastname;
    }

    public function setMail($mail){
      $this->mail=$mail;
    }

    public function setPassword($password){
      $this->$password=md5($password);
    }

    public function setContact($contact){
      $this->contact=$contact;
    }

    public function setFreguesia($freguesia){
      $bd=new imobiliaria('config.ini');
      $this->freguesia=$bd->freguesia_id($freguesia);
    }

    public function update(){
      $bd=new imobiliaria('config.ini');
      return $arr = array(':idUser' => utf8_encode($this->getIdUser()), ':email' => utf8_encode($this->getMail()), ':nomeProprio' => utf8_encode($this->getName()) , ':sobrenome' => utf8_encode($this->getLastName()) , ':password' => utf8_encode($this->password) , ':contacto' => utf8_encode($this->getContact()) , ':idFreguesia' => utf8_encode($this->getFreguesia()));
    }




  }
?>
