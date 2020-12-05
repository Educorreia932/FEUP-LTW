<?php
    function checkUser($username, $password) {
        $password = sha1($password);

        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ? AND Password = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();

        if ($user) 
            return TRUE;
        else 
            return FALSE;
    }

    function getUser($username, $password) {
        $password = sha1($password);

        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ? AND Password = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username, $password));
        $user = $stmt->fetch();

        return $user;
    }

    function getUserByID($id) {

        global $db;
        $query =  'SELECT Name FROM 
                   Users WHERE 
                   UserID = ? ';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        $userName = $stmt->fetch()['Name'];

        return $userName;
    }

    function addUser($username, $password, $name) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Users VALUES (NULL, ?, ?, ?, NULL)');
        $stmt->execute(array($username, $password, $name));
    }

    function getFavouritePets($username) {
        global $db;

        $stmt = $db->prepare(
            'SELECT PetID
             FROM UserFavouritePets JOIN Users
             ON Users.UserID=UserFavouritePets.UserID
             WHERE Users.Username=?'
        );

        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }
?>