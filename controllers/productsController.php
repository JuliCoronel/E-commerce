<?php
require_once 'models/product.php';

class ProductsController{

    public function index(){
        $product = new Product;
        $products = $product->getRandom(6);

        require_once 'views/product/featured.php';
    }

    public function watch(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $product = new Product;
            $product->setId($id);
            $product = $product->getOne();

        } 
        require_once 'views/product/watch.php';
    }

    public function management(){

        Utils::isAdmin();

        $product = new Product;
        $products = $product->getAll();


        require_once 'views/product/management.php';
    }

    public function create(){
        Utils::isAdmin();
        require_once 'views/product/create.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            // $image = isset($_POST['image']) ? $_POST['image'] : false;

            if($name && $description && $price && $stock && $category){
                $product = new Product;
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategory_id($category);

                if(isset($_FILES['image'])){
                    $file = $_FILES['image'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif' || $mimetype == 'image/webp'){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        } 

                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        $product->setImage($filename);
                    } 
                }

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $product->setId($id);
                    $save = $product->edit();
                } else{
                    $save = $product->save();
                }

                if($save){
                    $_SESSION['product'] = "completed";
                } else{
                    $_SESSION['product'] = "failed";
                }
            } else{
                $_SESSION['product'] = "failed";
            }
        } else{
            $_SESSION['product'] = "failed";
        }
        header('Location:'.base_url.'products/management');
    }

    public function edit(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $product = new Product;
            $product->setId($id);
            $pro = $product->getOne();

            require_once 'views/product/create.php';
        } else{
            header('Location:'.base_url.'products/management');
        }
    }

    public function delete(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $product = new Product;
            $product->setId($_GET['id']);
            $delete = $product->delete();

            if($delete){
                $_SESSION['delete'] = "completed";
            } else{
                $_SESSION['delete'] = "failed";
            }
        } else{
            $_SESSION['delete'] = "failed";
        }
        header('Location:'.base_url.'products/management');
    }
}

?>