<?php
require_once __DIR__ . '/../../Controllers/Admin/AuthController.php';
require_once __DIR__ . '/../../Controllers/Admin/Database/database.php';

AuthController::checkAdmin(); // Ensure admin access

class DashboardAdmin { // Fixed class name
    private $db;

    public function __construct($pdo) { // Accept PDO instance
        $this->db = $pdo;
    }

    public function getAllUsers() {
        try {
            $stmt = $this->db->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return []; // Return empty array on error
        }
    }

    public function getUserById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function createUser($data) {
        try {
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $role = isset($data['role']) && in_array($data['role'], ['1', '2']) ? $data['role'] : '2';
            $gender = isset($data['gender']) && in_array($data['gender'], ['male', 'female']) ? $data['gender'] : NULL;

            $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role, gender) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$data['name'], $data['email'], $hashedPassword, $role, $gender]);
        } catch (PDOException $e) {
            return false; // Handle user creation error
        }
    }

    public function updateUser($id, $data) {
        try {
            $role = isset($data['role']) && in_array($data['role'], ['1', '2']) ? $data['role'] : '2';
            $gender = isset($data['gender']) && in_array($data['gender'], ['male', 'female']) ? $data['gender'] : NULL;

            $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, role = ?, gender = ? WHERE id = ?");
            return $stmt->execute([$data['name'], $data['email'], $role, $gender, $id]);
        } catch (PDOException $e) {
            return false; // Handle user update error
        }
    }

    public function deleteUser($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false; // Handle user deletion error
        }
    }
}
?>
