<?php
require_once 'models/category.php';
require_once 'models/product.php';

class CategoriesController{
    public function index(){
        Utils::isAdmin();
        $category = new Category;
        $categories = $category->getAll();

        require_once 'views/categories/index.php';
    }

    public function create(){
        require_once 'views/categories/create.php';
    }

    public function watch(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            $category = $category->getOne();
            
            $product = new Product();
            $product->setCategory_id($id);
            $products = $product->getAllCategory();
        }

        require_once 'views/categories/watch.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['name'])){
            $category = new Category;
            $category->setName($_POST['name']);
            $category->save();
        }

        header("Location:".base_url."categories/index");
    }

}

?>