<?php
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
?>
