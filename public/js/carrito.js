

class Carrito{
    // CANTIDADES DEL CARRITO

    sumarCantidad(e){//pos, idpro, usuario

        const producto = e.target.parentElement.parentElement.querySelector('#sCant');
        // console.log(usuario);
        // console.log(idProducto);
        // console.log('');

        // console.log(e.target.parentElement.parentElement);

        // console.log(producto.value)

        // var cantidad = parseInt(producto.value);
        // cantidad += 1;
        // producto.value = cantidad.toString();
        //console.log(cantidad);
        //console.log('sumar');
        // this.actualizarPrecio(e, cantidad);
        // console.log('antes de actualizar (s)');
        this.actualizarProductoCarrito(e);
    }
    
    restarCantidad(e){//pos, idpro, usuario

        // console.log(e.target.parentElement.parentElement);
        const producto = e.target.parentElement.parentElement.querySelector('#sCant');
        //console.log(e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro'));
        const idProducto = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('name');
        const usuario = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('usuario');
        // console.log(producto);
        // console.log('');
        
        var cantidad = parseInt(producto.textContent);
        if (cantidad > 0){
            cantidad -= 1;
            // producto.textContent = cantidad.toString();
            //console.log(cantidad);
            //console.log('restar');
            this.actualizarPrecio(e, cantidad);
            if (cantidad > 0){
                // console.log('antes de actualizar (r)');
                this.actualizarProductoCarrito(e);
            }else{
                //preguntar si desea eliminar el producto
                // if(this.existeProductoLS(idProducto, usuario)){
                //     Swal.fire({
                //         title: 'Esta seguro?',
                //         text: "Seguro desea eliminar este producto del carrito",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'Si, eliminarlo!'
                //     }).then((result) => {
                //         //si desea, eliminarlo
                //         if (result.isConfirmed) {
                //             this.eliminarProductoLocalStorage(idProducto);
                //             Swal.fire(
                //             'Eliminado!',
                //             'Producto eliminado del carrito',
                //             'success'
                //             )
                //         }
                //         if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
                //             this.actualizarProductosEnCarrito(e,usuario);
                //         }
                //     })
                // }
            }
        }
    }

