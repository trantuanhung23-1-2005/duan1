<?php
require_once __DIR__ . "/../../Models/Admin/AuthModel.php";
require_once __DIR__ . "/../Admin/Database/database.php"; 

class AuthController {
    private $authModel;

    public function __construct() {
        $this->startSession(); // Ensure session is started
        $database = new Database(); // Initialize Database instance
        $this->authModel = new AuthModel($database->conn); // Pass PDO connection to AuthModel
    }

    private function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Start session only if not already started
        }
    }

    public function login($data) {
        // $this->startSession(); // Ensure session is started
        // $email = $data['email'] ?? '';
        // $password = $data['password'] ?? '';

        // if (empty($email) || empty($password)) {
        //     $error = "Email và mật khẩu không được để trống.";
        //     include __DIR__ . "/../../Views/Admin/Signin.php";
        //     return;
        // }

        // $user = $this->authModel->signin($email, $password);

        // if ($user) {
        //     $_SESSION['user'] = $user;
        //     // Redirect based on user role
        //     if ($user['role'] === 'admin') {
        //         header("Location: ?role=admin&act=dashboard"); // Redirect to admin dashboard
        //     } else {
        //         header("Location: ?role=user&act=home"); // Redirect to user home
        //     }
        //     exit;
        // } else {
        //     $error = "Sai thông tin đăng nhập!";
        //     include __DIR__ . "/../../Views/Admin/Signin.php";
        // }
        echo "Đăng nhập thành công!";
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'] ?? 'user';

            if ($this->authModel->register($email, $password, $role)) {
                header("Location: ?role=admin&act=signin"); // Redirect to the signin page
                exit;
            } else {
                echo "Đăng ký thất bại!";
            }
        }
    }
    public function test(){
         include __DIR__ . 'app/Views/Admin/Signin.php'; // Render the admin dashboard
    }
    public function logout() {
        $this->startSession(); // Ensure session is started
        session_destroy();
        header("Location: ?role=admin&act=signin"); // Redirect to the signin page
        exit;
    }

    public static function checkAdmin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Start session only if not already started
        }

        // Prevent redirection loop by skipping check on the signin page
        if (isset($_GET['role'], $_GET['act']) && $_GET['role'] === 'admin' && $_GET['act'] === 'signin') {
            return;
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: ?role=admin&act=signin"); // Redirect to the signin page
            exit;
        }
    }
}
?>
