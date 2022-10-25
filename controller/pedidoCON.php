<?php
    require_once("./model/UsuarioDAO.php");
    // require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    // require_once('./model/favoritoDAO.php');
    require_once('./model/pedidoDAO.php');
    
    class PedidoCON {

        function nuevoPedido(){
            // obetener las variables pasadas, ver pasar por POST (ideal) o por GET
            // por POST ver de ejecutar el llamado desde el js

            // asi se deberia llamarse a la sesion.
            // PedidoDAO::realizarCompra($_SESSION['usuario'], $arrProductos);
        }
    }

?>