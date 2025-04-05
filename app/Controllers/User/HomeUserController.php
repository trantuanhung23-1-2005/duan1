<?php
class HomeUserController
{
  public function homeUser()
  {
    $usercontroller = new DashboardUser();
    $list = $usercontroller->getAllProductByUser();
    include 'app/Views/User/HomeUserView.php';
  }
  public function productDetail() {
    if (isset($_GET['product_id'])) {
        $id = intval($_GET['product_id']);
        $productDetail = new DashboardUser();
        $productDetailList = $productDetail->getProductById($id);

        if (!$productDetailList) {
            die("Sản phẩm không tồn tại!");
        }

        $reviewData = $this->showReviews($id);
        $reviews = $reviewData['reviews'];
        $averageRating = $reviewData['averageRating'];
    } else {
        die("ID sản phẩm không hợp lệ!");
    }

    include 'app/Views/User/HomeProductDetail.php';
}

  public function productListUser()
  {
    $usercontroller = new DashboardUser();
    $list = $usercontroller->getAllProductByUser();
    include 'app/Views/User/HomeProductList.php';
  }
  public function categoryList()
  {
    include 'app/Views/User/CategoryList.php';
  }
  public function showReviews($product_id)
  {
    $dashboardUser = new DashboardUser();
    $reviews = $dashboardUser->getReviewsByProduct($product_id);
    $averageRating = $dashboardUser->getAverageRating($product_id);
    return compact('reviews', 'averageRating');
  }

  public function addReview()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user_id = $_SESSION['users']['id'];
      $product_id = $_POST['product_id'];
      $comment = $_POST['comment'];
      $rating = $_POST['rating'];

      $dashboardUser = new DashboardUser();

      $dashboardUser->addReview($user_id, $product_id, $comment);

      $dashboardUser->addRating($user_id, $product_id, $rating);

      header("Location: ?role=user&act=product-detail&product_id=$product_id");
      exit;
    }
  }
  public function cartDetail()
  {
    $users_id = $_SESSION['users']['id'] ?? null;
    if (!$users_id) {
      die("Bạn chưa đăng nhập!");
    }

    $cartModel = new DashboardUser();

    $cart = $cartModel->getCartByUserId($users_id);

    if (!$cart) {
      $cart_id = $cartModel->createCart($users_id);
    } else {
      $cart_id = $cart['id'];
    }

    $product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : null;
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

    if ($product_id && $quantity) {
      $existingCartDetail = $cartModel->getCartDetailByProduct($cart_id, $product_id);

      if ($existingCartDetail) {
        $newQuantity = $existingCartDetail['quantity'] + $quantity;
        $cartModel->updateCartDetailQuantity($cart_id, $product_id, $newQuantity);
      } else {
        $cartModel->addCartDetail($cart_id, $product_id, $quantity);
      }

      header("Location: " . BASE_URL . "?act=cart");
      exit;
    }

    $cart_detail = $cartModel->getCartDetails($cart_id);
    include 'app/Views/User/ViewCart.php';
  }
  public function removeCartItem()
  {
    $product_id = (int)$_GET['product_id'];
    $users_id = $_SESSION['users']['id'] ?? null;
    $cartModel = new DashboardUser();
    $cart = $cartModel->getCartByUserId($users_id);
    if ($cart) {
      $cartModel->removeCartDetail($cart['id'], $product_id);
    }

    header("Location: " . BASE_URL . "?act=cart");
    exit;
  }
  public function checkOut()
  {
    $users_id = $_SESSION['users']['id'] ?? null;
    if (!$users_id) {
      die("Bạn chưa đăng nhập!");
    }

    $cartModel = new DashboardUser();

    $cart = $cartModel->getCartByUserId($users_id);
    if (!$cart) {
      die("Giỏ hàng của bạn đang trống.");
    }

    $cartDetails = $cartModel->getCartDetails($cart['id']);
    if (empty($cartDetails)) {
      die("Giỏ hàng của bạn đang trống.");
    }

    include 'app/Views/User/CheckOut.php';
  }
}
