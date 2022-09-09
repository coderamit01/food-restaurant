<?php
//session start
  session_start();
  //site url
  define("SITEURL", 'http://localhost/food-restaurant');
  //connect to localhost 
  define("DB_SERVER", 'localhost');
  define("DB_USER", 'root');
  define("DB_PASS", 'root');
  define("DB_NAME", 'food');
  //connect to database
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

?>