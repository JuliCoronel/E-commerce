<?php

class Category{
    private $id;
    private $name;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function setId($id){
        return $this->id = $id;
    }
    public function setName($name){
        return $this->name = $this->db->real_escape_string($name);
    }

    public function getAll(){
        $categories = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categories;
    }

    public function getOne(){
        $category = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $category->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(null, '{$this->getName()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        }
        return $result;
    }

}

?>