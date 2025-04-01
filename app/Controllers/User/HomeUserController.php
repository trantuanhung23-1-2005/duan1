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
public function categoryList(){
  include 'app/Views/User/CategoryList.php'; 
}
 public function cartDetail(){
  $users_id = $_SESSION['users_id'] ?? null; // Lấy users_id nếu tồn tại, nếu không thì null
  if (!$users_id) {
    die("Bạn cần đăng nhập để thực hiện hành động này!");
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    // Kiểm tra dữ liệu hợp lệ
    if ($product_id) {
        switch ($action) {
            case "increase":
                $quantity++;
                break;
            case "decrease":
                if ($quantity > 1) {
                    $quantity--;
                }
                break;
            case "add":
              header("Location: " . BASE_URL . "?act=cart&quantity=" . urlencode($quantity));
              exit;
        }
    }
 }
 include 'app/Views/User/ViewCart.php';
}
}

?>