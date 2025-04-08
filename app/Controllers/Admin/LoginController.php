<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class LoginController {
    public function login() {
        include 'app/Views/Admin/login.php';
    }

    public function postLogin() {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $homeModel = new HomeModel();
        $dataUsers = $homeModel->checkLogin($email);

        // Verify the password using password_verify
        if ($dataUsers && password_verify($password, $dataUsers->password)) {
            $_SESSION['users'] = [
                'id' => $dataUsers->id,
                'name' => $dataUsers->name,
                'email' => $dataUsers->email,
                'role' => $dataUsers->role
            ];
            $_SESSION['success'] = "Welcome, " . $dataUsers->name . "! You have successfully logged in.";

            if ($dataUsers->role == 1) {
                header("Location: " . BASE_URL . "?role=admin&act=dashboard");
            } elseif ($dataUsers->role == 2) {
                header("Location: " . BASE_URL . "?role=user&act=dashboard");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: " . BASE_URL . "?role=admin&act=login");
            exit();
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset(); // Clear all session variables
            session_destroy(); // Destroy the session
        }
        // Avoid starting a new session immediately after destroying the old one
        header("Location: " . BASE_URL . ""); // Redirect with a query parameter
        exit();
    }

    public function checkAccess($role) {
        if (isset($_SESSION['users']) && $_SESSION['users']['role'] == $role) {
            return true; // Allow access if the user has the correct role
        }
        return false; // Deny access otherwise
    }

    public function restrictAdminAccess() {
        if (!isset($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
            $_SESSION['error'] = "You must be logged in as an admin to access this page.";
            header("Location: " . BASE_URL . "?role=admin&act=login");
            exit();
        }
    }

    // public function restrictUserAccess() {
    //     if (!isset($_SESSION['users']) || $_SESSION['users']['role'] != 2) {
    //         $_SESSION['error'] = "You must be logged in as a user to access this page.";
    //         header("Location: " . BASE_URL . "?role=admin&act=login");
    //         exit();
    //     }
    // }
}
?>
