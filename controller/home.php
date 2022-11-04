<?php

    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/productoDAO.php');

    class home {
        function inicio(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            $a_productos_nuevos = ProductoDAO::cargarProductosNuevos();
            $a_productos_desta  = ProductoDAO::cargarProductosDestacados();
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            require_once("view/home.php");
        }

        function contacto(){
            
            $categorias         = CategoriaDAO::cargarCategorias();
            $monedas            = monedaDAO::cargarMonedas();
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            require_once("view/contacto.php");
        }

        // function envios(){
            
        //     $categorias         = CategoriaDAO::cargarCategorias();
        //     $monedas            = monedaDAO::cargarMonedas();
        //     require_once("view/envios.php");
        // }
    }

?>