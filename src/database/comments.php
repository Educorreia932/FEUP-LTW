<?php

    function getComments($post){
        global $db;

        $query =   'SELECT * FROM 
                    Comments where AdoptionPostID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($post));

        return $stmt->fetchAll();
    }

    function getReply($comment) {
        global $db;

        $query =   'SELECT * FROM 
                    Replies where QuestionID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($comment['ID']));

        return $stmt->fetch();
    }

    function addComment($text, $date, $pet_id, $username) {
        global $db;

        $user_id = getUserID($username);

        $stmt = $db->prepare('INSERT INTO Comments VALUES (NULL, ?, ?, ?, ?)');
        $stmt->execute(array($text, $date, $pet_id, $user_id));

        $stmt = $db->prepare('SELECT MAX(ID) as LastCommentID FROM Comments');
        $stmt->execute();

        return $stmt->fetch()["LastCommentID"];
    }

    function fecthAfterComments($comment_id, $username) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM Comments NATURAL JOIN Users WHERE Comments.ID = ? AND Users.Username = ?' );
        $stmt->execute(array($comment_id, $username));

        return $stmt->fetchAll();
    }

    function addReply($text, $date, $questionID) {
        global $db;

        $stmt = $db->prepare('INSERT INTO Replies VALUES (NULL, ?, ?, ?)');
        $stmt->execute(array($text, $date, $questionID));

        // $stmt = $db->prepare('SELECT MAX(ID) as LastCommentID FROM Comments JOIN Replies');

        // $stmt = $db->prepare('SELECT Comments.ID 
        //                      FROM (
        //                          (Comments JOIN Replies),
        //                          (SELECT MAX(ID) as LastReplied
        //                             FROM Replies
        //                          )

        // ');
        $stmt->execute();

        //return $stmt->fetch()["LastCommentID"];
    }
?>
