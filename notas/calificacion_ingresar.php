
<?php
include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
$tipo = $_GET["tipo"];
$ida = $_GET["ida"];

?>




<html>
    <head>
        <title>4k</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/dropdown.vertical.rtl.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/default/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />


        <?php
        include './head.php';
        ?>


        <script type="text/javascript">
            $(document).ready(function() {
                $("#datepicker").datepicker();
            });
        </script>

    </head>
    <body onload="document.getElementById('nombre').focus()">

        <div class="container">
            <br>
            <br>
            <h1>Ingrese la informacion del Alumno</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>


          
            <h1 class="main_title">Ingrese calificacion</h1>
            <div id="contenedor">
                <form action="calificacion_guardar.php" method="post" name="formulario">
                    
                   
                    <input name="id_alumno_materia" type="text" class="campo" hidden=""  value="<?php echo $id ?> "/> 
           
                    <input name="ida" type="text" class="campo" id="ida" hidden=""  value="<?php echo $ida ?> "/> 
              
                    <input name="tipo" type="text" class="campo" id="tipo" hidden="" value="<?php echo $tipo ?> "/> 

                    <div class="label_div">Calificacion: </div>  <input type="number" required=""  class="campo" name="calificacion" id="calificacion" value=""/> 
                    <br>
                    <br>

                    <input type="submit" value="Guardar" />
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>

