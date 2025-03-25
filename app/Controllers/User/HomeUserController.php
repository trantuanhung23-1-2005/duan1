<?php
class HomeUserController{
  public function homeUser(){
    $usercontroller = new DashboardUser();
    $list = $usercontroller -> getAllProductByUser();
    include 'app/Views/User/HomeUserView.php';
  }
  public function productDetail(){
    if (isset($_GET['product_id'])) {
      $id = intval($_GET['product_id']); // Ép kiểu ID
      $productDetail = new DashboardUser();
      $productDetailList = $productDetail->getProductById($id);
  }
  include 'app/Views/User/HomeProductDetail.php';  
}
public function productListUser(){
  $usercontroller = new DashboardUser();
  $list = $usercontroller -> getAllProductByUser();
  include 'app/Views/User/HomeProductList.php'; 
}
}

?>