<?php

  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

  include_once(__DIR__.'/../database/connection.php'); 
  include_once(__DIR__.'/../database/pets.php');     

  // TODO: Verify if username already exists

  var_dump($_POST["name"]);
  var_dump($_POST["city"]);
  var_dump($_POST["pet-species"]);
  var_dump($_POST["gender"]);

  var_dump($_FILES['image']);

  $originalFileName = "images/test.jpg";

  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);



?>
