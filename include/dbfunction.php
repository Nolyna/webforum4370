<?php
  function dbconnect(){
    $conn = new PDO("mysql:host=localhost;dbname=csc4370forum", "root", "");
    return $conn;
  }
 ?>
