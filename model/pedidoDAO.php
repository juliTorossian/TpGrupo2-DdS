<?php

    function generarId($length = 10) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 

    class pedidoDAO{
        
        public static function realizarCompra($pedidoUsuario, $pedProductos){

            $FILE_PED = './json/pedido.json';
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date = date('Y-m-d H:i:s', time());

            $json = file_get_contents($FILE_PED);
            $pedidos = json_decode($json, true);

            $pedId = generarId();
            $importe = 1500;
            $date = date('Y-m-d H:i:s', time());
            echo($pedId);
            $pedido = new Pedido($pedId, $pedidoUsuario, $importe, $date, 'P', 'E');
            foreach ($pedProductos as $key => $prd) {
                $pedido->addProducto($prd['productoId'], $prd['productoCant'], $prd['productoPrecio']);
            }

            file_put_contents($FILE_PED, json_encode($pedido));
        }

    }

    class Pedido{

        public $pedId;
        public $pedUsuario;
        public $pedImporte;
        public $pedFecha;
        public $pedEstado;
        public $pedRetira;
        public $pedProductos = [];

        public function __construct($id, $usuario, $importe, $fecha, $estado, $retira){
            $this->pedId            = $id;
            $this->pedUsuario       = $usuario;
            $this->pedImporte       = $importe;
            $this->pedFecha         = $fecha;
            $this->pedEstado        = $estado;
            $this->pedRetira        = $retira;
            // $this->proCantCarrito = $cantStock;
        }

        public function addProducto($productoId, $productoCant, $productoPrecio){

            $producto = [
                "productoId" => $productoId,
                "productoCant" => $productoCant,
                "productoPrecio" => $productoPrecio
            ];

            array_push($this->pedProductos, $producto);
        }
    }
?>