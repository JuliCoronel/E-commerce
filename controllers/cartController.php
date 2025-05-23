<?php
require_once __DIR__.'/../models/product.php';

class CartController{

    public function index(){
        if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1){
            $cart = $_SESSION['cart'];
        } else{
            $cart = array();
        }

        require_once __DIR__.'/../views/cart/index.php';
    }

    public function add(){
        if(isset($_GET['id'])){
            $product_id = $_GET['id'];
        } else{
            header("Location:".base_url);
        }

        if(isset($_SESSION['cart'])){
            $counter = 0;
            foreach($_SESSION['cart'] as $index => $element){
                if($element['id_product'] == $product_id){
                    $_SESSION['cart'][$index]['quantity']++;
                    $counter++;
                }
            }
        }

        if(!isset($counter) || $counter == 0){
            $product = new Product();
            $product->setId($product_id);
            $product->getPrice();
            $product = $product->getOne();

            if(is_object($product)){
                $_SESSION['cart'][] = array(
                    "id_product" => $product->id,
                    "price" => $product->precio,
                    "quantity" => 1,
                    "product" => $product
                );
            }
        }
        
        header("Location:".base_url."cart/index");
    }

    public function remove(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['cart'][$index]);
        }
        header("Location:".base_url."cart/index");
    }

    public function up(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['quantity']++;
        }
        header("Location:".base_url."cart/index");
    }

    public function down(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['cart'][$index]['quantity']--;
            if($_SESSION['cart'][$index]['quantity'] == 0){
                unset($_SESSION['cart'][$index]);
            }
        }
        header("Location:".base_url."cart/index");
    }

    public function delete_all(){
        unset($_SESSION['cart']);
        header("Location:".base_url."cart/index");
    }

}


?>