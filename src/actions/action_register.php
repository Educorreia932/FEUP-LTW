<script src="../scripts/alerts.js"></script>

<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE ){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }

    if ($_SESSION['csrf'] !== $_POST['csrf']) {
		echo '<script type="text/javascript">
					alertWrongCSRF();
				</script>';
			die;
	  }

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php');     

    if (!checkUsername($_POST['username'])) {
        addUser($_POST['username'], sha1($_POST['password']), $_POST['name'], "/images/default-avatar.png");
        header('Location: ../pages/login.php');
    }
    else{
        echo '<script type="text/javascript">
                alertUsedUsername();
            </script>';
    }
?>