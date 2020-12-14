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

    function getUser($username) {

        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user;
    }

    function getUserByUsername($username) {

        global $db;

        $query =  'SELECT * FROM 
                   Users WHERE 
                   Username = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($username));
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

    function addUser($username, $password, $name, $photo) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Users VALUES (NULL, ?, ?, ?, ?, ?)');
        $stmt->execute(array($username, $password, $name, "", $photo));
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

    function changePassword($username, $old, $new) {
        global $db;

        $stmt = $db->prepare(
            'SELECT *
            FROM Users
            WHERE Username=?'
        );

        $stmt->execute(array($username));
        $currentPass = ($stmt->fetch())['Password'];

        if($old == $currentPass) {
            if($currentPass != $new) {
                $stmt = $db->prepare(
                    'UPDATE Users
                    SET Password=?
                    WHERE Username=?'
                );
                $stmt->execute(array($new, $username));
                $currentPass = $stmt->fetch();
                return 0;
            }
            return 1;
        } 
        return 2;
    }

    function changeUsername($currentUsername, $newUsername) {
        global $db;

        $stmt = $db->prepare(
            'SELECT *
            FROM Users
            WHERE Username=?'
        );

        $stmt->execute(array($newUsername));
        $conflicts = $stmt->fetchAll();

        if($currentUsername != $newUsername) {
            if(count($conflicts) == 0) {
                $stmt = $db->prepare(
                    'UPDATE Users
                    SET Username=?
                    WHERE Username=?'
                );
        
                $stmt->execute(array($newUsername, $currentUsername));
                return 0;
            } 
            return 1;
        } 
        return 2;
    }

    function changeProfileInfo($username, $newName, $newBio) {
        global $db;

        $stmt = $db->prepare(
            'UPDATE Users
            SET Name=?, Biography=?
            WHERE Username=?'
        );

        if($stmt->execute(array($newName, $newBio, $username)))
            return 0;   
        return 1;     
    }
?> 