<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Seguimiento (<?php echo($pedido->pedId);?>) - FERREtian</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Seguimiento</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Seguimiento del pedido <?php echo($pedido->pedId);?></span>
        </h2>
        <div class="row px-xl-5">
            <div class="container pt-3" style="background-color: darkgray;">
                <div class="row">
                    <div class="col-12">
                        <h3>Estado</h3>
                    </div>
                    <div class="col-12">
                        <p>Pedido en preparacion, te avisaremos cuando lo puedas pasar a buscar.</p>
                    </div>
                    <div class="col-1"></div><div class="col-10 justify-content-center">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 40%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><div class="col-1"></div>
                    <div class="col-12 mt-4">
                        <h4 class="h6">Envio:</h4>
                    </div>
                    <div class="col-12 ml-5">
                        <div>
                            <div class="row">
                                <p>Retira por el local. (<a href="index.php?controller=home&action=contacto">Donde estamos?</a>)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <h4 class="h6">Detalle del seguimiento:</h4>
                    </div>
                    <div class="col-12 ml-5">
                        <div>
                            <div class="row">
                                <p class="m-0"><strong><?php echo($pedido->pedFecha); ?></strong></p>
                            </div>
                            <div class="row">
                                <p>Se registro la compra</p>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <p class="m-0"><strong><?php echo($pedido->pedFecha); ?></strong></p>
                            </div>
                            <div class="row">
                                <p>El pedido esta en preparacion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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

</body>

</html>