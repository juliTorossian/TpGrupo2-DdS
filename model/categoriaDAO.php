<?php

class CategoriaDAO{

        public static $FILE_CAT    = './json/categoria.json';

        public static function cargarCategorias(){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM categoria");
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $categorias = array();

            while($categoria = $resultado->fetch_assoc()){
                $categoriaId        = $categoria['categoriaId'];
                $categoriaNombre    = $categoria['categoriaDescripcion'];
                // $categoriaTieneSub  = $categoria['categoriaTieneSub'];
                $categoriaPadre     = $categoria['categoriaCatePadre'];

                $categorias[] = new Categoria($categoriaId, $categoriaPadre, $categoriaNombre, 'N');
            }
            return $categorias;
        }
    }

    class Categoria{

        public $cateId;
        public $catePadre;
        public $cateNombre;
        public $tieneSub;

        public function __construct($id, $padre, $nombre, $tieneSub){
            $this->cateId     = $id;
            $this->catePadre  = $padre;
            $this->cateNombre = $nombre;
            $this->tieneSub   = ($tieneSub == 'S');
        }

    }
?>