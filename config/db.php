<?php

class Database{
    public static function connect(){
        if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db_name = 'tienda_master';
        } else {
            $host = 'sql210.infinityfree.com';
            $user = 'if0_38888885';           
            $password = 'hIhUJRLJ4xbJ';        
            $db_name = 'if0_38888885_ecommerce_php'; 
        }

        $db = new mysqli($host, $user, $password, $db_name);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>