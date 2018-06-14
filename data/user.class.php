<?php

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



  }
?>
