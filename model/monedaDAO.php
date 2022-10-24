<?php

    include('./conn.php');
    
    class monedaDAO{

        public static $FILE_MON    = './json/moneda.json';

        public static function cargarMonedas(){
            
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM moneda");
            $stmt->execute();

            $resultado   = $stmt->get_result();
            $monedas  = array();

            while($moneda = $resultado->fetch_assoc()){
                $monId      = $moneda['monedaId'];
                $monNombre  = $moneda['moendaNombre'];
                $monSimbolo = $moneda['monedaSimbolo'];
                // $monDivisa  = $moneda['monDivisa'];

                $monedas[] = new moneda($monId, $monSimbolo, $monNombre, 0);
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