<?php
    require(__DIR__ . "/../config.php");

    require(ROOT . "/templates/common/header.php");
    
    if (!(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))){
        drawHeader("Helper Shelter - Login");
        require(ROOT . "/templates/forms/login.php");
    }

    else{
        echo '<script language="javascript">
                alert("Already logged in!");
                window.location.href="../index.php";
                </script>';
        }

    require(ROOT . "/templates/common/footer.php");
?>
