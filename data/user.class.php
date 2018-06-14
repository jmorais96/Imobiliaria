<?php

  require_once('imobiliaria.class.php');

  class User extends imobiliaria {

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
      $this->ilha=$ilha;
      $this->concelho=$concelho;
      $this->freguesia=$freguesia;

    }

  }
?>
