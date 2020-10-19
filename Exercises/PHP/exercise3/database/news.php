<?php
    function getAllNews() {
        global $db;
        
        $query =   'SELECT news.*, users.*, COUNT(comments.id) AS comments, name AS author
                    FROM news JOIN
                        users USING (username) LEFT JOIN
                        comments ON comments.news_id = news.id
                    GROUP BY news.id, users.username
                    ORDER BY published DESC';
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    function getArticle($id) {
        global $db;

        $stmt = $db->prepare('SELECT *, name AS author FROM news JOIN users USING (username) WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function getComments($id) {
        global $db;
        
        $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }
?>