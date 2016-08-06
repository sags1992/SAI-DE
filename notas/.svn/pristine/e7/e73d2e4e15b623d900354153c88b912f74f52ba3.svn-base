 

<html>
    <head>
        <title>Sistema</title>
    </head>
    <body onload="document.getElementById('nombre').focus()">
        <h1>Ingrese la información</h1>

        <!-- Agregamos el menu -->
        <?php
        include './menu.html';
        ?>
        <br>
        <br>
        <br>
        <br>
        <div id="contenedor">
            <form action="alumno_materia_guardar.php" method="post" name="formulario" onSubmit="return formulariodecontacto()" target="_blank">

                Alumno: 
                <select name="id_alumno" required="">
                    <option value="">Elija un alumno</option>
                    <?php
                    $sql = "SELECT id_alumno, nombre FROM `alumno` order by nombre";
                    include ("./conexion.php");
                    $con = conectar();
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>  
                        <?php
                    }
//                    mysqli_close($con);
                    ?>
                </select>
                <br>
                <br>
                Materia: 
                <select name="id_materia" required="">
                    <option value="">Elija una materia</option>
                    <?php
                    $sql = "SELECT id_materia, nombre, id_curso FROM `materia` order by nombre";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {


                        $result2 = mysqli_query($con, "SELECT curso FROM `curso` where id_curso = '$row[2]'");
                        if ($row2 = mysqli_fetch_array($result2)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>  
                            <?php
                        }
                    }
                    mysqli_close($con);
                    ?>
                </select>
                <br>
                <br>
                <input type="submit" value="Guardar" />

            </form>
        </div>
    </body>
</html>

