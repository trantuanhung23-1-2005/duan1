<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class RegisterController {
    public function register() {
        include 'app/Views/Admin/register.php';
    }

    public function postRegister() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Passwords do not match.";
            header("Location: " . BASE_URL . "?role=admin&act=register");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $homeModel = new HomeModel();
        $result = $homeModel->registerUser($name, $email, $hashedPassword);

        if ($result) {
            $_SESSION['success'] = "Registration successful. Please log in.";
            header("Location: " . BASE_URL . "?role=admin&act=login");
        } else {
            $_SESSION['error'] = "Registration failed. Email may already be in use.";
            header("Location: " . BASE_URL . "?role=admin&act=register");
        }
        exit();
    }
}
?>
