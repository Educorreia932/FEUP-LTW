<script src="../scripts/alerts.js"></script>

<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)) 
        session_start(); 

    require_once(ROOT . "/database/connection.php");
    require_once(ROOT . "/database/users.php");
    require_once(ROOT . "/templates/common/header.php");
    drawHeader("Helper Shelter - Submition");

    if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        include_once(ROOT . "/templates/forms/submition_form.php");

    else{
        echo '<script type="text/javascript">
                alertNoLoginSubmition();
            </script>'; 
    }

    include_once(ROOT . "/templates/common/footer.php");
?> 