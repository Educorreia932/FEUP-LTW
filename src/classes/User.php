<?php
    class User {
        public $id;
        public $username;
        public $password;
        public $name;
        public $biography;
        public $profile_picture;

        public function __construct($id, $username, $password, $name, $biography, $profile_picture) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->name = $name;
            $this->biography = $biography;
            $this->profile_picture = $profile_picture;
        }
    }
?>