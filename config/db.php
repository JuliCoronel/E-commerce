<?php

class Database{
    public static function connect(){
        $db = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>