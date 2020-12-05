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

    $petID = (int)getPetMaxID()[0]['M'] + 1;



    $originalFileName = "../images/pets/".$petID."-{$_FILES['image']['name']}";
  
    $stmt = $db->prepare('INSERT INTO Pets VALUES (?, ?, ?, ?, ?, ?, ?)');

    $stmt->execute(array($petID, $_POST["name"], $_POST["gender"], $_POST["pet-age"],$originalFileName,(int)$_POST["pet-species"], 2));

  
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
