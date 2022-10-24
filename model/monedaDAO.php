<?php

    // include('./conn.php');
    
    class monedaDAO{

        public static function cargarMonedas(){
            $FILE_MON = './json/moneda.json';
            
            $json = file_get_contents($FILE_MON);
            $resultado = json_decode($json, true);

            foreach ($resultado as $moneda) {
                $monId      = $moneda['monId'];
                $monNombre  = $moneda['monNom'];
                $monSimbolo = $moneda['monSim'];
                $monDivisa  = $moneda['monDiv'];

                $monedas[] = new moneda($monId, $monSimbolo, $monNombre, $monDivisa);
            }
            return $monedas;
        }
    }

    class moneda{
        public $monId;
        public $monSimbolo;
        public $monNombre;
        public $monDivisa;

        public function __construct($id, $simbolo, $nombre, $Divisa){
            $this->monId      = $id;
            $this->monSimbolo = $simbolo;
            $this->monNombre  = $nombre;
            $this->monDivisa  = $Divisa;   
        }

    }
?>