<?php

    function call($controller, $action){

        require_once("controller/$controller.php");

        $controller = new $controller;
        $controller->{$action}();
    }

    $controllers = array('home'           => ['inicio', 'terycond', 'contacto', 'envios'],
                         'usuarioCON'     => ['login', 'registrar', 'loginView', 'registrarView', 'cerrarsesion', 'miCuenta', 'favoritos', 'misCompras', 'cambiarContrasenia', 'veficarContrasenia'],
                         'oferta'         => ['ofertas'],
                         'productoCON'    => ['verProducto', 'verListaProductos', 'verProductosPorCategoria', 'verOfertas', 'verProductosFiltradosBusquda'],
                         'footer'         => ['agregarSub'],
                         'carritoCON'     => ['miCarrito', 'realizarCompra', 'checkout'],
                         'favoritoCON'    => ['favoritos', 'favoritosOnly', 'eliminarProductoCarrito', 'agregarProductoCarrito'],
                         'compraCON'      => ['compraHis', 'compraHisOnly'],
                         'pedidoCON'      => ['nuevoPedido', 'seguimiento']
                        );

    if (array_key_exists($controller, $controllers)){
        if (in_array($action, $controllers[$controller])){
            call($controller, $action);
        }else{
            call('errorController', 'error');
        }
    }else{
        call('errorController', 'error');
    }

?>