<?php
require_once __DIR__.'/../models/order.php';

class OrdersController{
    public function do(){
        
        require_once __DIR__.'/../views/orders/do.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            $user_id = $_SESSION['identity']->id;
            $state = isset($_POST['state']) ? $_POST['state'] : false;
            $locality = isset($_POST['locality']) ? $_POST['locality'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;

            $stats = Utils::statsCart();
            $cost = $stats['total'];

            if($state && $locality && $address){
                $order = new Order();
                $order->setUser_id($user_id);
                $order->setState($state);
                $order->setLocality($locality);
                $order->setAddress($address);
                $order->setCost($cost);

                $save = $order->save();

                $save_line =$order->save_line();
                
                if($save && $save_line){
                    $_SESSION['order'] = 'completed';
                } else{
                    $_SESSION['order'] = 'failed';
                }

            } else{
                $_SESSION['order'] = 'failed';
            }
            
            header("Location:".base_url."orders/confirm");

        } else{
            header('Location:'.base_url);
        }
    }

    public function confirm(){

        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $order = new Order();
            $order->setUser_id($identity->id);
            $order = $order->getOneByUser();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($order->id);
        }


        require_once __DIR__.'/../views/orders/confirm.php';
    }

    public function myOrders(){
        Utils::isIdentity();

        $user_id = $_SESSION['identity']->id;
        $order = new Order();
        $order->setUser_id($user_id);
        $orders = $order->getAllByUser();

        require_once __DIR__.'/../views/orders/my_orders.php';
    }

    public function detail(){
        Utils::isIdentity();

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            $order = new Order();
            $order->setId($id);
            $order = $order->getOne();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($id);


            require_once __DIR__.'/../views/orders/detail.php';
        } else{
            header("Location:".base_url."orders/myOrders");
        }

    }

    public function management(){
        Utils::isAdmin();
        $management = true;

        $order = new Order();
        $orders = $order->getAll();

        require_once __DIR__.'/../views/orders/my_orders.php';
    }

    public function condition(){
        Utils::isAdmin();
        if(isset($_POST['order_id']) && isset($_POST['condition'])){
            $condition = $_POST['condition'];
            $id = $_POST['order_id'];
            $order = new Order();
            $order->setId($id);
            $order->setCondition($condition);
            $order->updateOne();

            header("Location:".base_url."orders/detail&id=".$id);
        } else{
            header("Location:".base_url);
        }
    }

}

?>