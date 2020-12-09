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

    function checkUsername($username) {
        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
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

    function getUserID($username) {
        global $db;

        $query =  'SELECT UserID FROM 
                   Users WHERE 
                   Username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $user_id = $stmt->fetch()["UserID"];

        return $user_id;
    }

    function getUserByID($id) {

        global $db;
        $query =  'SELECT Username FROM 
                   Users WHERE 
                   UserID = ? ';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        $userName = $stmt->fetch()['Username'];

        return $userName;
    }

    function addUser($username, $password, $name) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Users VALUES (NULL, ?, ?, ?, ?, NULL)');
        $stmt->execute(array($username, $password, $name, ""));
    }

    function getFavouritePets($username) {
        global $db;

        $stmt = $db->prepare(
            'SELECT Pets.* FROM 
             (UserFavouritePets JOIN Pets ON UserFavouritePets.PetID = Pets.PetID) 
             JOIN Users ON UserFavouritePets.UserID = Users.UserID
             WHERE Username = ?;'
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
        global $db;

        $stmt = $db->prepare(
            'SELECT *
            FROM AdoptionPosts JOIN Users
            ON AdoptionPosts.AuthorID=Users.UserID
            WHERE Users.Username=?'
        );

        $stmt->execute(array($username));
        return $stmt->fetchAll();
    }
?>