<?php

    class carritoDAO{
        
        public static function cargarProductosCarritoPorUsuario($usuario){
            $FILE_CAR = './json/carrito.json';
            $FILE_PRO = './json/producto.json';

            $json = file_get_contents($FILE_CAR);
            $carritos = json_decode($json, true);

            $json = file_get_contents($FILE_PRO);
            $productos = json_decode($json, true);
            $a_productos_carrito = array();

            foreach ($carritos as $carrito) {
                if ($carrito['usuarioId'] == $usuario){
                    foreach($carrito['productos'] as $prd){
                        foreach ($productos as $producto) {
                            if ($producto['productoId'] == $prd['productoId']){
                                $prdId        = $producto['productoId'];
                                $prdNombre    = $producto['productoNombre'];
                                $prdDesc      = $producto['productoDescripcion'];
                                $prdPrecio    = $producto['productoPrecio'];
                                $prdNomImg    = $producto['productoImagen'];
                                $prdStock     = $producto['productoStock'];
                                $prdCategoria = $producto['categoriaId'];
    
                                $a_productos_carrito[] = new ProductoCarrito($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prd['productoCant']);
                            }
                        }
                    }
                }
            }
            
            return $a_productos_carrito;
        }

        public static function realizarCompra($compra, $usuario){

            global $mysqli;
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date = date('Y-m-d H:i:s', time());

            $stmt = $mysqli->prepare("SELECT usrId FROM usuario WHERE usrNombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $usrId = $stmt->get_result()->fetch_assoc()['usrId'];
            
            $stmt = $mysqli->prepare("INSERT INTO comprahis(usrId, fecha) VALUES(?, ?)");
            $stmt->bind_param("ss", $usrId, $date);
            $stmt->execute();

            $stmt = $mysqli->prepare("SELECT LAST_INSERT_ID() AS 'compraHisId'");
            $stmt->execute();
            $compraHisId = $stmt->get_result()->fetch_assoc()['compraHisId'];

            $ok = true;


            foreach ($compra as $key => $value) {
                
                $id = intval($value['id']);
                $cantidad = intval($value['cantidad']);
                $aux = intval($compraHisId);

                $stmt = $mysqli->prepare("INSERT INTO prd_com(prdId, compraHisId, prdCantCar) VALUES(?, ?, ?)");
                $stmt->bind_param("iii", $id, $aux, $cantidad);
                $ok = $stmt->execute();

            }

            if(!$ok){
                echo('fallo');
            }
            
            //$ok = false;
            return $ok;
        }

    }

    class ProductoCarrito{

        public $productoId;
        public $proNombre;
        public $proNomImagen;
        public $proDescripcion;
        public $proValores;
        public $proPrecio;
        public $proNuevo;
        public $proPromo;
        public $proStock;
        public $proDescuento;
        public $proCantCarrito;

        public $categoria;

        public function __construct($id, $nombre, $desc, $precio, $categoria, $nomImg, $cantStock){
            $this->productoId     = $id;
            $this->proNombre      = $nombre;
            $this->proNomImagen   = $nomImg;
            $this->proDescripcion = $desc;
            //$this->proValores     = $valores;
            $this->proPrecio      = $precio;
            $this->categoria    = $categoria;
            $this->proCantCarrito = $cantStock;
        }

        public function setNuevo($esNuevo){
            $this->proNuevo = ($esNuevo == 'S');
        }

        public function setPromo($estaPromo){
            $this->proPromo = ($estaPromo == 'S');
        }

        public function setDescuento($porcDescuento){
            $this->proDescuento = $porcDescuento;
        }

        public function setStock($cantStock){
            $this->proStock = $cantStock;
        }

        public function setCantCarrito($cantCarrito){
            $this->proCantCarrito = $cantCarrito;
        }
    }
?>