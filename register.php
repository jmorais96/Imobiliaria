<!-- <?php session_start(); ?>

<?php include("assets/logout.php"); ?>

<?php include("registar_ok.php"); ?>

<?php

  if (isset($_SESSION['cliente']) || isset($_SESSION['admin'])) {

      header("location:index.php");

  }

?> -->

<!DOCTYPE html>
<html lang="pt" dir="ltr">
  
  <head>
    
    <!-- MetaTags -->
    <meta charset="utf-8">
    
    <!-- Folhas de estilo -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/gerirImovelTable.css">

    <!-- Ficheiros JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <!-- Font-family PT Sans -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    
    <!-- Título da página -->
    <title>Mais Imobiliária | Bem-vindo</title>
  
  </head>

  <!-- HEADER -->
  <div class="container_header">
     <div class="header">
            <div class="icon">
              <img id="icon" src="images/logo.png"/>
              <p id="homeIconName">
            </div>
            <div class="navItems">
                <a href="index.php"><p id="navItem">HOME</p></a>
                 <a href="register.php"><p id="navItem">REGISTAR</p></a>
                <a href="logout.php"><p id="navItem">LOGIN</p></a>
            </div>
            <div class="phone">
              <img id="phoneIcon" src="images/call-answer.svg"/>
              <p id="phone">296 012 345</p>
            </div>
      </div>
  </div>
  <!-- FINAL DO HEADER -->

  <!-- FORMULÁRIO DE REGISTO -->