<?php
    function userExists($username, $password) {
        global $db;

        $password = sha1($password);

        $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();

        return $user;
    }
?>