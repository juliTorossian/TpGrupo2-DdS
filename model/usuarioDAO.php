<?php

    include('./conn.php');

    class UsuarioDAO{

        public static function existeUsuario($usuario, $pass){
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

        public static function datosUsuario($usuario){
            global $mysqli;

            $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE usuarioUsuWeb = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();
            
            return $usuario;
        }

        public static function crearUsuario($usuNombre, $usuApellido, $pass, $mail){
            global $mysqli;

            $stmt = $mysqli->prepare("INSERT INTO usuario(usuarioNombre, usuarioApellido, usuarioNroDoc, usuarioTpoDoc, usuarioDireccion, usuarioMail, usuarioUsuWeb, usuarioPassWeb, usuarioGrupo) VALUES(?, ?, 0, DNI, test123, ?, ?, ?, 1)");
            $stmt->bind_param("ssss", $usuNombre, $usuApellido, $mail, $usuNombre, $pass);
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

?>