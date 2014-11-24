<?php
  error_reporting(E_ALL & ~E_NOTICE);
  session_start();
  if(!isset($_SESSION['username']))
    exit('访问受限，请登陆后重试！<a href= "login.html">登陆</a>');
  else {
  ;
  }
?>
