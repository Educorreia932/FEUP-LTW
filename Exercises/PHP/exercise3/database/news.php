<?php
    function getAllNews() {
        $query =   'SELECT news.*, users.*, COUNT(comments.id) AS comments, name AS author
                    FROM news JOIN
                        users USING (username) LEFT JOIN
                        comments ON comments.news_id = news.id
                    GROUP BY news.id, users.username
                    ORDER BY published DESC';

        global $db;
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
?>