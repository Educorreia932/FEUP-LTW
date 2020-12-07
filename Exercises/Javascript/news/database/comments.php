<?php
  function getCommentsByNewId($id) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function addComment($id, $username, $published , $comment_text) {
    global $db;
    $stmt = $db->prepare('INSERT INTO comments VALUES(NULL, ?, ?, ?, ?)');
    $stmt->execute(array($id, $username, $published , $comment_text));
  }

  function fecthAfterComments($id, $comment_id) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM comments WHERE news_id = ? AND id > ?');
    $stmt->execute(array($id, $comment_id));
    return $stmt->fetchAll();
  }
?>
