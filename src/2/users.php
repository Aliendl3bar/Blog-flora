<?php
class User {
    private $id;
    private $username;
    private $email;
    private $password;
    
    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    // Setters
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            echo "Invalid email format";
        }
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setId($id) {
        if (is_numeric($id)) {
            $this->id = $id;
        } else {
            echo "id must be a number";
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    // Save new user
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO user (username, email, password) 
        VALUES (:username, :email, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            echo "User registered successfully.";
            return true;
        } else {
            echo "Error registering user.";
            return false;
        }
    }

    // Get all users
    public static function getAll() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT id, username, email FROM user ORDER BY id DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get user by ID
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT id, username, email FROM user WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get user by username
    public static function getByUsername($username) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM user WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Verify password during login
    public static function verifyPassword($username, $password) {
        $user = self::getByUsername($username);
        
        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }

    // Update user
    public function update($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "UPDATE user SET username = :username, email = :email WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "User updated successfully.";
            return true;
        } else {
            echo "Error updating user.";
            return false;
        }
    }

    // Delete user
    public static function delete($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "DELETE FROM user WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "User deleted successfully.";
            return true;
        } else {
            echo "Error deleting user.";
            return false;
        }
    }
}
?>