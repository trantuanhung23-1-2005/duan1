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
}
?>