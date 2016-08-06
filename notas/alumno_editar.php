
<?php
include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
$sql = "SELECT nombre, direccion, telefono, ci, id_alumno, password FROM `alumno` where id_alumno = '$id'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $nombre = $row[0];
    $direccion = $row[1];
    $telefono = $row[2];
    $ci = $row[3];
    $id_alumno = $row[4];
    $password = $row[5];
}
?>




<html>
    <head>
      <?php include './head.php'; ?>


        <!-- validacion de campos por javaScript -->
        <script language="JavaScript">
            function formulariodecontacto() {
                if (document.formulario.nombre.value == "") {
                    alert("Por favor ingresa tu Nombre.");
                    document.formulario.nombre.select();
                    return false;
                }
                if (document.formulario.direccion.value == "") {
                    alert("Por favor ingresa tu Direccion.");
                    document.formulario.direccion.select();
                    return false;
                }

                return true;
            }
            function revisar_correo(str) {
                var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (filter.test(str)) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body onload="document.getElementById('nombre').focus()">

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
                <form action="alumno_update.php" method="post" name="formulario">

                    <input name="id_alumno" type="text" class="campo" id="id_alumno" hidden=""  value="<?php echo $id_alumno ?> "/> 
                    Nombre:     <input name="nombre" type="text" class="campo" id="nombre" size="80" required="" value="<?php echo $nombre ?> "/> 
                    <br>
                    <br>
                    Direccion:  <input type="text"  class="campo" name="direccion" id="direccion" size="80" required="" value="<?php echo $direccion ?> "/> 
                    <br>
                    <br>
                    Telefono:  <input type="text"  class="campo" name="telefono" id="telefono" size="80" value="<?php echo $telefono ?> "/> 
                    <br>
                    <br>
                    CI:  <input type="text"  class="campo" name="ci" id="ci" size="80" required="" value="<?php echo $ci ?> "/> 
                    <br>
                    <br>

                    Contraseña:  <input type="password"  class="campo" name="password" id="password" size="40" value="<?php echo $password ?> "/> 
                    <br>
                    <br>




                    <input type="submit" value="Guardar" />

                </form>
            </div>
        </div>
    </body>
</html>

