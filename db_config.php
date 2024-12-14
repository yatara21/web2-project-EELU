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
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to safely close connection
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // Generic method to handle potential database errors
    public function handleError($stmt = null) {
        if ($stmt) {
            $stmt->close();
        }
        echo "Error: " . $this->conn->error;
        return false;
    }
}
?>