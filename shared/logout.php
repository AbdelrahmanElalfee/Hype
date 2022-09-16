<?php
session_start();
    unset($_SESSION["uMail"]);
    session_destroy();
  header('location:../home.php');
?>