<?php
    function getUser($username, $password) {
        $password = sha1($password);

        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   username = ? AND password = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();

        if ($user) 
            return TRUE;
            
        else 
            return FALSE;
    }

    function addUser($username, $password, $name) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Users VALUES (?, ?, ?)');
        $stmt->execute(array($username, $password, $name));
    }
?>