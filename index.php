<?php

    session_start();

    if(isset($_GET['controller']) && isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
    }else{
        //default
        $controller = 'home';
        $action     = 'inicio';
    }

    require_once('routes.php');

?>