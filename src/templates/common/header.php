<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adoption Shelter</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/forms.css">
        <link rel="stylesheet" href="style/adoption_list.css">
        <script src="https://kit.fontawesome.com/57668fbb45.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <h1><a href="index.php">Helper Shelter</a></h1>
            <div id="account">  
                <?php
                    // Check if user is logged in
                    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
                ?>

                <p>You're now logged in as <a href="user_profile.php"><?= $_SESSION['username']?></a></p>

                <?php
                    }

                    else {
                ?>
        
                <a href="register.php" id="register">Register</a>
                <a href="login.php" id="login">Login</a>

                <?php
                    }
                ?>
            </div>
        </header>
