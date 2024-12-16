<?php
class UserManager {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    // Create a new user
    public function createUser($name, $email) {
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }


    // Get all users
    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    // Get a user by ID
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Update a user
    public function updateUser($id, $name, $email) {
        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a user
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>