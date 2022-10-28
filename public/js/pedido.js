const carrito = new Carrito();
const productos = document.querySelector('.productos');
const btnConfirm = document.querySelector('#btnConfirmarCompra');
cargarEventos();

function cargarEventos(){
    if(productos !== null){
        productos.addEventListener('click', (e)=>{
            if(e.target.classList.contains('bSumar')){
                console.log("bSumar")
                carrito.sumarCantidad(e);
            }else if (e.target.classList.contains('bRestar')){
                console.log("bRestar")
                carrito.restarCantidad(e);
            }else if(e.target.classList.contains('comprar')){
                console.log("comprar")
                carrito.agregarProductoAlCarrito(e);
            }else if(e.target.classList.contains('eliminar')){
                console.log("eliminar")
                carrito.deseaEliminarElProducto(e);
            }
        });
    }
}

function finalizarCompra(usuario){
    const chkEfectivo = document.querySelector('#efectivo');
    if (chkEfectivo.checked == null || chkEfectivo.checked == 0){
        alert('Debe seleccionar un metodo de pago');
    }else{
        carrito.finalizarCompra(usuario);
    }
}

function mostrarProductosEnCarrito(usuario){
    carrito.mostrarProductosEnCarrito(usuario);
}

function mostrarProductosEnCheckout(usuario){
    carrito.mostrarProductosEnCheckout(usuario);
}

function actualizarCantidades(){
    carrito.actualizarCantidadesDeLosProductos();
}

function realizarCompra(usuario){
    carrito.realizarCompra(usuario);
}
