<?php

    include('./conn.php');

    class UsuarioDAO{

        public static function existeUsuario($usuario, $pass){
            $FILE_USU = './json/usuario.json';
            $return = false;

            $usu_json = file_get_contents($FILE_USU);
            $usuarios = json_decode($usu_json, true);
            
            foreach($usuarios as $usu) {
                $usuUsuario = $usu['usuario'];
                $usuPass = $usu['pass'];

                if ($usuario == $usuUsuario && $pass == $usuPass){
                    $return = true;
                }

            }

            return $return;
        }

        public static function datosUsuario($usuario){
            $FILE_USU = './json/usuario.json';
            $usuarioReturn = null;

            $usu_json = file_get_contents($FILE_USU);
            $usuarios = json_decode($usu_json, true);
            
            foreach($usuarios as $usuario) {
                if ($usuario == $usuario['usuario']){
                    $usuarioReturn = new Usuario($usuario['id'],$usuario['nombre'],$usuario['apellido'],$usuario['mail'],$usuario['usuario'],$usuario['pass']);
                }
            }
            
            return $usuarioReturn;
        }

        public static function crearUsuario($usuNombre, $usuApellido, $pass, $mail){
            $FILE_USU = './json/usuario.json';

            $usu_json = file_get_contents($FILE_USU);
            $usuarios = json_decode($usu_json, true);
            $count = count($usuarios);
            $count++;
            
            $usuarioNuevo = [];
            $usuarioNuevo['id'] = $count;
            $usuarioNuevo['nombre'] = $usuNombre;
            $usuarioNuevo['apelldio'] = $usuApellido;
            $usuarioNuevo['mail'] = $mail;
            $usuarioNuevo['usuario'] = $usuNombre;
            $usuarioNuevo['pass'] = $pass;

            array_push($usuarios, $usuarioNuevo);
            file_put_contents($FILE_USU, json_encode($usuarios));
            // echo '<pre>'; print_r($usuarios); echo '</pre>';
        }

        public static function existeUsuarioBD($usuario, $pass){
            global $mysqli;
            $return = false;
            
            $stmt = $mysqli->prepare("SELECT COUNT(*) AS cantidad FROM usuario WHERE usuarioUsuWeb = ? AND usuarioPassWeb = ?");
            $stmt->bind_param("ss", $usuario, $pass);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $cantResults = $resultado->fetch_assoc();
            $return = ($cantResults['cantidad'] > 0) ? true : false;

            return $return;
        }

        public static function datosUsuarioBD($usuario){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usuarioUsuWeb = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();
            
            return $usuario;
        }

        public static function crearUsuarioBD($usuNombre, $usuApellido, $pass, $mail){
            global $mysqli;

            $stmt = $mysqli->prepare('INSERT INTO usuario(usuarioNombre, usuarioApellido, usuarioNroDoc, usuarioTpoDoc, usuarioDireccion, usuarioMail, usuarioUsuWeb, usuarioPassWeb, usuarioGrupo) VALUES(?, ?, 0, "DNI", "test123", ?, ?, ?, 1)');
            $stmt->bind_param("sssss", $usuNombre, $usuApellido, $mail, $usuNombre, $pass);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // return $resultado;
        }

        // public static function nombreDeUsuarioOcupado($usuario){
        //     global $mysqli;
        //     $return = false;
            
        //     $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usrNombre = ?");
        //     $stmt->bind_param("s", $usuario);
        //     $stmt->execute();
        //     $resultado = $stmt->get_result();
            
        //     if(strlen($resultado) > 0){
        //         $return = true;
        //     }
            
        //     return $return;
        // }

        // public static function cambiarContrasenia($usuario, $pass){
        //     global $mysqli;
        //     $return = false;
            
        //     $stmt = $mysqli->prepare("UPDATE usuario SET usrMail = ? WHERE usrNombre = ?");
        //     $stmt->bind_param("ss", $pass, $usuario);
        //     $stmt->execute();
        //     $resultado = $stmt->get_result();
            
        //     return $return;
        // }
    }

    class Usuario{

        public $usuId;
        public $usuNombre;
        public $usuApellido;
        public $usuMail;
        public $usuUsuario;
        public $usuPass;

        public function __construct($id, $nombre, $apellido, $mail, $usuario, $pass){
            $this->usuId        = $id;
            $this->usuNombre    = $nombre;
            $this->usuApellido  = $apellido;
            $this->usuMail      = $mail;
            $this->usuUsuario   = $usuario;
            $this->usuPass      = $pass;
        }
    }
?>