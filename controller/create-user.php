<?php
    require_once(__DIR__ . "/../model/config.php");
    
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $salt = "$5$" . "rounds=500$" . uniqid(mt_rand(), true) . "$";
  
    $hashedPassword = crypt($password, $salt);
    
    $query = $_SESSION["connection"]->query("INSERT INTO users SET "
            . "email = '$email',"
            . "username = '$username',"
            . "password = '$hashedPassword',"
            . "salt = '$salt'");
  /*querys email, username, and password*/  
    
    if($query) {
        echo "Successsfully created user: $username";
        /*When the user types in their username, this message will come up*/
    }
    else{
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }