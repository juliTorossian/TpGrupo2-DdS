<?php
    require_once("./model/UsuarioDAO.php");
    require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    require_once('./model/favoritoDAO.php');
    
    class UsuarioCON {

        function login(){
            if(isset($_POST['usuNombre']) && isset($_POST['usuPass'])){
                if(!empty($_POST['usuNombre']) && !empty($_POST['usuPass'])){
                    echo(UsuarioDAO::existeUsuario($_POST['usuNombre'], $_POST['usuPass']));
                    if(UsuarioDAO::existeUsuario($_POST['usuNombre'], $_POST['usuPass'])){
                        $_SESSION['usuNombre'] = $_POST['usuNombre'];
                        header('Location: ./index.php');
                    }else{
                        $_SESSION['error'] = 'Usuario Incorrecto';
                        require_once('./view/login.php');
                    }
                }else{
                    $_SESSION['error'] = 'Campos Incorrectos';
                    require_once('./view/login.php');
                }
            }else{
                $_SESSION['error'] = 'Campos Incorrectos';
                require_once('./view/login.php');
            }
        }

        function registrar(){
            if(isset($_POST['usuNombre']) && isset($_POST['usuPass'])){
                if(!empty($_POST['usuNombre']) && !empty($_POST['usuPass'])){
                    // if(!UsuarioDAO::nombreDeUsuarioOcupado($_POST['usuNombre'])){
                    UsuarioDAO::crearUsuario($_POST['usuNombre'], $_POST['usuApellido'], $_POST['usuPass'], $_POST['usuMail']);
                    $_SESSION['usuNombre'] = $_POST['usuNombre'];
                    header('Location: ./index.php');
                    // }else{
                    //     $_SESSION["error"] = "El usuario ya existe";
                    //     require_once("./view/register.php");
                    // }
                }else{
                    $_SESSION['error'] = 'Campos Incorrectos';
                    require_once('./view/register.php');
                }
            }else{
                $_SESSION['error'] = 'Campos Incorrectos';
                require_once('./view/register.php');
            }
        }

        function cerrarsesion(){
            if(isset($_SESSION['usuNombre'])){
                unset($_SESSION["usuNombre"]);
                header('Location: ./index.php');
            }
        }

        function miCuenta(){
            if(!isset($_SESSION['usuNombre'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $usuario    = UsuarioDAO::datosUsuario($_SESSION['usuNombre']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/miCuenta.php');
            }
        }

        // function cambiarContrasenia(){
        //     return UsuarioDAO::cambiarContrasenia($_SESSION['usuNombre'], $_POST['newusuPass']);
        // }
        function veficarContrasenia(){
            echo(UsuarioDAO::existeUsuario($_SESSION['usuNombre'], $_POST['usuPass'])) ;
        }

        function misCompras(){
            if(!isset($_SESSION['usuNombre'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/misCompras.php');
            }
        }
    }

?>
