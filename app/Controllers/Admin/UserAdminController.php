<?php
class UserAdminController {
    public function homeAdmin() {
        include 'app/Views/Admin/HomeAdminView.php';
    }

    public function userList() {
        $adminModel = new UserModelAdmin();
        $listUsers = $adminModel->getAllUsers();

        // Kiểm tra nếu dữ liệu trả về không hợp lệ
        if (!is_array($listUsers)) {
            $_SESSION['message'] = "Lỗi khi truy xuất dữ liệu!";
            $listUsers = [];
        }

        include 'app/Views/Admin/userlists/List.php';
    }

    public function deleteUser() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['message'] = "ID không hợp lệ!";
            header("Location: " . BASE_URL . "?role=admin&act=list-user");
            exit;
        }

        $userId = intval($_GET['id']);
        $userDelete = new UserModelAdmin();
        
        if ($userDelete->deleteUserById($userId)) {
            $_SESSION['message'] = "Xóa thành công!";
        } else {
            $_SESSION['message'] = "Xóa thất bại!";
        }
        
        // Redirect to the list user screen
        header("Location: " . BASE_URL . "?role=admin&act=list-user");
        exit;
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $phone = trim($_POST['phone'] ?? ''); // Add phone field
            $role = $_POST['role'] ?? 'user'; // Mặc định là user
            $gender = $_POST['gender'] ?? 'unknown';

            // Kiểm tra dữ liệu hợp lệ
            if (empty($name) || empty($email) || empty($password) || empty($phone) || !preg_match('/^\d{11}$/', $phone)) {
                $_SESSION['message'] = "Vui lòng nhập đầy đủ thông tin và số điện thoại hợp lệ!";
                header("Location: " . BASE_URL . "?role=admin&act=add-user");
                exit;
            }

            // Gọi model để thêm user
            $userModel = new UserModelAdmin();
            $success = $userModel->addUserToDB($name, $email, $password, $role, $gender, $phone); // Pass phone to model

            if ($success) {
                $_SESSION['message'] = "Thêm người dùng thành công!";
                header("Location: " . BASE_URL . "?role=admin&act=list-user");
                exit;
            } else {
                $_SESSION['message'] = "Lỗi khi thêm người dùng!";
                header("Location: " . BASE_URL . "?role=admin&act=add-user");
                exit;
            }
        }

        include 'app/Views/Admin/userlists/Add.php';
    }

    public function addPostUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModelAdmin();

            // Kiểm tra dữ liệu đầu vào
            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role']) || empty($_POST['gender']) || empty($_POST['phone']) || !preg_match('/^\d{11}$/', $_POST['phone'])) {
                $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin và số điện thoại hợp lệ!";
                header("Location: " . BASE_URL . "?role=admin&act=list-add");
                exit;
            }

            $success = $userModel->addUserToDB($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['gender'], $_POST['phone']); // Include phone

            if ($success) {
                $_SESSION['message'] = "Thêm người dùng thành công!";
                header("Location: " . BASE_URL . "?role=admin&act=list-user");
                exit;
            } else {
                $_SESSION['message'] = "Thêm thất bại!";
                header("Location: " . BASE_URL . "?role=admin&act=list-add");
                exit;
            }
        }
    }

    public function editUser() {
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Không tìm thấy người dùng!";
            header("Location: " . BASE_URL . "?role=admin&act=list-user");
            exit;
        }

        $userModel = new UserModelAdmin();
        $user = $userModel->getUserById($_GET['id']); // Ensure phone is fetched

        if (!$user) {
            $_SESSION['message'] = "Người dùng không tồn tại!";
            header("Location: " . BASE_URL . "?role=admin&act=list-user");
            exit;
        }

        include 'app/Views/Admin/userlists/Edit.php';
    }

    // Cập nhật thông tin user
    public function editPostUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['role']) || empty($_POST['gender']) || empty($_POST['phone']) || !preg_match('/^\d{10}$/', $_POST['phone'])) {
                $_SESSION['message'] = "Vui lòng nhập đầy đủ thông tin và số điện thoại hợp lệ!";
                header("Location: " . BASE_URL . "?role=admin&act=list-edit&id=" . $_POST['id']);
                exit;
            }

            $userModel = new UserModelAdmin();

            // Kiểm tra ID có tồn tại không
            $userExists = $userModel->getUserById($_POST['id']);
            if (!$userExists) {
                $_SESSION['message'] = "Người dùng không tồn tại!";
                header("Location: " . BASE_URL . "?role=admin&act=list-user");
                exit;
            }

            // Kiểm tra có cập nhật mật khẩu không
            $password = !empty($_POST['password']) ? $_POST['password'] : null;

            // Gọi update
            $success = $userModel->updateUserToDB($_POST['id'], $_POST['name'], $_POST['email'], $_POST['role'], $_POST['gender'], $_POST['phone'], $password); // Pass phone to model

            if ($success) {
                $_SESSION['message'] = "Sửa thành công!";
                // Redirect to the list user screen
                header("Location: " . BASE_URL . "?role=admin&act=list-user");
            } else {
                $_SESSION['message'] = "Sửa thất bại!";
                header("Location: " . BASE_URL . "?role=admin&act=list-edit&id=" . $_POST['id']);
            }
            exit;
        }
    }

}
?>
