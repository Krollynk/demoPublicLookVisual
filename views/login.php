<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/2d26adbd14.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./styles/estilo_index.css">
        <link rel="stylesheet" href="./styles/normalize.css">
        <title>Login</title>
    </head>

    <body>
        <main class="login-design">
            <div class="animation">
                <img src="/assets/opitca3.png" alt="">
            </div>
            <div class="login">
                <div class="login-data">
                    <img src="/assets/login1.png" alt="">
                    <h1>Inicio de Sesión</h1>
                    <p class="error_sesion"> 
                        <?php 
                            if (isset($_SESSION['error_sesion'])) {
                                echo htmlspecialchars($_SESSION['error_sesion']);
                                unset($_SESSION['error_sesion']);
                            }
                        ?>
                    </p>
                    <form id="login-form" action="/login" method="POST" class="login-form">
                        <div class="input-group">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="admUsuarioEmail" placeholder="Usuario" required>
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="admUsuarioPassword" placeholder="Contraseña" required>
                        </div>
                        <input type="submit" value="Iniciar Sesión" class="btn-login">
                    </form>
                </div>
            </div>
        </main>
        <!-- <script src="../js/login.js"></script> -->
    </body>

</html>