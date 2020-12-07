<?php
    if(!isset($_SESSION)) 
        session_start(); 
?>


<?php  function drawHeader($page_name){?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo "$page_name" ?></title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/forms.css">
        <link rel="stylesheet" href="style/adoption_list.css">
        <link rel="stylesheet" href="style/cards.css">
        <link rel="stylesheet" href="style/pet_profile.css">
        <link rel="stylesheet" href="style/user_profile.css">
        <link rel="stylesheet" href="style/user_proposal.css">
        <link rel="stylesheet" href="style/user_post.css">
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
            <p><a href="actions/log_out.php"> Log Out   |</a></p>
            <p>Greetings, <a href="user_profile.php"><?= $_SESSION['username']?></a></p>
            <img id="avatar" src="https://i.pinimg.com/564x/ea/8a/7f/ea8a7fb3b3230019a2f397b01cfe2d0c.jpg" alt="Avatar">

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
<?php  }?>
