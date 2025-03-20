<?php
class ProductModelAdmin{
  public $db;
  public function __construct(){
    $this -> db = new Database();
  }
  public function getAllProduct(){
    $sql = "SELECT products.id, products.name, products.price, products.category_id, products.stock,
         products.image, categories.name AS categoryName FROM `products` join categories on products.category_id = categories.id";
        $query = $this->db->pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
  }
  public function deleteProductById(){
    $id = $_GET['id'];
    $sqlProduct = "DELETE FROM `products` WHERE id = :id";
    $stmt2 = $this->db->pdo->prepare($sqlProduct);
    $stmt2->bindParam(':id', $id);
    if($stmt2->execute()){
      return true;
  }else{
      return false;
  }
  }
  public function allCategory(){
    $sql = "SELECT * FROM categories";
    $query = $this->db->pdo->query($sql);
    $result = $query->fetchAll();
    return $result;
  }
  public function addProductToDB(){
        $name = $_POST['name'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $sql = "INSERT INTO `products`(`name`, `category_id`, `description`, `price`, `stock`, `image`) 
        VALUES (:name, :category_id, :description, :price, :stock, :image)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':image', $image);
        if($stmt->execute()){
            //lấy id của sản phẩm mới thêm
            $lastInsertId = $this->db->pdo->lastInsertId();
            return $lastInsertId;
        }else{
            return false;
    }
  }
  public function getProductByID(){
    $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return $stmt->fetch();
        }
        return false;
  }
  public function updateProductToDB(){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $sql = "UPDATE `products` SET `name`=:name,`category_id`=:category_id,`description`=:description,`price`=:price,`stock`=:stock,`image`=:image WHERE id=:id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);
        
    return $stmt->execute();
  }
  
}

?>