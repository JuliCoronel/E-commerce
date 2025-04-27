<?php

class Order{
    private $id;
    private $user_id;
    private $state;
    private $locality;
    private $address;
    private $cost;
    private $condition;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getUser_id(){
        return $this->user_id;
    }

    public function getState(){
        return $this->state;
    }

    public function getLocality(){
        return $this->locality;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCost(){
        return $this->cost;
    }

    public function getCondition(){
        return $this->condition;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }
    public function setState($state){
        $this->state = $this->db->real_escape_string($state);
    }
    public function setLocality($locality){
        $this->locality = $this->db->real_escape_string($locality);
    }
    public function setAddress($address){
        $this->address = $this->db->real_escape_string($address);
    }
    public function setCost($cost){
        $this->cost = $cost;
    }
    public function setCondition($condition){
        $this->condition = $condition;
    }
    public function setFecha($fecha){
        return $this->fecha = $fecha;
    }
    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getAll(){
        $products = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $products;
    }

    public function getOne(){
        $products = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $products->fetch_object();
    }

    public function getOneByUser(){
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUser_id()} ORDER BY id DESC LIMIT 1;";
        $order = $this->db->query($sql);
        return $order->fetch_object();
    }

    public function getAllByUser(){
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUser_id()} ORDER BY id DESC;";
        $order = $this->db->query($sql);
        return $order;
    }

    public function getProductsByOrder($id){
        // $sql = "SELECT * FROM productos WHERE id"
        //         ."IN (SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})";

        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id WHERE lp.pedido_id = {$id}";
        
        $products = $this->db->query($sql);
        return $products;
    }

    public function save(){

        $sql = "INSERT INTO pedidos VALUES(null, '{$this->getUser_id()}', '{$this->getState()}', '{$this->getLocality()}', '{$this->getAddress()}', {$this->getCost()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;
    }

    public function save_line(){
        $sql = "SELECT LAST_INSERT_ID() AS 'order';";
        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->order;

        foreach($_SESSION['cart'] as $element){
            $product = $element['product']; 

            $insert = "INSERT INTO lineas_pedidos VALUES(null, {$order_id}, {$product->id}, {$element['quantity']});";
            $save = $this->db->query($insert);
        }

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;

        var_dump($order_id);
    }

    public function updateOne(){
        $sql = "UPDATE pedidos SET estado = '{$this->getCondition()}'";
        $sql .= " WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;
    }

}

?>