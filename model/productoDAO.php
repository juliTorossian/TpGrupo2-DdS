<?php

    // include('./conn.php');

    class ProductoDAO{

        public static $FILE_PRO = './json/producto.json';
        public static $FILE_CAT = './json/categoria.json';
        public static $FILE_FAV = './json/favorito.json';
        public static $FILE_CAR = './json/carrito.json';

        public static function cargarProductos(){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $a_productos = array();

            foreach ($resultado as $producto) {
                $prdId        = $producto['productoId'];
                $prdNombre    = $producto['productoNombre'];
                $prdDesc      = $producto['productoDescripcion'];
                $prdPrecio    = $producto['productoPrecio'];
                $prdNomImg    = $producto['productoImagen'];
                $prdStock     = $producto['productoStock'];
                $prdCategoria = $producto['categoriaId'];
                $prdNuevo     = $producto['nuevo'];
                $prdDescuento = $producto['destacado'];
                
                $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                if ($producto['oferta'] == 'S'){
                    $productoAux->setPromo($producto['oferta']);
                    $productoAux->setDescuento($producto['descuento']);
                }

                array_push($a_productos, $productoAux);
            }
            return $a_productos;
        }

        public static function cargarProductosOferta(){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if ($producto['oferta'] == 'S'){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];
                    $prdNuevo     = $producto['nuevo'];
                    $prdDescuento = $producto['destacado'];

                    $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    $productoAux->setPromo($producto['oferta']);
                    $productoAux->setDescuento($producto['descuento']);

                    array_push($productos, $productoAux);
                }
            }
            return $productos;
        }

        public static function cargarProductoPorId($productoId){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $producto    = null;
            foreach ($resultado as $prd) {
                if ($prd["productoId"] == $productoId){
                    $prdId        = $prd['productoId'];
                    $prdNombre    = $prd['productoNombre'];
                    $prdDesc      = $prd['productoDescripcion'];
                    $prdPrecio    = $prd['productoPrecio'];
                    $prdNomImg    = $prd['productoImagen'];
                    $prdStock     = $prd['productoStock'];
                    $prdCategoria = $prd['categoriaId'];
                    $prdNuevo     = $prd['nuevo'];
                    $prdDescuento = $prd['destacado'];

                    $producto = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    if ($prd['oferta'] == 'S'){
                        $producto->setPromo($prd['oferta']);
                        $producto->setDescuento($prd['descuento']);
                    }
                }
                if ($producto != null){
                    break;
                }
            }
            return $producto;
        }

        public static function cargarProductosPorCategoria($categoriaId){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if ($producto['categoriaId'] == $categoriaId){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];
                    $prdNuevo     = $producto['nuevo'];
                    $prdDescuento = $producto['destacado'];

                    $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    if ($producto['oferta'] == 'S'){
                        $productoAux->setPromo($producto['oferta']);
                        $productoAux->setDescuento($producto['descuento']);
                    }
                    array_push($productos, $productoAux);
                }
            }
            return $productos;
        }

        public static function cargarProductosNuevos(){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if ($producto['nuevo'] == 'S'){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];
                    $prdNuevo     = $producto['nuevo'];
                    $prdDescuento = $producto['destacado'];

                    $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    if ($producto['oferta'] == 'S'){
                        $productoAux->setPromo($producto['oferta']);
                        $productoAux->setDescuento($producto['descuento']);
                    }
                    array_push($productos, $productoAux);
                }
            }
            return $productos;
        }

        public static function cargarProductosDestacados(){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if ($producto['destacado'] == 'S'){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];
                    $prdNuevo     = $producto['nuevo'];
                    $prdDescuento = $producto['destacado'];

                    $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    if ($producto['oferta'] == 'S'){
                        $productoAux->setPromo($producto['oferta']);
                        $productoAux->setDescuento($producto['descuento']);
                    }
                    array_push($productos, $productoAux);
                }
            }
            return $productos;
        }

        public static function verProductosFiltradosBusquda($busqueda){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if (strpos(strtolower($producto['productoNombre']), strtolower($busqueda)) !== false){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];
                    $prdNuevo     = $producto['nuevo'];
                    $prdDescuento = $producto['destacado'];

                    $productoAux = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                    if ($producto['oferta'] == 'S'){
                        $productoAux->setPromo($producto['oferta']);
                        $productoAux->setDescuento($producto['descuento']);
                    }
                    array_push($productos, $productoAux);
                }
            }
            return $productos;
        }
        
    }


    class Producto{

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
        public $proPorcDescuento;

        public $categoria;

        public function __construct($id, $nombre, $desc, $precio, $categoria, $nomImg, $cantStock, $nuevo, $descuento){
            $this->productoId     = $id;
            $this->proNombre      = $nombre;
            $this->proNomImagen   = $nomImg;
            $this->proDescripcion = $desc;
            //$this->proValores     = $valores;
            $this->proPrecio      = $precio;
            $this->categoria    = $categoria;
            $this->proStock = $cantStock;
            $this->proNuevo = ($nuevo == 'S');
            $this->proDescuento = ($descuento == 'S');
            $this->proPromo = False;
            $this->proPorcDescuento = 0;
        }

        public function setNuevo($esNuevo){
            $this->proNuevo = ($esNuevo == 'S');
        }

        public function setPromo($estaPromo){
            $this->proPromo = ($estaPromo == 'S');
        }

        public function setDescuento($porcDescuento){
            $this->proPorcDescuento = $porcDescuento;
        }

        public function setStock($cantStock){
            $this->proStock = $cantStock;
        }

        public function setCantCarrito($cantCarrito){
            $this->proCantCarrito = $cantCarrito;
        }
    }

?>