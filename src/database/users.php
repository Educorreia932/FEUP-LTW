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

    function getAdoptionProposals($username) {
        global $db;

        $stmt = $db->prepare(
            'SELECT *
            FROM AdoptionProposal JOIN Users
            ON AdoptionProposal.AuthorID=Users.UserID
            WHERE Users.Username=?'
        );

        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }

    function getAdoptionPosts($username) {
        // global $db;

        // $stmt = $db->prepare(
        //     'SELECT *
        //     FROM AdoptionPosts JOIN Users
        //     ON AdoptionPosts.AuthorID=Users.UserID
        //     WHERE Users.Username=?'
        // );

        // $stmt->execute(array($username));
        // return $stmt->fetchAll();
        return [];
    }
?>