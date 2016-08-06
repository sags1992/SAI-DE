
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Tesis</title>
        <link rel="stylesheet" href="css3/style.css">
    </head>
    <body>
        <div class="vid-container">
            <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
                <source src="images/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
            </video>
            <div class="inner-container">
                <div class="box">

                    <?php
                    $err = $_GET["cod"];

                    if ($err == 1) {
                        $mensaje = "Alumno no encontrado.";
                    }
                    if ($err == 0) {
                        $mensaje = "Curso incorrecto.";
                    }
                    if ($err == 2) {
                        $mensaje = "Verificar los datos";
                    }
                    if ($err == 3) {
                        $mensaje = "Elija una sola opcion";
                    }
                    ?>

                    <h1>Error. <?php echo $mensaje ?></h1>
                </div>
            </div>
        </div>
        <script src="js3/index.js"></script>
    </body>
</html>
