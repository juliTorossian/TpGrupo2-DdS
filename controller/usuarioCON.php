<?php
    require_once("./model/UsuarioDAO.php");
    // require_once('./model/productoDAO.php');
    require_once('./model/categoriaDAO.php');
    require_once('./model/monedaDAO.php');
    // require_once('./model/favoritoDAO.php');
    
    class UsuarioCON {

        function login(){
            // echo '<pre>'; print_r($_POST); echo '</pre>';
            if(isset($_POST['usuNombre']) && isset($_POST['usuPass'])){
                if(!empty($_POST['usuNombre']) && !empty($_POST['usuPass'])){
                    // echo(UsuarioDAO::existeUsuario($_POST['usuNombre'], $_POST['usuPass']));
                    if(UsuarioDAO::existeUsuario($_POST['usuNombre'], $_POST['usuPass'])){
                        $_SESSION['usuario'] = UsuarioDAO::usuarioIdXNombre($_POST['usuNombre']);
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

            // echo '<pre>'; print_r($_POST); echo '</pre>';

            if(isset($_POST['usuNombre']) && isset($_POST['usuPass'])){
                if(!empty($_POST['usuNombre']) && !empty($_POST['usuPass'])){
                    // if(!UsuarioDAO::nombreDeUsuarioOcupado($_POST['usuNombre'])){
                    UsuarioDAO::crearUsuario($_POST['usuNombre'], $_POST['usuApellido'], $_POST['usuPass'], $_POST['usuMail']);
                    $_SESSION['usuario'] = $_POST['usuNombre'];
                    header('Location: ./index.php?controller=usuarioCON&action=login');
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
                require_once('./view/registro.php');
            }
        }

        function cerrarsesion(){
            if(isset($_SESSION['usuario'])){
                unset($_SESSION["usuario"]);
                header('Location: ./index.php');
            }
        }

        function miCuenta(){
            if(!isset($_SESSION['usuario'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $usuario    = UsuarioDAO::datosUsuario($_SESSION['usuario']);
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/miCuenta.php');
            }
        }

        // function cambiarContrasenia(){
        //     return UsuarioDAO::cambiarContrasenia($_SESSION['usuario'], $_POST['newusuPass']);
        // }
        function veficarContrasenia(){
            echo(UsuarioDAO::existeUsuario($_SESSION['usuario'], $_POST['usuPass'])) ;
        }

        function misCompras(){
            if(!isset($_SESSION['usuario'])){
                header('Location: ./index.php?controller=UsuarioCON&action=login');
            }else{
                $categorias = CategoriaDAO::cargarCategorias();
                $monedas    = monedaDAO::cargarMonedas();
                require_once('./view/misCompras.php');
            }
        }
    }

?>
