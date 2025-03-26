<?php

$role = isset($_GET['role']) ? $_GET['role'] : "user";
$act = isset($_GET['act']) ? $_GET['act'] : "";
if($role == "user"){
  switch ($act) {
    case '':{
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
    }
    
    default:
      $homeUserController = new HomeUserController();
      $homeUserController->homeUser();
      break;
  }
}else{
  switch ($act) {
    //http://localhost/duan1hoclai/?role=admin
    case 'home':{
      $homeAdminController = new HomeAdminController();
      $homeAdminController->homeAdmin();
      break;
    }
    case 'list-product':{
      $homeAdminController = new HomeAdminController();
      $homeAdminController->productAdmin();
      break;
    }
    case 'delete-product':{
      $homeAdminController = new HomeAdminController();
      $homeAdminController->deleteProduct();
      break;
    }
    //lấy category
    case 'add-product':{
      $addProduct = new HomeAdminController();
      $addProduct->addProduct();
      break;
    }
    //thêm sản phẩm
    case 'add-post-product':{
      $addProduct = new HomeAdminController();
      $addProduct->addPostProduct();
      break;
    }
    case 'edit-product':{
      $addProduct = new HomeAdminController();
      $addProduct->editProduct();
      break;
    }
    case 'edit-post-product':{
      $addProduct = new HomeAdminController();
      $addProduct->editPostProduct();
      break;
    }
    case 'listCategories':{
      $categoryController = new CategoryController();
      $categoryController->listCategory();
      break;
    }
  case 'addCategory':{
      $categoryController = new CategoryController();
      $categoryController->addCategory();
      break;
    }
  case 'editCategory':{
      $categoryController = new CategoryController();
      $categoryController->editCategory();
      break;
    }
  case 'deleteCategory':{
      $categoryController = new CategoryController();
      $categoryController->deleteCategory();
      break;
    }
    case 'list-user':{
      $userAdminController = new UserAdminController();
      $userAdminController->userList();
      break;
    }
    case 'list-add':{
      $userAdminController = new UserAdminController();
      $userAdminController->addUser();
      break;
    }
    case 'list-post-add':{
      $userAdminController = new UserAdminController();
      $userAdminController->addPostUser();
      break;
    }
    case 'list-edit':{
      $userAdminController = new UserAdminController();
      $userAdminController->editUser();
      break;
    }
      case 'list-post-edit':{
      $userAdminController = new UserAdminController();
      $userAdminController->editPostUser();
      break;
    }
    case 'list-delete':{
      $userAdminController = new UserAdminController();
      $userAdminController->deleteUser();
      break;
    }

    default:
    $homeAdminController = new HomeAdminController();
    $homeAdminController->homeAdmin();
      break;
  }
}


?>