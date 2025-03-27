<?php
class HomeAdminController{
  public function homeAdmin(){
    include 'app/Views/Admin/HomeAdminView.php';
  }
  public function productAdmin(){
    $adminModel = new ProductModelAdmin();
    $listProduct = $adminModel -> getAllProduct();
    include 'app/Views/Admin/products/ProductViewAdmin.php';

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
    include 'app/Views/Admin/products/AddProductByAdmin.php';
  }
  public function addPostProduct(){
    $uploadDir = 'assets/Admin/upload/'; 
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $destPath = "";
            if(!empty($_FILES['image']['name'])){
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileType = mime_content_type($fileTmpPath);
                $fileName = basename($_FILES['image']['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $newFileName = uniqid() . '.' . $fileExtension;
                if(in_array($fileType, $allowedTypes)){
                    $destPath = $uploadDir . $newFileName;
                    if(!move_uploaded_file($fileTmpPath, $destPath)){
                        $destPath = "";
                    }
                }
            }
    $productModel = new ProductModelAdmin();
    $idProduct = $productModel->addProductToDB($destPath);
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
    include 'app/Views/Admin/products/EditProductByAdmin.php';
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