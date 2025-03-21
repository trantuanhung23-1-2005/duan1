<?php

    class CategoryController {
        private $categoryModel;

        public function __construct()
        {
            $this->categoryModel = new Category();
        }

        public function listCategory() {
            $categories = $this->categoryModel->getAllCategories();
            include "app/Views/Admin/categories/category-list.php";
        }

        public function addCategory() {
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                if($this->categoryModel->addCategory($name)){
                    header("Location: ?role=admin&act=listCategories");
                }
            }
            include "app/Views/Admin/categories/category-add.php";
        }

        public function editCategory(){
            $id = $_GET["id"] ?? null;
            if ($id) {
                $category = $this->categoryModel->getCategoryById($id);
                if (!$category){
                    die('Category is not exist!');
                }

                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"];
                    if($this->categoryModel->updateCategory($id,$name)){
                        header("Location: ?role=admin&act=listCategories");
                        exit;
                    }
                }

                include "app/Views/Admin/categories/category-edit.php";
            } else {
                die("Required Category's Id");
            }
        }

        public function deleteCategory() {
            $id = $_GET["id"] ?? null;
            if (!$id){
                die("Category's Id required!");
            }

            if($this->categoryModel->deleteCategory($id)){
                header("Location: ?role=admin&act=listCategories");
                exit;
            } else{
                die("Failed to delete Category!");
            }
        }
    }
?>