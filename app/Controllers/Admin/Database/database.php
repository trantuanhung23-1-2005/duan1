<?php
class Database {
    private $host = "localhost";
    private $dbname = "duan1";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Remove or comment out the debugging message
            // echo "Kết nối database thành công!";
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
?>
