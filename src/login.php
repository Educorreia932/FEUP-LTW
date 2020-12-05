<?php
    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Login");

    if(!(array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])))
        include_once("templates/login.php");
    else{
        echo '<script language="javascript">
                alert("Already logged in!");
                window.location.href="/index.php";
                </script>';
        }

    include_once("templates/common/footer.php");
?>
