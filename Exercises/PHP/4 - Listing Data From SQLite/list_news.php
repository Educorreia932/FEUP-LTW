<?php
	$DB_PATH = "../3 - SQLite Database Creation/news.db";
	$db = new PDO('sqlite:' . $DB_PATH);

	$stmt = $db->prepare('SELECT * FROM news');
	$stmt->execute();
	$articles = $stmt->fetchAll();

	foreach( $articles as $article) {
		echo '<h1>' . $article['title'] . '</h1>';
		echo '<p>' . $article['introduction'] . '</p>';
	}
?>