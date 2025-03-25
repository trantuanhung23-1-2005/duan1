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
    case 'product-detail':{
      $homeUserController = new HomeUserController();
      $homeUserController->productDetail();
      break;
    }
    case 'product-list-user':{
      $homeUserController = new HomeUserController();
      $homeUserController->productListUser();
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
    default:
    $homeAdminController = new HomeAdminController();
    $homeAdminController->homeAdmin();
      break;
  }
}


?>