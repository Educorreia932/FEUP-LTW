<?php
    class AdoptionPost {
        public $pet;
        public $title;
        public $description;
        public $location;
        public $date;
        public $author;

        public function __construct($id, $title, $description, $location, $date, $author) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->location = $location;
            $this->date = $date;
            $this->author = $author;
        }

        public static function fromArray($adoption_post_entry) {
            return new AdoptionPost(
                $adoption_post_entry["AdoptionPostID"],
                $adoption_post_entry["Title"],
                $adoption_post_entry["Description"],
                $adoption_post_entry["Location"],
                $adoption_post_entry["Date"],
                $adoption_post_entry["AuthorID"],
            );
        }

        public function addToDatabase() {
            global $db;

            $date_now = new DateTime('NOW');
		    $date_text = $date_now->format('d-m-Y H:i:s');
            
		    $transaction = $db->prepare('INSERT INTO AdoptionPosts VALUES (?, ?, ?, ?, ?, ?)');

		    $posterID = (int) getUser($_SESSION['username'], $_SESSION['password'])['UserID'];

		    $transaction->execute(
                array(
                    $this->id,
                    $this->title,
                    $this->description, 
                    $this->location, 
                    $this->date, 
                    $this->author->id
                )
            );
        }

        public static function getByID($id) {
            global $db;
    
            $query = 'SELECT *
                      FROM AdoptionPosts
                      WHERE AdoptionPostID = ?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($id));

            $adoption_post_entry = $stmt->fetch();
            $adoption_post = AdoptionPost::fromArray($adoption_post_entry);
    
            return $adoption_post;
        }
    }
?>