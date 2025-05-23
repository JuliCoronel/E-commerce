<?php

if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    define("base_url", "http://localhost/e-commerce-poo/");
} else {
    define("base_url", "http://e-commercephp.infinityfreeapp.com/");
}
define("controller_default", "productsController");
define("action_default", "index");

?>