<?php

  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 

  $type = $_FILES[ 'image' ][ 'type' ];     
 
  $extensions=array( 'image/jpeg', 'image/png', 'image/gif');
  if( in_array( $type, $extensions )){
    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/pets.php');    
  
    // var_dump($_POST["post-title"]);
    // var_dump($_POST["name"]);
    // var_dump($_POST["city"]);
    // var_dump($_POST["pet-species"]);
    // var_dump($_POST["gender"]);
    // var_dump($_FILES['image']['name']);
    // var_dump($petID);

    $petID = (int)getPetMaxID()[0]['M'] + 1;
  
    $originalFileName = "../images/pets/".$petID."-{$_FILES['image']['name']}";
  
    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
    header("Location: /index.php");
  }
  else{
    echo '<script language="javascript">
            alert("Wrong image extention, please try again ");
            window.location.href="/pet_submission_page.php";
          </script>';
  }


?>
