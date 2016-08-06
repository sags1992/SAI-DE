<html>
    <head>
        <title>Tesis</title>
    </head>
    <body onload="document.getElementById('buscar').focus()">

        <h1>Registro de Alumnos & Materias</h1>

        <?php
        include './menu.html';
        ?>

        <br>
        <br>

        <br>
        <a href="alumno_materia_nuevo.php" > Agregar Registro </a>
        <Br>
        <Br>


        <div class="datagrid">
            <table>
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Materia / Nivel</th>
                        <th>Calificación</th>
                        <th>Opciones</th>
                </thead>


                <?php
                $sql = "SELECT id_alumno, id_materia FROM `alumno_materia`";

                include ("./conexion.php");
                $con = conectar();
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {

                    $result_alumno = mysqli_query($con, "SELECT nombre FROM `alumno` where id_alumno = '$row[0]'");
                    if ($row_alumno = mysqli_fetch_array($result_alumno)) {

                        $result_materia = mysqli_query($con, "SELECT nombre, id_curso FROM `materia` where id_materia = '$row[1]'");
                        if ($row_materia = mysqli_fetch_array($result_materia)) {

                            $result_curso = mysqli_query($con, "SELECT curso FROM `curso` where id_curso = '$row_materia[1]'");
                            if ($row_curso = mysqli_fetch_array($result_curso)) {

                                echo "<tr>"
                                . "<td>$row_alumno[0]</td>"
                                . "<td>$row_materia[0] / $row_curso[0] </td>"
                                . "<td></td>"
                                . "<td></td>"
                                . "</tr> \n";
                            }
                        }
                    }
                }
                mysqli_close($con);
                ?>
            </table>
        </div>
    </body>
</html>