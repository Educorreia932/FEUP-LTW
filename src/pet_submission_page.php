<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Submition");

    include_once("templates/submition_form.php");

    include_once("templates/common/footer.php");
?> 