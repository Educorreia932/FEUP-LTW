<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE){
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

    include_once(ROOT . "/database/connection.php"); 
    include_once(ROOT . "/database/pets.php");     

    $post_title = $_POST['post_title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $post_id = $_POST['adoption_post_id'];

    edit_post($post_title, $location, $description, $post_id);

    header("Location: ../pages/adoption_post.php?id=$post_id");
?>