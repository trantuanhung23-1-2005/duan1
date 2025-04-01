<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";
if ($role == "user") {
    $loginController = new LoginController();
    switch ($act) {
        case '':
            $loginController->restrictUserAccess(); // Restrict access to user
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;

        default:
            $loginController->restrictUserAccess(); // Restrict access to user
            $homeUserController = new HomeUserController();
            $homeUserController->homeUser();
            break;
    }
} else {
    $loginController = new LoginController();
    switch ($act) {
        case 'home': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
        }

        case 'login': {
            $loginController->login();
            break;
        }

        case 'adminaccessadminaccess': {
            $loginController->restrictAdminAccess();
            $loginController->restrictAdminAccess();
            break;
        }

        case 'post-login': {
            $loginController->postLogin();
            break;
        }

        case 'list-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->productAdmin();
            break;
        }

        case 'delete-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->deleteProduct();
            break;
        }

        case 'add-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->addProduct();
            break;
        }

        case 'add-post-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->addPostProduct();
            break;
        }

        case 'edit-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->editProduct();
            break;
        }

        case 'edit-post-product': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $addProduct = new HomeAdminController();
            $addProduct->editPostProduct();
            break;
        }

        case 'listCategories': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->listCategory();
            break;
        }

        case 'addCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->addCategory();
            break;
        }

        case 'editCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->editCategory();
            break;
        }

        case 'deleteCategory': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $categoryController = new CategoryController();
            $categoryController->deleteCategory();
            break;
        }

        case 'list-user': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->userList();
            break;
        }

        case 'list-add': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->addUser();
            break;
        }

        case 'list-post-add': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->addPostUser();
            break;
        }

        case 'list-edit': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->editUser();
            break;
        }

        case 'list-post-edit': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->editPostUser();
            break;
        }

        case 'list-delete': {
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $userAdminController = new UserAdminController();
            $userAdminController->deleteUser();
            break;
        }

        case 'register': {
            $registerController = new RegisterController();
            $registerController->register();
            break;
        }

        case 'postRegister': {
            $registerController = new RegisterController();
            $registerController->postRegister();
            break;
        }

        default:
            $loginController->restrictAdminAccess(); // Restrict access to admin
            $homeAdminController = new HomeAdminController();
            $homeAdminController->homeAdmin();
            break;
    }
}

?>