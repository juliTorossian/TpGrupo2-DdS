<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro - FERREtian</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/stylePropio.css" rel="stylesheet">
</head>

<body class="body_login">

    <!-- <center> -->
    <div class="content_login cuadro-login">
        <img src="./public/img/LogoLogin.png" style="margin-top: 10%;" alt="login image">
        <h2 class="mt-5" style="text-align: center; color: #ffd333;"> Registro de usuario</h2>
        <div class="contact-form p-30 " style="color: black; text-align: center;">
            <form action="./index.php?controller=usuarioCON&action=registrar" method="post">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="usuNombre">Nombre</label>
                      <input type="text" class="form-control" id="usuNombre" name="usuNombre" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="usuApellido">Apellido</label>
                      <input type="text" class="form-control" id="usuApellido" name="usuApellido" placeholder="Apellido" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-10 mx-auto mt-2">
                        <label for="usuMail">Email</label>
                        <input type="email" class="form-control" id="usuMail" name="usuMail" placeholder="Correo@mail.com.ar" required>
                    </div>
                    <div class="col-md-10 mx-auto mt-2">
                        <label for="usuPass">Contraseña</label>
                        <input type="password" class="form-control" name="usuPass" id="usuPass" placeholder="Contraseña" required>
                    </div>
                    <div class="col-md-10 mx-auto mt-2">
                        <label for="usuPassConfirm">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="usuPassConfirm" id="usuPassConfirm" placeholder="Confirma contraseña" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-5" type="submit">Registrarse</button>
            </form>
        </div>


        <!-- <div class="centrado">
            <img src="./img/LogoLogin.png" alt="login image">
            <div class="form_main">
                <form action="" method="POST">
                    <label for="att_usuario">Usuario:</label>
                    <input type="text" name="username" class="form_camp" required>
                    <label for="att_password">Contraseña:</label>
                    <input type="password" name="password" class="form_camp" required>
    
                    <input type="submit" name="submit" class="form_submit" value="Iniciar Sesion">

                    
                    <p class="no_cuenta"> No tenes cuenta? <a href="#">Registrate</a></p>
                </form>
            </div>
        </div> -->
    </div>


</body>

<!-- <script src="./public/js/controlPass.js"></script> -->

</html>