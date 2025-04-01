<?php
class HomeModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialize the Database object
    }
    public function getAllProductByUser() {
        $sql = "SELECT * FROM users";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll(); 
        return $result;
    }

    public function checkLogin($email) {
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch();
        if ($result && password_verify($password, $result->password)) {
            return $result; // Return the user data if login is successful
        } else {
            return false; // Return false if login fails
        }
    }

    public function registerUser($name, $email, $password) {
        $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 2)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        try {
            return $stmt->execute(); // Return true if registration is successful
        } catch (PDOException $e) {
            return false; // Return false if an error occurs (e.g., duplicate email)
        }
    }
}
?>
