<?php
    require_once("/model/UsuarioDAO.php");
    require_once('/model/categoriaDAO.php');
    require_once('/model/monedaDAO.php');
    require_once('/model/pedidoDAO.php');
    
    class PedidoCON {

        function nuevoPedido(){
            // obetener las variables pasadas, ver pasar por POST (ideal) o por GET
            // por POST ver de ejecutar el llamado desde el js

            // asi se deberia llamarse a la sesion.
            // PedidoDAO::realizarCompra($_SESSION['usuario'], $arrProductos);
            // echo '<pre>'; print_r($_POST); echo '</pre>';
            // $pedId = PedidoDAO::realizarCompra($_POST["pedido"]);
            $pedId = PedidoDAO::realizarCompra($_POST);
            echo($pedId);
            // $pedId = 0;

            // echo($_POST);

            // print_r($_POST);

            return $pedId;
            // return print_r($_POST);
            // require_once('./view/tracking.php');
        }
        function seguimiento(){

            $pedido = PedidoDAO::getPedido($_GET['pedido']);
            // echo '<pre>'; print_r($pedido); echo '</pre>';
            require_once('./view/tracking.php');
        }
    }

?>