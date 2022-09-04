<?php 
  require_once('config.php');
    session_start();
    $_SESSION = array();

    session_destroy();
    header('location:'.SITEURL."/admin/login.php");



?>