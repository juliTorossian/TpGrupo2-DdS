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
                
                $a_productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
            }
            return $a_productos;
        }



        // public static function cargarProductosEnPromo(){

        //     global $mysqli;

        //     $stmt = $mysqli->prepare("SELECT * FROM prd WHERE prdPromocion = ?");
        //     $s = 'S';
        //     $stmt->bind_param("s", $s);
        //     $stmt->execute();

        //     $resultado   = $stmt->get_result();
        //     $a_productos_promo = array();
            
        //     while($producto = $resultado->fetch_assoc()){
        //         $prdId        = $producto['prdId'];
        //         $prdNombre    = $producto['prdNombre'];
        //         $prdDesc      = $producto['prdDesc'];
        //         $prdPrecio    = $producto['prdPrecio'];
        //         $prdNomImg    = $producto['prdNomImg'];
        //         $prdStock     = $producto['prdStock'];
        //         $prdNuevo     = $producto['prdNuevo'];
        //         $prdPromocion = $producto['prdPromocion'];
        //         $prdDescuento = $producto['prdDescuento'];
        //         $prdCategoria = $producto['categoriaId'];

        //         $a_productos_promo[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
        //     }
        //     return $a_productos_promo;
        // }

        // public static function cargarProductosNuevos(){
        //     global $mysqli;

        //     $stmt = $mysqli->prepare("SELECT * FROM prd WHERE prdNuevo = ?");
        //     $s = 'S';
        //     $stmt->bind_param("s", $s);
        //     $stmt->execute();

        //     $resultado   = $stmt->get_result();
        //     $a_productos_nuevos = array();
            
        //     while($producto = $resultado->fetch_assoc()){
        //         $prdId        = $producto['prdId'];
        //         $prdNombre    = $producto['prdNombre'];
        //         $prdDesc      = $producto['prdDesc'];
        //         $prdPrecio    = $producto['prdPrecio'];
        //         $prdNomImg    = $producto['prdNomImg'];
        //         $prdStock     = $producto['prdStock'];
        //         $prdNuevo     = $producto['prdNuevo'];
        //         $prdPromocion = $producto['prdPromocion'];
        //         $prdDescuento = $producto['prdDescuento'];
        //         $prdCategoria = $producto['categoriaId'];

        //         $a_productos_nuevos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
        //     }
        //     return $a_productos_nuevos;
        // }

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

                    $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
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

                    $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
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

                    $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock, $prdNuevo, $prdDescuento);
                }
            }
            return $productos;
        }

        // public static function cargarProductosFavoritosPorUsuario($usuario){
            
        //     global $mysqli;

        //     $stmt = $mysqli->prepare("SELECT usrId FROM usuario WHERE usrNombre = ?");
        //     $stmt->bind_param("s", $usuario);
        //     $stmt->execute();

        //     $usrId = $stmt->get_result()->fetch_assoc()['usrId'];

        //     $stmt = $mysqli->prepare("SELECT * FROM favorito INNER JOIN prd_fav ON favorito.favoritoId = prd_fav.favoritoId INNER JOIN prd ON prd_fav.prdId = prd.prdId WHERE favorito.usrId = ?");
        //     $stmt->bind_param("i", $usrId);
        //     $stmt->execute();

        //     $resultado   = $stmt->get_result();
        //     $a_productos_favoritos   = array();
            
        //     while($producto = $resultado->fetch_assoc()){
        //         $prdId        = $producto['prdId'];
        //         $prdNombre    = $producto['prdNombre'];
        //         $prdDesc      = $producto['prdDesc'];
        //         $prdPrecio    = $producto['prdPrecio'];
        //         $prdNomImg    = $producto['prdNomImg'];
        //         $prdStock     = $producto['prdStock'];
        //         $prdNuevo     = $producto['prdNuevo'];
        //         $prdPromocion = $producto['prdPromocion'];
        //         $prdDescuento = $producto['prdDescuento'];
        //         $prdCategoria = $producto['categoriaId'];

        //         $a_productos_favoritos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdNuevo, $prdPromocion, $prdDescuento, $prdStock);
        //     }
        //     return $a_productos_favoritos;
        // }

        public static function verProductosFiltradosBusquda($busqueda){
            $FILE_PRO = './json/producto.json';
            
            $usu_json = file_get_contents($FILE_PRO);
            $resultado = json_decode($usu_json, true);
            $productos = array();

            foreach ($resultado as $producto) {
                if (strpos(strtolower($producto['productoNombre']), strtolower($busqueda)) != false){
                    $prdId        = $producto['productoId'];
                    $prdNombre    = $producto['productoNombre'];
                    $prdDesc      = $producto['productoDescripcion'];
                    $prdPrecio    = $producto['productoPrecio'];
                    $prdNomImg    = $producto['productoImagen'];
                    $prdStock     = $producto['productoStock'];
                    $prdCategoria = $producto['categoriaId'];

                    $productos[] = new Producto($prdId, $prdNombre, $prdDesc, $prdPrecio, $prdCategoria, $prdNomImg, $prdStock);
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