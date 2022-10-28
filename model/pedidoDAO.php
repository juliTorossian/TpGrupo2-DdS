<?php

    function generarId($length = 10) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 

    class PedidoDAO{
        
        public static function realizarCompra($nuevoPedido){
            $FILE_PED = './json/pedido.json';
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date = date('Y-m-d H:i:s', time());

            $json = file_get_contents($FILE_PED);
            $pedidos = json_decode($json, true);

            $pedId = strtoupper(generarId());
            $importe = $nuevoPedido['pedImporte'];
            $date = date('Y-m-d H:i:s', time());

            $pedido = new Pedido($pedId, intval($nuevoPedido['pedUsuario']), intval($importe), $date, 'P', 'E');
            foreach ($nuevoPedido['pedProductos'] as $prd) {
                $pedido->addProducto(intval($prd['productoId']), intval($prd['productoCant']), intval($prd['productoPrecio']));
            }

            array_push($pedidos, $pedido);
            file_put_contents($FILE_PED, json_encode($pedidos));

            return $pedId;
        }

        public static function getPedido($pedidoId){
            $FILE_PED = './json/pedido.json';
            $json = file_get_contents($FILE_PED);
            $pedidos = json_decode($json, true);
            $pedido = null;

            foreach ($pedidos as $ped) {
                if ($ped['pedId'] == $pedidoId){
                    $pedido = new Pedido($ped['pedId'], $ped['pedUsuario'], $ped['pedImporte'], $ped['pedFecha'], $ped['pedEstado'], $ped['pedRetira']);
                    foreach ($ped['pedProductos'] as $prd) {
                        $pedido->addProducto($prd['productoId'], $prd['productoCant'], $prd['productoPrecio']);
                    }
                }
            }
            return $pedido;
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