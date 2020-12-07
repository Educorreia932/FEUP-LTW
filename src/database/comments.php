<?php
    function addComment($comment,$date,$petID,$username){
        global $db;

        $stmt = $db->prepare('INSERT INTO Comments VALUES (NULL, ?, ?, ?, ?)');
        $stmt->execute(array($comment,$date,$petID,$username));
    }
?>
