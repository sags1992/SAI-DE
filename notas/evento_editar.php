
<?php
include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
$sql = "SELECT evento, fecha, hora FROM `evento` where in_evento = '$id'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $evento = $row[0];
    $fecha = $row[1];
    $hora = $row[2];
}
?>




<html>
    <head>
      <?php include './head.php'; ?>
    </head>
    <body>

        <div class="container">
        
            <br>
            <br>
            <h1>SAI-DE</h1>

            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <h1 class="main_title">Ingrese la informacion</h1>
            <div id="contenedor">
                <form action="evento_update.php" method="post" name="formulario">

                    <input name="in_evento" type="text" class="campo" hidden=""  value="<?php echo $id ?> "/> 
                    Evento:     <input name="evento" type="text" class="campo" id="nombre" size="80" required="" value="<?php echo $evento ?> "/> 
                    <br>
                    <br>
                    Fecha:  <input type="text"  class="campo" name="fecha" size="80" required="" value="<?php echo $fecha ?> "/> 
                    <br>
                    <br>
                    Hora:  <input type="text"  class="campo" name="hora" size="80" value="<?php echo $hora ?> "/> 
                    <br>
                    <br>

                    <input type="submit" value="Guardar" />

                </form>
            </div>
        </div>
    </body>
</html>

