<?php
class HomeAdminController{
  public function homeAdmin(){
    include 'app/Views/Admin/HomeAdminView.php';
  }
  public function productAdmin(){
    $adminModel = new ProductModelAdmin();
    $listProduct = $adminModel -> getAllProduct();
    include 'app/Views/Admin/ProductViewAdmin.php';

  }
  public function deleteProduct(){
   if(!isset($_GET['id'])){
    $_SESSION['message'] = "Vui lòng chọn sản phẩm cần xóa!";
    header("Location: " . BASE_URL . "?role=admin&act=list-product");
    exit;
   }
   $productDelete = new ProductModelAdmin();
   $message = $productDelete->deleteProductById();
   if($message){
    $_SESSION['message'] = "Xóa thành công";
    header("Location: " . BASE_URL . "?role=admin&act=list-product");
    exit;
   }else{
    $_SESSION['message'] = "Xóa thất bại";
    header("Location: " . BASE_URL . "?role=admin&act=list-product");
    exit;
   }
  }
  public function addProduct(){
    $categoryModel = new ProductModelAdmin();
    $listCategory = $categoryModel->allCategory();
    include 'app/Views/Admin/AddProductByAdmin.php';
  }
  public function addPostProduct(){
    $productModel = new ProductModelAdmin();
    $idProduct = $productModel->addProductToDB();
      if(!$idProduct){
        header("Location: " . BASE_URL . "?role=admin&act=add-product");
        exit;
    }else{
        header("Location: " . BASE_URL . "?role=admin&act=list-product");
        exit;
    }
  }
  public function editProduct(){
    $categoryModel = new ProductModelAdmin();
    $listCategory = $categoryModel->allCategory();
        
    $productModel = new ProductModelAdmin();
    $product = $productModel->getProductByID();
    include 'app/Views/Admin/EditProductByAdmin.php';
  }
  public function editPostProduct(){
    $productModel = new ProductModelAdmin();
    $product = $productModel->getProductByID();
    $productModel = new ProductModelAdmin();
            $message = $productModel->updateProductToDB();

            if(!$message){
                $_SESSION['message'] = "Sửa không thành công!";
                header("Location: " . BASE_URL . "?role=admin&act=edit-product&id=" . $_GET['id']);
                exit;
            }else{
              $_SESSION['message'] = "Sửa thành công!";
            header("Location: " . BASE_URL . "?role=admin&act=list-product");
            exit;
            }
  }

}
?>