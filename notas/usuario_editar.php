
<?php
include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
$sql = "SELECT nombre, id_usuario, password FROM `usuario` where id_usuario = '$id'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $nombre = $row[0];
    $id = $row[1];
    $pass = $row[2];
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
                <form action="usuario_update.php" method="post" name="formulario">

                    <input name="id_usuario" type="text" class="campo" hidden=""  value="<?php echo $id ?> "/> 
                    Nombre:     <input name="nombre" type="text" class="campo" id="nombre" size="80" required="" value="<?php echo $nombre ?> "/> 
                    <br>
                    <br>
                    Contraseña:  <input type="password"  class="campo" name="password" size="80" required="" value="<?php echo $pass ?>"/> 
                    <br>
                    <br>
                    <input type="submit" value="Guardar" />

                </form>
            </div>
        </div>
    </body>
</html>

