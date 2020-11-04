<?php
   session_start();                         // Starts the session
   include_once('database/connection.php'); // Connects to the database
   include_once('database/users.php');      // Loads the functions responsible for the users table
 
   if (userExists($_POST['username'], $_POST['password']))  // Test if user exists
     $_SESSION['username'] = $_POST['username'];            // Store the username
 
   header('Location: ' . $_SERVER['HTTP_REFERER']);
