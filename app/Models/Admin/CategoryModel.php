<?php
class Category {
    private $db;

    public function __construct(){
        $this -> db = new Database();
      }

    public function getAllCategories(){
        $query = "SELECT * FROM categories";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name){
        $query="INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam(":name",$name);
        return $stmt->execute();
    }

    public function getCategoryById($id) {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCategory($id,$name){
        $query = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":id",$id);
        return $stmt->execute();
    }

    public function deleteCategory($id){
        $query = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindParam("id",$id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>