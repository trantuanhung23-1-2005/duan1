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
public function cartDetail() {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : null;
  }
  $users_id = $_SESSION['users']['id'] ?? null;
  if (!$users_id) {
      die("Bạn chưa đăng nhập!");
  }

  $cartModel = new DashboardUser();

  // Kiểm tra xem user đã có giỏ hàng chưa
  $cart = $cartModel->getCartByUserId($users_id);

  if (!$cart) {
      // Nếu chưa có giỏ hàng, tạo mới
      $cart_id = $cartModel->createCart($users_id);
  } else {
      // Nếu đã có, lấy giỏ hàng hiện tại
      $cart_id = $cart['id'];
  }

  $product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : null;
  $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

  if ($product_id && $quantity) {
      // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
      $existingCartDetail = $cartModel->getCartDetailByProduct($cart_id, $product_id);

      if ($existingCartDetail) {
          // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
          $newQuantity = $existingCartDetail['quantity'] + $quantity;
          $cartModel->updateCartDetailQuantity($cart_id, $product_id, $newQuantity);
      } else {
          // Nếu chưa có sản phẩm, thêm mới vào giỏ hàng
          $cartModel->addCartDetail($cart_id, $product_id, $quantity);
      }

      // Chuyển hướng tránh gửi lại request khi refresh trang
      header("Location: " . BASE_URL . "?act=cart");
      exit;
  }

  // Lấy danh sách chi tiết giỏ hàng
  $cart_detail = $cartModel->getCartDetails($cart_id);
  include 'app/Views/User/ViewCart.php';
}
public function removeCartItem() {
  $product_id = (int)$_GET['product_id'];
  $users_id = $_SESSION['users']['id'] ?? null;
  $cartModel = new DashboardUser();
  $cart = $cartModel->getCartByUserId($users_id);
  if ($cart) {
      $cartModel->removeCartDetail($cart['id'], $product_id);
  }

  // Chuyển hướng về giỏ hàng
  header("Location: " . BASE_URL . "?act=cart");
  exit;
}

}

?>