<?php
class UserModelAdmin {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // 🟢 Lấy tất cả user
    public function getAllUsers() {
        try {
            $query = "SELECT id, name, email, 
                      CASE WHEN role = '1' THEN 'admin' ELSE 'user' END AS role, 
                      gender, phone 
                      FROM users"; // Include phone in the query
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Lỗi getAllUsers: " . $e->getMessage());
            return [];
        }
    }

    // 🟢 Thêm user mới
    public function addUserToDB($name, $email, $password, $role, $gender, $phone) {
        try {
            // Chuyển role thành '1' hoặc '2'
            $roleValue = ($role === 'admin') ? '1' : '2';

            // Kiểm tra email đã tồn tại chưa
            if ($this->isEmailExists($email)) {
                error_log("Email đã tồn tại: $email");
                return false;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (name, email, password, role, gender, phone) 
                      VALUES (:name, :email, :password, :role, :gender, :phone)"; // Add phone to query
            $stmt = $this->db->pdo->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":role", $roleValue);
            $stmt->bindParam(":gender", $gender);
            $stmt->bindParam(":phone", $phone); // Bind phone

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi addUserToDB: " . $e->getMessage());
            return false;
        }
    }

    // 🟢 Lấy user theo ID
    public function getUserById($id) {
        try {
            $query = "SELECT id, name, email, 
                      CASE WHEN role = '1' THEN 'admin' ELSE 'user' END AS role, 
                      gender, phone 
                      FROM users WHERE id = :id LIMIT 1"; // Include phone in query
            $stmt = $this->db->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ); // Return phone with other data
        } catch (PDOException $e) {
            error_log("Lỗi lấy user theo ID: " . $e->getMessage());
            return null;
        }
    }

    // 🟢 Cập nhật user (có kiểm tra password)
    public function updateUserToDB($id, $name, $email, $role, $gender, $phone, $password = null) {
        try {
            // Kiểm tra ID có tồn tại không
            $checkQuery = "SELECT id FROM users WHERE id = :id";$checkStmt = $this->db->pdo->prepare($checkQuery);
            $checkStmt->bindParam(":id", $id, PDO::PARAM_INT);
            $checkStmt->execute();
            $existingUser = $checkStmt->fetch(PDO::FETCH_OBJ);

            if (!$existingUser) {
                error_log("Không tìm thấy user với ID: $id");
                return false;
            }

            $roleValue = ($role === 'admin') ? '1' : '2';

            if ($password) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET name = :name, email = :email, password = :password, role = :role, gender = :gender, phone = :phone WHERE id = :id";
            } else {
                $query = "UPDATE users SET name = :name, email = :email, role = :role, gender = :gender, phone = :phone WHERE id = :id";
            }

            $stmt = $this->db->pdo->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":role", $roleValue);
            $stmt->bindParam(":gender", $gender);
            $stmt->bindParam(":phone", $phone); // Bind phone
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            if ($password) {
                $stmt->bindParam(":password", $hashedPassword);
            }

            $result = $stmt->execute();

            if (!$result) {
                $errorInfo = $stmt->errorInfo();
                error_log("Lỗi khi update user ID: $id - " . implode(" | ", $errorInfo));
                return false;
            }

            return true;
        } catch (PDOException $e) {
            error_log("Lỗi updateUserToDB: " . $e->getMessage());
            return false;
        }
    }

    // 🟢 Xóa user
    public function deleteUserById($id) {
        try {
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi deleteUserById: " . $e->getMessage());
            return false;
        }
    }

    // 🟢 Kiểm tra email đã tồn tại chưa
    private function isEmailExists($email) {
        try {
            $query = "SELECT id FROM users WHERE email = :email";
            $stmt = $this->db->pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ) ? true : false;
        } catch (PDOException $e) {
            error_log("Lỗi kiểm tra email: " . $e->getMessage());
            return false;
        }
    }
}
?>