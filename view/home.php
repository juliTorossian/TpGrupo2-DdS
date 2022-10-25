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
    <!-- <div id="nav-placeholder"> -->
    <?php require("./view/nav.php"); ?>

    </div>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0 data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 530px;">
                            <img class="position-absolute w-100 h-100" src="https://www.sotic-ba.com.ar/images/galerias/gondolas-pintureria/DSC_8084.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Las mejores pinturas para tu hogar</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 530px;">
                            <img class="position-absolute w-100 h-100" src="https://www.mndelgolfo.com/blog/wp-content/uploads/2019/08/mn-herramienta-piso.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Herramientas de calidad en un solo lugar</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 530px;">
                            <img class="position-absolute w-100 h-100" src="https://www.comoimportarenargentina.com.ar/wp-content/uploads/2018/06/materiales-de-construccion.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Materiales de construcción para tu casa</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Comprar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--<div class="col-lg-4">
                    <div class="product-offer mb-30" style="height: 200px;">
                        <img class="img-fluid" src="img/offer-1.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save 20%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                    <div class="product-offer mb-30" style="height: 200px;">
                        <img class="img-fluid" src="img/offer-2.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Save 20%</h6>
                            <h3 class="text-white mb-3">Special Offer</h3>
                            <a href="" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>-->
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Productos de calidad</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Envío gratis</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Devolución de 14 días</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex justify-content-center align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Soporte 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categorias</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://quimtexexpress.com.ar/wp-content/uploads/2020/05/pintura-albion-latex-exterior.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Pinturas</h6>
                            <small class="text-body">42 Productos</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="http://www.herramientastolsen.cl/wp-content/uploads/79023.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Herramientas</h6>
                            <small class="text-body">56 Productos</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://images.fravega.com/f1000/d95eba594d4057dbbbf05018d858b9b9.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Construcción</h6>
                            <small class="text-body">24 Productos</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://promart.vteximg.com.br/arquivos/ids/4577516-275-275/134676.jpg?v=637812319203130000" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Hogar, Muebles y Jardín</h6>
                            <small class="text-body">64 Productos</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Productos Destacados</span></h2>
        <div class="row px-xl-5">

            <?php
            if (count($a_productos_desta) > 0){
                foreach($a_productos_desta as $key => $producto){
            ?>

                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
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

            <!-- <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img style="width: 500px; height: 500px;" class="img-fluid w-100 h-100" src="http://lobrunosa.com.ar/634-thickbox_default/amoladora-ang-115mm-g720n-ar-820-w.jpg" alt="">
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="detail.html">Amoladora Black & Decker 820w </a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div> -->
            
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="https://pintureriaorlando.com/images/prettyPhotoImages/pintureria-en-merlo-pintureria-orlando-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Ahorrá 20%</h6>
                        <h3 class="text-white mb-3">Oferta especial en pinturas</h3>
                        <a href="" class="btn btn-primary">Comprar ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="https://cajonherramientas.com/wp-content/uploads/2020/05/organizar-herramientas-PORTADA.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Ahorrá 20%</h6>
                        <h3 class="text-white mb-3">Oferta especial en herramientas</h3>
                        <a href="" class="btn btn-primary">Comprar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Productos Recientes</span></h2>
        <div class="row px-xl-5">
            <?php
            if (count($a_productos_nuevos) > 0){
                foreach($a_productos_nuevos as $key => $producto){
            ?>

                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
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
        </div>
    </div> -->
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="https://www.logosenvector.com/logo/img/black---decker-283-14316.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://http2.mlstatic.com/D_NQ_NP_601827-MLA31010933598_062019-O.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://www.synk-group.com/wp-content/uploads/2020/10/Wuerth-Elektronik-Logo.png" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://http2.mlstatic.com/D_NQ_NP_740149-MLA25776090094_072017-O.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://http2.mlstatic.com/D_NQ_NP_949077-MLA27227397538_042018-O.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://http2.mlstatic.com/D_NQ_NP_891876-MLA26108589104_102017-O.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://images-platform.99static.com//355cWpZzKSfLZD_C8r6LC8z30wg=/386x756:1091x1461/fit-in/500x500/99designs-contests-attachments/138/138605/attachment_138605565" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="https://www.pyfsitio.com/wp-content/uploads/2021/02/PINTURAS-ANDINA.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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