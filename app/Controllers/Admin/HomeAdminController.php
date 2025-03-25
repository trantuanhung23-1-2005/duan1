<?php
require_once __DIR__ . "/AuthController.php"; 
require_once __DIR__ . "/../Admin/Database/database.php";
require_once __DIR__ . "/../../Models/Admin/DashboardAdmin.php";

class HomeAdminController {
    private $dashboardModel;

    public function __construct() {
        AuthController::checkAdmin(); // Ensure admin access

        $database = new Database(); // Initialize Database instance
        $this->dashboardModel = new DashboardAdmin($database->conn); // Use correct class name
    }

    public function index() {
        AuthController::checkAdmin(); // Ensure admin access
        include __DIR__ . '/../../Views/Admin/HomeAdminView.php';
    }

    public function list() {
        $users = $this->dashboardModel->getAllUsers();
        include __DIR__ . "/../../Views/Admin/AdminList.php";
    }
    
    public function create() {
        include __DIR__ . '/../../Views/Admin/Create.php';
    }

    public function store($data) {
        if (!isset($data['name'], $data['email'], $data['password'])) {
            header("Location: ?role=admin&act=create&error=missing_data");
            exit();
        }

        $created = $this->dashboardModel->createUser($data);
        if ($created) {
            header("Location: ?role=admin&act=adminlist&success=created");
        } else {
            header("Location: ?role=admin&act=create&error=failed");
        }
        exit();
    }

    public function edit($id) {
        $user = $this->dashboardModel->getUserById($id);
        if (!$user) {
            header("Location: ?role=admin&act=adminlist&error=user_not_found");
            exit();
        }
        include __DIR__ . '/../../Views/Admin/Edit.php';
    }

    public function update($id, $data) {
        if (!isset($data['name'], $data['email'])) {
            header("Location: ?role=admin&act=edit&id={$id}&error=missing_data");
            exit();
        }

        $updated = $this->dashboardModel->updateUser($id, $data);
        if ($updated) {
            header("Location: ?role=admin&act=adminlist&success=updated");
        } else {
            header("Location: ?role=admin&act=edit&id={$id}&error=failed");
        }
        exit();
    }

    public function destroy($id) {
        $deleted = $this->dashboardModel->deleteUser($id);
        if ($deleted) {
            header("Location: ?role=admin&act=adminlist&success=deleted");
        } else {
            header("Location: ?role=admin&act=adminlist&error=failed");
        }
        exit();
    }
}
?>
