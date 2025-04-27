<?php

class Product{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
    private $image;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    
    public function getCategory_id(){
        return $this->category_id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getStock(){
        return $this->stock;
    }
    public function getOffer(){
        return $this->offer;
    }

    public function getDate(){
        return $this->date;
    }

    public function getImage(){
        return $this->image;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setCategory_id($category_id){
        $this->category_id = $category_id;
    }

    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }

    public function setDescription($description){
        $this->description = $this->db->real_escape_string($description);
    }

    public function setPrice($price){
        $this->price = $this->db->real_escape_string($price);
    }

    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setOffer($offer){
        $this->offer = $this->db->real_escape_string($offer);
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getAll(){
        $products = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $products;
    }

    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p"
                ." INNER JOIN categorias c ON c.id = p.categoria_id"
                ." WHERE p.categoria_id = {$this->getCategory_id()}"
                ." ORDER BY id DESC";
        $products = $this->db->query($sql);
        return $products;
    }

    public function getRandom($limit){
        $products = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $products;
    }

    public function getOne(){
        $products = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $products->fetch_object();
    }

    public function save(){

        $sql = "INSERT INTO productos VALUES(null, {$this->getCategory_id()},'{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, {$this->getStock()}, null, CURDATE(), '{$this->getImage()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;
    }

    public function edit(){

        $sql = "UPDATE productos SET nombre='{$this->getName()}', descripcion='{$this->getDescription()}', precio={$this->getPrice()}, stock={$this->getStock()}, categoria_id={$this->getCategory_id()}";
        if($this->getImage() != null){
            $sql.=", imagen='{$this->getImage()}'";
        }

        $sql .= " WHERE id={$this->id};";
        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id = {$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete) {
            $result = true;
        }
        return $result;
    }


}

?>