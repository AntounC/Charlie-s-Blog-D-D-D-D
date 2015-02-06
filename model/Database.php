<?php
class Database {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }
    /*uses the global variables listed^*/
    
    public function openConnection() {
        $this->connection = new mysqli();
    }

    public function closeConnection() {
        
    }
    
    public function query($string) {
        
    }
    
}

/*declares variables for connection, host, username, password, and database which are all privatex*/
/*private makes the variable only usable in this specific file*/