<?php
require_once "app/Controllers/Admin/CategoryController.php";

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";

if ($role == "user") {
    switch ($act) {
        case '':
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;
        
        default:
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;
    }
} else {
    switch ($act) {
        case '':
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
        
        case 'listCategories':
            $categoryController = new CategoryController();
            $categoryController->listCategory();
            break;
        
        case 'addCategory':
            $categoryController = new CategoryController();
            $categoryController->addCategory();
            break;
        
        case 'editCategory':
            $categoryController = new CategoryController();
            $categoryController->editCategory();
            break;
        
        case 'deleteCategory':
            $categoryController = new CategoryController();
            $categoryController->deleteCategory();
            break;
        
        default:
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
    }
}