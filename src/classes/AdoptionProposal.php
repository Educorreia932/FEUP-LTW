<?php
    require_once(__DIR__ . "/../config.php");
    require_once(ROOT . '/database/connection.php');
    
    class AdoptionProposal {
        public $id;
        public $text;
        public $date;
        public $author;

        public function __construct($id, $text, $date, $author) {
            $this->id = $id;
            $this->text = $text;
            $this->date = $date;
            $this->author = $author;
        }
    }
?>