<script src="scripts/alerts.js"></script>

<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Submition");

    if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        include_once("templates/forms/submition_form.php");
    else{
        echo '<script type="text/javascript">
                alertNoLoginSubmition();
            </script>'; 
    }

    include_once("templates/common/footer.php");
?> 