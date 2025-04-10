<?php
class DashboardUser
{
  public $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  public function getAllProductByUser()
  {
    $sql = "SELECT products.id, products.name, products.price, products.category_id, products.stock,products.description,
         products.image, categories.name AS categoryName FROM `products` join categories on products.category_id = categories.id";
    $query = $this->db->pdo->query($sql);
    $result = $query->fetchAll();
    return $result;
  }
  public function getProductById($id)
  {
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }
  //lấy cart theo user_id
  public function getCartByUserId($user_id)
  {
    $sql = "SELECT * FROM cart WHERE user_id = :user_id LIMIT 1";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    return $cart ?: null;
  }
  //tạo cart mới 
  public function createCart($users_id)
  {
    $sql = "INSERT INTO cart (user_id) VALUES (:users_id)";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
    $stmt->execute();
    return $this->db->pdo->lastInsertId();
  }
  public function getCartDetailByProduct($cart_id, $product_id)
  {
    $sql = "SELECT * FROM cart_detail WHERE cart_id = :cart_id AND product_id = :product_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function updateCartDetailQuantity($cart_id, $product_id, $newQuantity)
  {
    $sql = "UPDATE cart_detail SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
  }
  public function addCartDetail($cart_id, $product_id, $quantity)
  {
    $sql = "INSERT INTO cart_detail (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->execute();
  }
  public function getReviewsByProduct($product_id) {
    $sql = "SELECT r.*, u.name AS user_name 
            FROM reviews r
            JOIN users u ON r.user_id = u.id
            WHERE r.product_id = :product_id
            ORDER BY r.created_at DESC";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function addReview($user_id, $product_id, $comment) {
  $sql = "INSERT INTO reviews (user_id, product_id, comment) VALUES (:user_id, :product_id, :comment)";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  return $stmt->execute();
}

public function addRating($user_id, $product_id, $rating) {
  $sql = "INSERT INTO product_rating (user_id, product_id, rating) VALUES (:user_id, :product_id, :rating)";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
  return $stmt->execute();
}
public function getAllReviews() {
  $sql = "SELECT r.*, u.name AS user_name, p.name AS product_name 
          FROM reviews r
          JOIN users u ON r.user_id = u.id
          JOIN products p ON r.product_id = p.id
          ORDER BY r.created_at DESC";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getAverageRating($product_id) {
  $sql = "SELECT AVG(rating) AS average_rating FROM product_rating WHERE product_id = :product_id";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC)['average_rating'];
}

public function deleteReview($review_id) {
    $sql = "DELETE FROM reviews WHERE id = :review_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':review_id', $review_id, PDO::PARAM_INT);
    return $stmt->execute();
}
  
  public function getCartDetails($cart_id)
  {
    $sql = "SELECT p.image, p.name, p.price, c.quantity, c.product_id
            FROM cart_detail c
            JOIN products p ON c.product_id = p.id
            WHERE c.cart_id = :cart_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->execute();
    $cartDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $cartDetails ?: [];
  }
  public function removeCartDetail($cart_id, $product_id)
  {
    $sql = "DELETE FROM cart_detail WHERE cart_id = :cart_id AND product_id = :product_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    return $stmt->execute();
  }
  public function createOrder($user_id, $name, $address, $phone, $notes, $cartDetails, $total)
  {
    $this->db->pdo->beginTransaction();
    try {
      $sqlOrder = "INSERT INTO `order` (user_id, name, address, phone, notes, total) 
                   VALUES (:user_id, :name, :address, :phone, :notes, :total)";
      $stmtOrder = $this->db->pdo->prepare($sqlOrder);
      $stmtOrder->bindParam(':user_id', $user_id, PDO::PARAM_INT);
      $stmtOrder->bindParam(':name', $name, PDO::PARAM_STR);
      $stmtOrder->bindParam(':address', $address, PDO::PARAM_STR);
      $stmtOrder->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmtOrder->bindParam(':notes', $notes, PDO::PARAM_STR);
      $stmtOrder->bindParam(':total', $total, PDO::PARAM_INT);
      $stmtOrder->execute();
      $orderId = $this->db->pdo->lastInsertId();

      $sqlOrderDetail = "INSERT INTO `order_detail` (order_id, product_id, quantity, price) 
                         VALUES (:order_id, :product_id, :quantity, :price)";
      $stmtOrderDetail = $this->db->pdo->prepare($sqlOrderDetail);

      foreach ($cartDetails as $item) {
        $stmtOrderDetail->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmtOrderDetail->bindParam(':product_id', $item['product_id'], PDO::PARAM_INT);
        $stmtOrderDetail->bindParam(':quantity', $item['quantity'], PDO::PARAM_INT);
        $stmtOrderDetail->bindParam(':price', $item['price'], PDO::PARAM_INT);
        $stmtOrderDetail->execute();
      }

      $this->clearCart($user_id);

      $this->db->pdo->commit();
      return $orderId;
    } catch (Exception $e) {
      $this->db->pdo->rollBack();
      throw $e;
    }
  }

  public function clearCart($user_id)
  {
    $sql = "DELETE FROM cart_detail WHERE cart_id = (SELECT id FROM cart WHERE user_id = :user_id)";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function getOrdersByUserId($user_id)
  {
    $sql = "SELECT * FROM `order` WHERE user_id = :user_id ORDER BY created_at DESC";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getOrderById($order_id)
  {
    $sql = "SELECT * FROM `order` WHERE id = :order_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getOrderDetails($order_id)
  {
    $sql = "SELECT od.*, p.name AS product_name, p.image AS product_image
          FROM order_detail od
          JOIN products p ON od.product_id = p.id
          WHERE od.order_id = :order_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function cancelOrder($order_id, $user_id = null)
  {
    $sql = "UPDATE `order` SET status = 'cancelled' WHERE id = :order_id";
    if ($user_id) {
      $sql .= " AND user_id = :user_id";
    }
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    if ($user_id) {
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    }
    return $stmt->execute();
  }
  public function getAllOrders()
  {
    $sql = "SELECT * FROM `order` ORDER BY created_at DESC";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function updateOrderStatus($order_id, $status)
  {
    $sql = "UPDATE `order` SET status = :status WHERE id = :order_id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
