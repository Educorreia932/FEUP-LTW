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

	$type = $_FILES['image']['type'];

	$extensions = array('image/jpeg', 'image/png', 'image/gif');

	if (in_array($type, $extensions)) {
		include_once(ROOT . '/database/connection.php');
		include_once(ROOT . '/database/pets.php');
		include_once(ROOT . '/database/users.php');

		$petAndPostID = (int)getPetMaxID()[0]['M'] + 1;

		$originalFileName = "/images/pets/" . $petAndPostID . "-{$_FILES['image']['name']}";

		$date_now = new DateTime('NOW');
		$date_text = $date_now->format('d-m-Y H:i:s');

		$postTransaction = $db->prepare('INSERT INTO AdoptionPosts VALUES (?, ?, ?, ?, ?, ?)');

		$posterID = (int)getUser($_SESSION['username'], $_SESSION['password'])['UserID'];

		$postTransaction->execute(array($petAndPostID, $_POST["post-title"], $_POST["description"], $_POST["city"], $date_text, $posterID));

		$stmt = $db->prepare('INSERT INTO Pets VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

		$stmt->execute(
			array(
				$petAndPostID,
				$_POST["name"], 
				$_POST["gender"],
				$_POST["pet-age"], 
				$_POST["color"], 
				$_POST["weight"],
				(int) $_POST["pet-size"], 
				$originalFileName, 
				(int) $_POST["pet-species"], 
				$petAndPostID
			)
		);

		move_uploaded_file($_FILES['image']['tmp_name'], ROOT . $originalFileName);
		header("Location: ../index.php");
	} 

	else {
		echo '<script type="text/javascript">
				alertWrongImageExtention();
				</script>';
	}
?>