<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="./public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./public/css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Navbar Start -->
    <!-- <div id="nav-placeholder">

    </div> -->
    <!-- Navbar End -->
    <?php require("./view/nav.php"); ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <!-- <a class="breadcrumb-item text-dark" href="#">Productos</a> -->
                    <span class="breadcrumb-item active">Lista Productos</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <!-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtrar por precio</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> -->
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filtrar por categoria</span></h5>
                <div class="bg-light p-4 mb-30">
                    <!-- <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <label class="custom-control-label" for="price-all">Herramientas</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Pinturas</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">Materiales</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Hogar, Muebles y Jardín</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                    </form> -->

                    <?php
                    foreach ($categorias as $key => $categoria) {
                        $checked = $categoria->cateId == $categoriaSel ? 'checked' : '';
                    ?>
                        <a style="color:black;" href="index.php?controller=productoCON&action=verProductosPorCategoria&categoriaId=<?php echo($categoria->cateId);?>">
                            <div class="custom-control d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" class="custom-control-input" id="color-all" <?php echo($checked);?>>
                                <label class="custom-control-label"><?php echo($categoria->cateNombre); ?></label>
                                <span class="badge border font-weight-normal">5</span>
                            </div>
                        </a>
                    <?php

                    }
                    ?>
                </div>
                <!-- Color End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">

                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Ordenar</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Más reciente</a>
                                        <a class="dropdown-item" href="#">Popularidad</a>
                                        <a class="dropdown-item" href="#">Mejor valorados</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Mostrar</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- producto -->

                    <?php
                    if (count($productos) > 0){
                        foreach($productos as $key => $producto){
                    ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <a href="index.php?controller=productoCON&action=verProducto&productoId=<?php echo($producto->productoId);?>">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="<?php echo($producto->proNomImagen);?>" alt="<?php echo($producto->proNombre);?>">
                                    </div>
                                    <div class="text-center py-4">
                                        <h6 ><?php echo($producto->proNombre);?></h6>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5><?php echo('$'.$producto->proPrecio);?></h5>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                            <small>(99)</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    }else{
                    ?>
                        <p>No se encontraron productos.</p>
                    <?php
                    }
                    ?>



                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#"><<</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                <li class="page-item disabled"><a class="page-link" href="#">>></a></li>
                            </ul>
                        </nav>                   
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <!-- <div id="footer-placeholder">

    </div> -->
    <!-- Footer End -->
    <?php require("./view/footer.php"); ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./public/lib/easing/easing.min.js"></script>
    <script src="./public/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="./public/js/main.js"></script>

    <script>
        $(function(){
          $("#nav-placeholder").load("nav.html");
        });
        $(function(){
          $("#footer-placeholder").load("footer.html");
        });
    </script>
</body>

</html>