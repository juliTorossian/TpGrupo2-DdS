const carrito = new Carrito();
const productos = document.querySelector('.productos');
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

function mostrarProductosEnCarrito(usuario){
    carrito.mostrarProductosEnCarrito(usuario);
}

function actualizarCantidades(){
    carrito.actualizarCantidadesDeLosProductos();
}

function realizarCompra(usuario){
    carrito.realizarCompra(usuario);
}
