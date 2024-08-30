<?php
class DbConnect {
    private $connection;
    private $username;
    private $password;
    private $database;
    private $port;


    function __construct($username, $password, $database) {
        $this->connection = "127.0.0.1";
        $this->port = 3306;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    function connect(){
        $conn = new mysqli($this->connection, $this->username, $this->password,
            $this->database, $this->port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error . "\n");
        }
//        echo "Connected successfully";
        return $conn;
    }
}
?>