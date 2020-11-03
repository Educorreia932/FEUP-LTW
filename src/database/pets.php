<?php
    function getAllPets() {
        global $db;
        
        $query = 'SELECT * FROM Pets';
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
?>