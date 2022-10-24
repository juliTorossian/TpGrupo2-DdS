<?php

class CategoriaDAO{

        public static function cargarCategorias(){
            $FILE_CAT = './json/categoria.json';
            
            $json = file_get_contents($FILE_CAT);
            $resultado = json_decode($json, true);

            foreach ($resultado as $categoria) {
                $categoriaId        = $categoria['categoriaId'];
                $categoriaNombre    = $categoria['categoriaNombre'];
                // $categoriaTieneSub  = $categoria['categoriaTieneSub'];
                $categoriaPadre     = $categoria['categoriaPadre'];

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

        public function __construct($id, $padre, $nombre){
            $this->cateId     = $id;
            $this->catePadre  = $padre;
            $this->cateNombre = $nombre;
            // $this->tieneSub   = ($tieneSub == 'S');
        }

    }
?>