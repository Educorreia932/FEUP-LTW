<script src="../scripts/alerts.js"></script>

<?php
	include_once(__DIR__ . "/../config.php");

	if (session_status() == PHP_SESSION_NONE){
		session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
		session_start();
		if (!isset($_SESSION['csrf'])) {
			echo '<script type="text/javascript">
					alertUsedUsername();
				</script>';;
		  }
	}

	if ($_SESSION['csrf'] !== $_POST['csrf']) {
			echo '<script type="text/javascript">
					alertWrongCSRF();
				</script>';
			die;
	  }

	$type = $_FILES['image']['type'];

	$extensions = array('image/jpeg', 'image/png', 'image/gif');

	if (in_array($type, $extensions)) {
		include_once(ROOT . '/database/connection.php');
		include_once(ROOT . '/database/pets.php');
        include_once(ROOT . '/database/users.php');
        
        $id = getUser($_SESSION["username"], $_SESSION["password"])["UserID"];

		$originalFileName = "/images/users/" . $id . ".png";

		$postTransaction = $db->prepare('Update Users SET ProfilePicture = ? WHERE UserID = ?');
		$postTransaction->execute(array($originalFileName, $id));

		move_uploaded_file($_FILES['image']['tmp_name'], ROOT . $originalFileName);
		header("Location: ../pages/settings.php");
	} 
	else {
		echo '<script type="text/javascript">
				alertWrongImageExtention();
			</script>';
	}
?>