    deseaEliminarElProducto(e){
        // console.log(e.target.parentElement.parentElement)
        const idProducto = e.target.parentElement.parentElement.querySelector('#nomPro').getAttribute('name');
        const usuario = e.target.parentElement.parentElement.querySelector('#nomPro').getAttribute('usuario');
        //preguntar si desea eliminar el producto
        if(this.existeProductoLS(idProducto, usuario)){
            Swal.fire({
                title: 'Esta seguro?',
                text: "Seguro desea eliminar este producto del carrito",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!'
            }).then((result) => {
                //si desea, eliminarlo
                if (result.isConfirmed) {
                    this.eliminarProductoLocalStorage(idProducto);
                    Swal.fire(
                    'Eliminado!',
                    'Producto eliminado del carrito',
                    'success'
                    )
                }
                if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
                    this.actualizarProductosEnCarrito(e,usuario);
                }
            })
        }
    }

    // PRECIOS DE LOS PRODUCTOS

    // PRECIO TOTAL DEL PRODUCTO * CANTIDAD
    actualizarPrecio(e, cantidad){

        const producto = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#preIndPrd');
        const procioProductoTotal = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#preTotPrd');
        // console.log(producto.textContent);
        var aux = producto.textContent.split(' ');
        //console.log(aux[1])
        var precioInd = parseFloat(aux[1]);
        //console.log(precioInd.toString())
        var precioAct = (precioInd * cantidad).toFixed(2);
    
        procioProductoTotal.textContent = aux[0] +' ' +precioAct.toString();
    
        if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
            this.actualizaTotal();
        }
    }
    
    // PRECIO TOTAL DE TODOS LOS PRODUCTOS
    actualizaTotal(){
        //const preTotSec  = document.querySelectorAll('#preTotPrd')
        const preTot   = document.querySelectorAll('#preTotPrd')
        const preTotal = document.querySelector('#preTotal')
        const preSubTotal = document.querySelector('#preSubTotal')
        
        // console.log(preTot)

        var precioTotal = 0;
        var count = 0;
        var aux;
        while(count < preTot.length){
            aux = preTot[count].innerHTML.split(' ');
            // console.log(aux);
            precioTotal += parseFloat(aux[1]);
            count++;
        }
    
        // console.log(aux[0] +' ' +precioTotal);
        preTotal.textContent = aux[0] +' ' +precioTotal;
        preSubTotal.textContent = aux[0] +' ' +precioTotal;
    }

    agregarProductoAlCarrito(e){
        this.leerDatosProducto(e, 'A');// A - agregado
    }
    
    actualizarProductoCarrito(e){
        e = e.target.parentElement.parentElement.parentElement;
        //console.log(e);
        const idProducto = e.parentElement.querySelector('#nomPro').getAttribute('name');
        const usuario = e.parentElement.querySelector('#nomPro').getAttribute('usuario');
        // console.log(idProducto)
        // console.log(this.existeProductoLS(idProducto))
        if(this.existeProductoLS(idProducto, usuario)){
            // console.log('actualizando producto')
            this.eliminarProductoLocalStorage(idProducto);
            this.leerDatosProducto(e, 'M'); //M - modificacion
        }
    }
    
    //Leer datos del producto
    leerDatosProducto(e, origen){
        var producto = null;

        console.log(e.target.parentElement.parentElement);
        if(origen === 'M'){
            producto = e.parentElement;
        }else{
            producto = e.target.parentElement.parentElement;
        }
        // console.log(producto);

        const infoProducto = {
            usuario:  producto.querySelector('#nomPro').getAttribute('usuario'),
            // imagen:   producto.querySelector('#imgPro').src,
            nombre:   producto.querySelector('#nomPro').textContent,
            precio:   producto.querySelector('#preIndPrd').textContent.substring(2), // le saco el '$ '
            id:       producto.querySelector('#nomPro').getAttribute('name'),
            cantidad: producto.querySelector('#sCant').value
        }

        // console.log(infoProducto);
        
        // console.log(this.existeProductoLS(infoProducto.id));

        if (infoProducto.usuario > 0){
            if(this.existeProductoLS(infoProducto.id, infoProducto.usuario)){
                Swal.fire({
                    //type: 'info',
                    title: 'Oops...',
                    text: 'El producto ya está agregado',
                    showConfirmButton: false,
                    timer: 2000
                })
                // console.log('Ya existe el producto');
            }
            else {
                if(parseInt(infoProducto.cantidad) < 1){
                    // console.log('la cantidad no puede ser 0');
                }else{
                    //this.insertarCarrito(infoProducto);
                    this.guardarProductosLocalStorage(infoProducto, origen);
                    // console.log('Producto Insertado en el carrito');
                }
            }
        }else{
            // Swal.fire({
            //     //type: 'info',
            //     title: 'Oops...',
            //     text: 'Debes ingresar a tu cuenta para hacer esto',
            //     showConfirmButton: false,
            //     timer: 2000
            // })
            Swal.fire({
                title: 'Oops...',
                text: "Debes ingresar a tu cuenta para hacer esto",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iniciar Sesion'
            }).then((result) => {
                //si desea, eliminarlo
                // if (result.isConfirmed) {
                //     this.eliminarProductoLocalStorage(idProducto);
                //     Swal.fire(
                //     'Eliminado!',
                //     'Producto eliminado del carrito',
                //     'success'
                //     )
                // }
                // if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
                //     this.actualizarProductosEnCarrito(e,usuario);
                // }
                if (result.isConfirmed) {
                    window.location.href = "index.php?controller=usuarioCON&action=login";
                }
            })
        }
    }

    existeProductoLS(idProducto, usuario){
        var aux = false;
        var productosLS;
        productosLS = this.obtenerProductosLocalStorage();
        productosLS.forEach(function (productoLS){
            if(productoLS.id === idProducto){  
                aux = ((productoLS.id === idProducto) && (productoLS.usuario === usuario));
            }
        });
        return aux;
    }
    
    //Eliminar producto por ID del LS
    eliminarProductoLocalStorage(productoID){
        var productosLS;
        //Obtenemos el arreglo de productos
        productosLS = this.obtenerProductosLocalStorage();
        //Comparar el id del producto borrado con LS
        productosLS.forEach(function(productoLS, index){
            if(productoLS.id === productoID){
                // console.log('eliminando: ' +productoLS)
                productosLS.splice(index, 1);
            }
        });
    
        //Añadimos el arreglo actual al LS
        localStorage.setItem('productos', JSON.stringify(productosLS));
    }
    
    //Almacenar en el LS
    guardarProductosLocalStorage(producto,origen){
        var productos;
        //Toma valor de un arreglo con datos del LS
        productos = this.obtenerProductosLocalStorage();
        // console.log(productos);
        //Agregar el producto al carrito
        productos.push(producto);
        //Agregamos al LS
        localStorage.setItem('productos', JSON.stringify(productos));
        if(origen === 'A'){ // A - agregado
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Agregado al carrito',
                showConfirmButton: false,
                timer: 1500
            })
        }
    }
    
    //Comprobar que hay elementos en el LS
    obtenerProductosLocalStorage(){
        var productoLS;
    
        //Comprobar si hay algo en LS
        if(localStorage.getItem('productos') === null){
            productoLS = [];
        }
        else {
            productoLS = JSON.parse(localStorage.getItem('productos'));
        }
        return productoLS;
    }
    
    //Eliminar todos los datos del LS
    vaciarLocalStorage(){
        localStorage.clear();
    }

    mostrarProductosEnCarrito(usuario){
        console.log(usuario);
    
        var productosLS;
        const div = document.querySelector('#div-cards')
        // const moneda = document.querySelector('#moneda').textContent;
        // const sym_div = moneda.split(' ') 
    
        productosLS = this.obtenerProductosLocalStorage();
        var posicion = -1;
        var vacio = true;
        console.log(productosLS)
        productosLS.forEach(function (producto){
            // console.log(usuario)
            // console.log(producto.usuario)
            // console.log(producto.usuario == usuario)

            if(producto.usuario == usuario){
                // console.log("producto")
                vacio = false;
                posicion += 1;
                var aux = producto.precio;
                var precioInd = parseFloat(aux);
                var precioAct = (precioInd * producto.cantidad).toFixed(2);
    
                // precioInd = precioInd / parseInt(sym_div[1]);
                // precioAct = precioAct / parseInt(sym_div[1]);
    
                // precioInd = sym_div[0] +' ' +precioInd.toFixed(2);
                // precioAct = sym_div[0] +' ' +precioAct.toFixed(2);
                
                // div.innerHTML += '<div class="card mb-2"><div class="card-body"><div class="row"><div class="col-3"><img id="imgPro" src="'+producto.imagen +'" alt="imagen producto"></div><div class="col-3 my-auto"><h5 class="card-title" id="nomPro" name="'+producto.id+'" usuario="' +producto.usuario +'">'+producto.nombre+'</h5></div><div class="col-2 my-auto"><div class="input-group mb-3"><a class="btn btn-outline-secondary bRestar" type="button" id="bRestar">-</a><span class="input-group-text" id="sCant">'+producto.cantidad+'</span><a class="btn btn-outline-secondary bSumar" type="button" id="bSumar">+</a></div></div><div class="col-2 my-auto text-center"><h5 style="border-right: 1px solid gray;" id="preIndPrd">'+precioInd+'</h5></div><div class="col-2 my-auto text-center"><h5 id="preTotPrd">' +precioAct +'</h5></div></div></div></div>';
                // <td class="align-middle" id="nomPro" name="'+producto.id+'" usuario="' +producto.usuario +'"><img src="'+producto.imagen +'" id="imgPro" alt="'+producto.nombre +'" style="width: 50px;">'+producto.nombre +'</td> \
                div.innerHTML += '\
                                    <tr> \
                                    <td class="align-middle" id="nomPro" name="'+producto.id+'" usuario="' +producto.usuario +'">'+producto.nombre +'</td> \
                                    <td class="align-middle" id="preIndPrd">$ '+precioInd +'</td> \
                                    <td class="align-middle"> \
                                        <div class="input-group quantity mx-auto" style="width: 100px;"> \
                                            <div class="input-group-btn"> \
                                                <button class="btn btn-sm btn-primary btn-minus bRestar" > \
                                                <i class="fa fa-minus"></i> \
                                                </button> \
                                            </div> \
                                            <input type="text" id="sCant" class="form-control form-control-sm bg-secondary border-0 text-center" value="'+producto.cantidad +'"> \
                                            <div class="input-group-btn"> \
                                                <button class="btn btn-sm btn-primary btn-plus bSumar"> \
                                                    <i class="fa fa-plus"></i> \
                                                </button> \
                                            </div> \
                                        </div> \
                                    </td> \
                                    <td class="align-middle" id="preTotPrd">$ '+precioAct +'</td> \
                                    <td class="align-middle"><button class="btn btn-sm btn-danger eliminar"><i class="fa fa-times"></i></button></td> \
                                </tr>'
    
                
            }
            
            if(vacio){
                div.innerHTML = 'Su carrito esta vacio';
            }
        });
        if(vacio){
            div.innerHTML = 'Su carrito esta vacio';
        }
        if(!vacio){
            this.actualizaTotal();
        }
    }

    mostrarProductosEnCheckout(usuario){
        // console.log(usuario);
    
        var productosLS;
        const div = document.querySelector('#productos')
        // const moneda = document.querySelector('#moneda').textContent;
        // const sym_div = moneda.split(' ') 
    
        productosLS = this.obtenerProductosLocalStorage();
        var posicion = -1;
        var vacio = true;
        // console.log(productosLS)
        // console.log(div)
        productosLS.forEach(function (producto){
            // console.log(usuario)
            // console.log(producto.usuario)
            // console.log(producto.usuario == usuario)

            if(producto.usuario == usuario){
                // console.log("producto")
                vacio = false;
                posicion += 1;
                var aux = producto.precio;
                var precioInd = parseFloat(aux);
                var precioAct = (precioInd * producto.cantidad).toFixed(2);
    
                // precioInd = precioInd / parseInt(sym_div[1]);
                // precioAct = precioAct / parseInt(sym_div[1]);
    
                // precioInd = sym_div[0] +' ' +precioInd.toFixed(2);
                // precioAct = sym_div[0] +' ' +precioAct.toFixed(2);

                div.innerHTML += '\
                                <div class="d-flex justify-content-between"> \
                                    <p class="overflow-auto" id="nomPro" name="'+producto.id+'" usuario="' +producto.usuario +'">'+producto.nombre +'</p> \
                                    <p id="preTotPrd">$ '+precioAct +'</p> \
                                </div>'
                
            }
            
            // if(vacio){
            //     div.innerHTML = 'no tiene un pedido asociado';
            // }
        });
        if(vacio){
            div.innerHTML = 'no tiene un pedido asociado';
        }
        if(!vacio){
            this.actualizaTotal();
        }
    }

    actualizarProductosEnCarrito(e, usuario){
        console.log(e.target.parentElement.parentElement)
        e.target.parentElement.parentElement.parentElement.innerHTML = '';
        this.mostrarProductosEnCarrito(usuario);
    }

    filename(){
		var rutaAbsoluta = self.location.href;   
		var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
		var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
		return rutaRelativa;  
	}

    actualizarCantidadesDeLosProductos(){
        const cantidades = document.querySelectorAll('#sCant');
        //console.log(cantidades)

        const productosLS = this.obtenerProductosLocalStorage();

        cantidades.forEach(function(cantProducto){
            const idProducto = cantProducto.getAttribute('name');
            productosLS.forEach(function(productoLS){
                if(productoLS.id === idProducto){
                    cantProducto.textContent = productoLS.cantidad;
                }
            });
        });

        
    }

    eliminarCarrito(usuario){
        var productosLS;
        //Obtenemos el arreglo de productos
        productosLS = this.obtenerProductosLocalStorage();
        //Comparar el id del producto borrado con LS
        productosLS.forEach(function(productoLS, index){
            if(productoLS.usuario === usuario){
                console.log('eliminando: ' +productoLS)
                productosLS.splice(index, 1);
            }
        });
    
        //Añadimos el arreglo actual al LS
        localStorage.setItem('productos', JSON.stringify(productosLS));
    }

    realizarCompra(usuario){
        var productosLS = this.obtenerProductosLocalStorage();
        var compra = [];
    
        productosLS.forEach(function(producto){
            if(producto.usuario === usuario){
                compra.push(producto);
                carrito.eliminarCarrito(usuario);
            }
        });

        $.post('index.php?controller=carritoCON&action=realizarCompra', {"compra" : compra, "usuario": usuario}, function(data){
            if(data === '1'){
                console.log('ok');
                location.reload();
            }else{
                console.log('no ok');
            }
        });
    }

    finalizarCompra(usuario){
        var productosLS;

        Swal.fire({
            title: 'Finalizar Compra',
            text: "Seguro que quieres finalizar la compra?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {
                productosLS = this.obtenerProductosLocalStorage();
        
                // console.log(productosLS);
                // console.log("finalizar compra");

                let importe = 0;
                let pedido = {
                    pedUsuario: usuario,
                    pedImporte: 0,
                    pedProductos: []
                }
                productosLS.forEach( (producto) => {
                    if (producto.usuario == usuario){
                        let prd = {
                            productoId: producto.id,
                            productoCant: producto.cantidad,
                            productoPrecio: producto.precio
                        }
                        importe += (producto.precio * producto.cantidad);
                        pedido.pedProductos.push(prd);
                    }
                })
                pedido.pedImporte = importe;

                // console.log(pedido);


                $.post('index.php?controller=pedidoCON&action=nuevoPedido', pedido, function(data){
                    console.log(data);
                    carrito.eliminarCarrito(usuario);
                    window.location.href = "index.php?controller=pedidoCON&action=seguimiento&pedido="+data;
                });

                // axios.post('index.php?controller=pedidoCON&action=nuevoPedido', {
                //     pedido
                // })
                // .then(function (response) {
                //     console.log(response);
                //     console.log(response.data);
                // })
                // .catch(function (error) {
                //     console.log(error);
                // });

                // axios({
                //     method: 'post',
                //     url: 'index.php?controller=pedidoCON&action=nuevoPedido',
                //     data: pedido
                // });

                // carrito.eliminarCarrito(usuario);
                // window.location.href = "index.php?controller=pedidoCON&action=seguimiento";

            }
        })

    }
}


// var var1 = 10;

// $('#realizarCompra').on('click', function(){
//     $.post('index.php?controller=carritoCON&action=realizarCompra', {
//         "var1": var1
//     },function(data){
//         console.log('realizando compra', data);
//     });
// })









