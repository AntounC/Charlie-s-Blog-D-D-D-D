<?php
/*declares variables for connection, host, username, password, and database which are all privatex*/
/*private makes the variable only usable in this specific file*/
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
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }
    /*checks if there is a connection and returns true or false*/
    /*if statement checks whether or not the connection has been opened*/
    /*isset checks whether the variable has been set or not checks for information in variablle*/
    public function closeConnection() {
        if(isset($this->connection)) {     
            $this->connection->close();
        
         }
        
    }
    
    public function query($string) {
      $this->openConnection();  
      
      $query = $this->connection->query($string); /*the -> notation specifies an execution of an action between to actions*/
      
      $this->closeConnection();
      /*in this function, the connection is opened, queryed, closed, and returned*/
      
      return $query; 
    }
    
}

