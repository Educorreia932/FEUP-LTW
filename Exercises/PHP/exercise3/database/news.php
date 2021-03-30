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

    function updateNews($id, $title, $introduction, $fulltext) {
        global $db;

        $stmt = $db->prepare('UPDATE news 
                            SET title = ?, introduction = ?, fulltext = ?
                            WHERE id = ?');

        $stmt->execute(array($title, $introduction, $fulltext, $id));
    }

    function deleteNews($id) {
        global $db;

        $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute(array($id));
    }
?>