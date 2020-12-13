<?php

    if(!isset($_SESSION)){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }

    function drawHeader($page_name) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo "$page_name" ?></title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/forms.css">
        <link rel="stylesheet" href="../style/adoption_list.css">
        <link rel="stylesheet" href="../style/cards.css">
        <link rel="stylesheet" href="../style/pet_profile.css">
        <link rel="stylesheet" href="../style/user_profile.css">
        <link rel="stylesheet" href="../style/user_proposal.css">
        <link rel="stylesheet" href="../style/user_post.css">
        <link rel="stylesheet" href="../style/user_settings.css">
        <script defer src="../scripts/encode_for_ajax.js"></script>
        <script defer src="../scripts/favorite_pets.js"></script>
        <script src="https://kit.fontawesome.com/57668fbb45.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <h1><a href="../"><?php echo("Helper Shelter")?></div></a></h1>
            <div id="authentication">  

            <?php
                // Check if user is logged in
                if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
                    $user = getUser($_SESSION['username'], $_SESSION['password']);
            ?>
            <p>Greetings, <a href="<?="../pages/user_profile.php?user=" .urlencode($_SESSION['username'])?>"><?= $_SESSION['username']?></a></p>
            
            <script src="../scripts/user_menu.js"></script>
            
            <img id="avatar" onclick="toggleMenuDisplay();" src="../<?=$user['ProfilePicture']?>" alt="Avatar">
            
            <div id="avatar_dropdown" style="display: none">
                <ul>
                    <li><a href="<?="../pages/user_profile.php?user=" . urlencode($_SESSION['username'])?>">Profile</a></li>
                    <li><a href="../pages/settings.php">Settings</a></li>
                    <li><a href="../actions/log_out.php">Log Out</a></li>
                </ul>
            </div>

            <?php
                }

                else {
            ?>

            <div id="logged-in">
                <a href="../pages/register.php">Register</a>
                <a href="../pages/login.php">Login</a>
            </div>

            <?php
                }
            ?>
        </div>
        </header>
<?php  
    }
?>
