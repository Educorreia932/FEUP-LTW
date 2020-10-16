<?php
    $DB_PATH = "../3 - SQLite Database Creation/news.db";
    $db = new PDO('sqlite:' . $DB_PATH);
    
    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $article = $stmt->fetch();
?>  