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
      $this->freguesia=$freguesia;
    }

    public function update(){
      return $arr = array(':idUser' => ($this->getIdUser()), ':email' => ($this->getMail()), ':nomeProprio' => ($this->getName()) , ':sobrenome' => ($this->getLastName()) , ':password' => ($this->password) , ':contacto' => ($this->getContact()) , ':idFreguesia' => ($this->getFreguesia()));
    }

    public function validarPassword($pass){
      if ($this->password==$pass) {
        return true;
      }else {
        return false;
      }
    }


  }
?>
