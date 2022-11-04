<?php
    include('./model/productoDAO.php');
    include('./model/categoriaDAO.php');
    include('./model/monedaDAO.php');

    class ProductoCON{

        public function verProducto(){
            $categorias = CategoriaDAO::cargarCategorias();
            $producto   = ProductoDAO::cargarProductoPorId($_GET['productoId']);
            $a_productos_desta  = ProductoDAO::cargarProductosDestacados();
            $monedas    = monedaDAO::cargarMonedas();
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            require_once("view/producto.php");
        }

        public function verListaProductos(){
            $categorias  = CategoriaDAO::cargarCategorias();
            $productos   = ProductoDAO::cargarProductos();
            $monedas     = monedaDAO::cargarMonedas();
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            $categoriaSel= 0;
            require_once("view/productosList.php");
        }

        public function verOfertas(){
            $categorias  = CategoriaDAO::cargarCategorias();
            $productos   = ProductoDAO::cargarProductosOferta();
            $monedas     = monedaDAO::cargarMonedas();
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            $categoriaSel= 0;
            require_once("view/productosList.php");
        }

        public function verProductosPorCategoria(){
            $categorias  = CategoriaDAO::cargarCategorias();
            // $productos   = ProductoDAO::cargarProductosPorCategoria($_GET['categoriaId']);
            $productos   = ProductoDAO::cargarProductosPorCategoria($_GET['categoriaId']);
            $categoriaSel= $_GET['categoriaId'];
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            $monedas     = monedaDAO::cargarMonedas();
            require_once("view/productosList.php");
        }

        // public function verProductosFavoritos(){
        //     $categorias = CategoriaDAO::cargarCategorias();
        //     $productos  = favoritoDAO::cargarProductosFavoritosPorUsuario($_SESSION['username']);
        //     $monedas    = monedaDAO::cargarMonedas();
        //     require_once("view/favoritos.php");
        // }

        public function verProductosFiltradosBusquda(){
            $categorias  = CategoriaDAO::cargarCategorias();
            $productos   = ProductoDAO::verProductosFiltradosBusquda($_GET['busqueda']);
            $categoriaSel= [];
            $usuario    = (isset($_SESSION['usuario'])) ? $_SESSION['usuario'] : null;
            $monedas     = monedaDAO::cargarMonedas();
            require_once("view/productosList.php");
        }

    }


?>