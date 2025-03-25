<?php
require_once __DIR__ . "/../app/Controllers/Admin/HomeAdminController.php";
require_once __DIR__ . "/../app/Controllers/User/HomeUserController.php";
require_once __DIR__ . "/../app/Controllers/Admin/AuthController.php";

$role = isset($_GET['role']) ? $_GET['role'] : "admin";
$act = isset($_GET['act']) ? $_GET['act'] : "";

// Khởi tạo controller dựa vào vai trò
if ($role === "admin") {
    $homeAdminController = new HomeAdminController();
    $authController = new AuthController(); // Sửa lỗi khai báo sai biến
} elseif ($role === "user") {
    $homeUserController = new HomeUserController();
} else {
    die("Lỗi: Vai trò không hợp lệ.");
}

// Xử lý logic theo vai trò
if ($role === "admin") {
    switch ($act) {
        case 'signin': 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->login($_POST); 
                // Call the login method with POST data
            } else {
                include __DIR__ . '/../app/Views/Admin/Signin.php'; // Render the signin view
            }
            break;

        case 'register': 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->register();
            } else {
                include __DIR__ . '/../app/Views/Admin/Signup.php'; // Render the signup view
            }
            break;
            
        case 'dashboard': // Admin home page
            AuthController::checkAdmin(); // Ensure admin access
            include __DIR__ . '/../app/Views/Admin/HomeAdminView.php'; // Render the admin dashboard
            break;
            case 'test': // Admin home page
            $test = new AuthController();
            $test->test();
            break;

        default:
            AuthController::checkAdmin(); // Ensure admin access for other actions
            switch ($act) {
                case '':
                case 'adminlist':
                    $homeAdminController->list();
                    break;

                case 'create':
                    $homeAdminController->create();
                    break;

                case 'store':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $homeAdminController->store($_POST);
                        header("Location: ?role=admin&act=adminlist");
                    }
                    break;

                case 'edit':
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $homeAdminController->edit($_GET['id']);
                    } else {
                        die("Lỗi: ID không hợp lệ.");
                    }
                    break;

                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $homeAdminController->update($_GET['id'], $_POST);
                        header("Location: ?role=admin&act=adminlist");
                    } else {
                        die("Lỗi: Dữ liệu không hợp lệ.");
                    }
                    break;

                case 'delete':
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $homeAdminController->destroy($_GET['id']);
                        header("Location: ?role=admin&act=adminlist");
                    } else {
                        die("Lỗi: ID không hợp lệ.");
                    }
                    break;

                default:
                    $homeAdminController->index();
                    break;
            }
            break;
    }
} elseif ($role === "user") {
    switch ($act) {
        case 'home': // User home page
            include __DIR__ . '/../app/Views/User/HomeUserView.php';
            break;

        default:
            include __DIR__ . '/../app/Views/User/HomeUserView.php'; // Default to user home page
            break;
    }
}
?>
