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
            <div id="authentication">  

            <?php
                // Check if user is logged in
                if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
            ?>

                <div id="logged-in">
                    <p>Greetings, <a href="user_profile.php"><?= $_SESSION['username']?></a></p>
                    <img src="https://i.pinimg.com/564x/ea/8a/7f/ea8a7fb3b3230019a2f397b01cfe2d0c.jpg" alt="Avatar" id="avatar">
                </div>

            <?php
                }

                else {
            ?>

                <div id="logged-in">
                    <a href="register.php" id="register">Register</a>
                    <a href="login.php" id="login">Login</a>
                </div>

            <?php
                }
            ?>
           </div>
        </header>
