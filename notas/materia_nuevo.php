 

<html>
    <head>

        <?php
        include './head.php';
        ?>

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
            <h1>Ingrese la Materia</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <h1 class="main_title">Ingrese la información</h1>
            <div id="contenedor">
                <form action="materia_guardar.php" method="post" name="formulario">
                    Materia:     <input name="materia" type="text" class="campo" id="materia" size="80" required="" placeholder="Escriba el nombre de la asignatura..."/> 
                    <br>   
                    <br>   
                    Nivel: 
                    <select name="id_curso" required="">
                        <option value="">Elija un nivel</option>
                        <?php
                        $sql = "SELECT id_curso, curso FROM `curso`";
                        include ("./conexion.php");
                        $con = conectar();
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>  
                            <?php
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Guardar" />
                </form>
            </div>
        </div>
    </body>
</html>

