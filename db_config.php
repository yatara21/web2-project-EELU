<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'web-app-db';
    public $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Database connection error . $this->conn->connect_error");
        }
    }

    // Close connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>