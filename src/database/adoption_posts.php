<?php
    function fetchAllAdoptionPosts() {
        global $db;
        
        $query =   'SELECT * FROM 
                    AdoptionPosts';
        
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
?>