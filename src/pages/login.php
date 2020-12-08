<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . "/templates/common/header.php");
    drawHeader("Helper Shelter - Login");

    if (!(array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])))
        include_once(ROOT . "/templates/forms/login.php");

    else{
        echo '<script language="javascript">
                alert("Already logged in!");
                window.location.href="/index.php";
                </script>';
        }

    include_once(ROOT . "/templates/common/footer.php");
?>
