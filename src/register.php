<?php
    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Register");

    if(!(array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])))
        include_once("templates/register.php");
    else{
        echo '<script language="javascript">
                alert("Already registered!");
                window.location.href="/index.php";
                </script>';
        }

    include_once("templates/common/footer.php");
?>
