<?php
class DashboardUser{
  public $db;
  public function __construct(){
    $this->db = new Database();
  }
  public function getAllProductByUser(){
    $sql = "SELECT products.id, products.name, products.price, products.category_id, products.stock,products.description,
         products.image, categories.name AS categoryName FROM `products` join categories on products.category_id = categories.id";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
  }
  public function getProductById($id){
    if(isset($_GET['product_id'])){
      $sql = "SELECT * FROM products WHERE id = :id";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindParam(':id', $_GET['product_id']);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
  }
}
public function createCart($users_id) {
  $sql = "INSERT INTO cart (user_id) VALUES (:users_id)"; // Giỏ hàng mới sẽ có user_id
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT); // Gán user_id từ session vào câu lệnh
  $stmt->execute();
  return $this->conn->lastInsertId(); // Trả về ID giỏ hàng mới vừa tạo
}

// Kiểm tra giỏ hàng của user
public function getCartByUserId($users_id) {
  $sql = "SELECT * FROM cart WHERE user_id = :users_id LIMIT 1";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT); // Truyền đúng kiểu dữ liệu
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về giỏ hàng nếu có
}
public function addCartDetail($cart_id, $product_id, $quantity) {
  // Chèn sản phẩm vào bảng cart_detail
  $sql = "INSERT INTO cart_detail (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
  $stmt->execute();
}
public function getCartDetails($cart_id) {
    $sql = "SELECT p.image, p.name, p.price, c.quantity ,c.product_id
            FROM cart_detail c
            JOIN products p ON c.product_id = p.id
            WHERE c.cart_id = :cart_id";
    
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function getCartDetailByProduct($cart_id, $product_id) {
  $sql = "SELECT * FROM cart_detail WHERE cart_id = :cart_id AND product_id = :product_id";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function updateCartDetailQuantity($cart_id, $product_id, $newQuantity) {
  $sql = "UPDATE cart_detail SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);
  $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $stmt->execute();
}
public function removeCartDetail($cart_id, $product_id) {
  $sql = "DELETE FROM cart_detail WHERE cart_id = :cart_id AND product_id = :product_id";
  $stmt = $this->db->pdo->prepare($sql);
  $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  return $stmt->execute();
}

}
?>