<?php
session_start();
require_once __DIR__.'/autoload.php';
require_once __DIR__.'/config/db.php';
require_once __DIR__.'/config/parameters.php';
require_once __DIR__.'/helpers/utils.php';
require_once __DIR__.'/views/layout/header.php';
require_once __DIR__.'/views/layout/sidebar.php'; 

function show_error(){
    $error = new ErrorsController();
    $error->index();
}

if(isset($_GET{'controller'})){
    $controllerName = ucfirst($_GET['controller']).'Controller';
} elseif (!isset($_GET{'controller'}) && !isset($_GET['action'])) {
    $controllerName = controller_default;
} else{
    show_error();
    exit();
}

if (class_exists($controllerName)) {
    $controller = new $controllerName();

    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    } elseif (!isset($_GET{'controller'}) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controller->$action_default();
    } else{
        show_error();
    }
} else{
    show_error();
}

require_once __DIR__.'/views/layout/footer.php';

?>