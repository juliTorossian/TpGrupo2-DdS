<?php
    require_once("./model/usuarioDAO.php");
    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/carritoDAO.php');

    class carritoCON{

        function miCarrito(){
            if(!isset($_SESSION['usuario'])){
                header('Location: ./index.php?controller=usuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                $productos  = carritoDAO::cargarProductosCarritoPorUsuario($_SESSION['usuario']);
                $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
                require_once('./view/carrito.php');
            }
        }
        function checkout(){
            if(!isset($_SESSION['usuario'])){
                header('Location: ./index.php?controller=usuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                $productos  = carritoDAO::cargarProductosCarritoPorUsuario($_SESSION['usuario']);
                $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
                require_once('./view/checkout.php');
            }
        }

        function realizarCompra(){
            echo(carritoDAO::realizarCompra($_POST['compra'], $_POST['usuario']));
        }
    }


?>