<?php

  if (isset($_GET['acao'])) {
    if ($_GET['acao']=='logout') {
      session_destroy();
      header('location:../../index.php');
    }
  }

?>
