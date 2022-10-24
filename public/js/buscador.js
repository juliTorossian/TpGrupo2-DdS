
function buscar(){

    var busqueda  = document.querySelector("#busqueda").value;

    console.log(busqueda);

    if (busqueda !== ''){
        window.location.href = "index.php?controller=productoCON&action=verProductosFiltradosBusquda&busqueda=" +busqueda +"";
    }

}


// function filtrarPorCategorias(){

//     var categorias = document.querySelectorAll('.filtro-categoria').checkbox;

//     console.log(categorias);

// }