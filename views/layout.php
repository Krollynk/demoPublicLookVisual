<?php
    $modulo = $_SESSION['modulo'];
    $accion = $_SESSION['accion'];
    $data = $resultado;
?>

<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../styles/main.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
        <title>Lobby</title>
    </head>
    <body>

        <?php include "header.php";?>
        <main>
            <div class="grid_box main_header">
                <p class="main_title">MÓDULO <?= $modulo ?></p>
                <form action="">
                    <input type="text" class="main_input_header" placeholder="Nombre de cliente">
                    <input type="submit" class="main_submit_header main_input_header" value="Buscar">
                </form>
            </div>
            <?php
                if (isset($viewFile)) {
                    include $viewFile;
                } else {
                    echo "<h2>Error: no se cargó ninguna vista.</h2>";
                }
            ?>
        </main>
        
    </body>
</html>