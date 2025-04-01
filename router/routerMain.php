<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";
if($role == "user"){
    $loginController = new LoginController();
  switch ($act) {
    case '':{
      $loginController->restrictAdminAccess();
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
    }
    case 'product-detail':{
        $loginController->restrictAdminAccess();
      $homeUserController = new HomeUserController();
      $homeUserController->productDetail();
      break;
    }
    case 'product-list-user':{
        $loginController->restrictAdminAccess();
      $homeUserController = new HomeUserController();
      $homeUserController->productListUser();
      break;
    }
    case 'category_list':{
        $loginController->restrictAdminAccess();
      $homeUserController = new HomeUserController();
      $homeUserController->categoryList();
      break;
    }
    
    default:
    $loginController->restrictAdminAccess();
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
  }
}else{
    $loginController = new LoginController();
  switch ($act) {
    //http://localhost/duan1hoclai/?role=admin
    case 'home':{
        $loginController->restrictAdminAccess();
      $homeAdminController = new HomeAdminController();
      $homeAdminController->homeAdmin();
      break;
    }
    case 'login': {
        $loginController->restrictAdminAccess();
        $loginController->login();
        break;
    }

    case 'adminaccessadminaccess': {
        $loginController->restrictAdminAccess();
        $loginController->restrictAdminAccess();
        break;
    }

    case 'post-login': {
        $loginController->restrictAdminAccess();
        $loginController->postLogin();
        break;
    }
    case 'list-product':{
        $loginController->restrictAdminAccess();
      $homeAdminController = new HomeAdminController();
      $homeAdminController->productAdmin();
      break;
    }
    case 'delete-product':{
        $loginController->restrictAdminAccess();
      $homeAdminController = new HomeAdminController();
      $homeAdminController->deleteProduct();
      break;
    }
    //lấy category
    case 'add-product':{
        $loginController->restrictAdminAccess();
      $addProduct = new HomeAdminController();
      $addProduct->addProduct();
      break;
    }
    //thêm sản phẩm
    case 'add-post-product':{
        $loginController->restrictAdminAccess();
      $addProduct = new HomeAdminController();
      $addProduct->addPostProduct();
      break;
    }
    case 'edit-product':{
        $loginController->restrictAdminAccess();
      $addProduct = new HomeAdminController();
      $addProduct->editProduct();
      break;
    }
    case 'edit-post-product':{
        $loginController->restrictAdminAccess();
      $addProduct = new HomeAdminController();
      $addProduct->editPostProduct();
      break;
    }
    case 'listCategories':{
        $loginController->restrictAdminAccess();
      $categoryController = new CategoryController();
      $categoryController->listCategory();
      break;
    }
  case 'addCategory':{
    $loginController->restrictAdminAccess();
      $categoryController = new CategoryController();
      $categoryController->addCategory();
      break;
    }
  case 'editCategory':{
    $loginController->restrictAdminAccess();
      $categoryController = new CategoryController();
      $categoryController->editCategory();
      break;
    }
  case 'deleteCategory':{
    $loginController->restrictAdminAccess();
      $categoryController = new CategoryController();
      $categoryController->deleteCategory();
      break;
    }
    case 'list-user':{
        $loginController->restrictAdminAccess();
      $userAdminController = new UserAdminController();
      $userAdminController->userList();
      break;
    }
    case 'list-add':{
        $loginController->restrictAdminAccess();
      $userAdminController = new UserAdminController();
      $userAdminController->addUser();
      break;
    }
    case 'list-post-add':{
        $loginController->restrictAdminAccess();
      $userAdminController = new UserAdminController();
      $userAdminController->addPostUser();
      break;
    }
    case 'list-edit':{
        $loginController->restrictAdminAccess();
      $userAdminController = new UserAdminController();
      $userAdminController->editUser();
      break;
    }
      case 'list-post-edit':{
        $loginController->restrictAdminAccess();
      $userAdminController = new UserAdminController();
      $userAdminController->editPostUser();
      break;
    }
    case 'list-delete':{
        $loginController->restrictAdminAccess();
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