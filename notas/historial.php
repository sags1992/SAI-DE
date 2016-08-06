


<html>
    <head>

        <?php
        include './head.php';
        ?>

        <script language="JavaScript">
            function aviso(url) {
                if (!confirm("ALERTA!! esta seguro que desea borrar este registro?")) {
                    return false;
                }
                else {
                    document.location = url;
                    return true;
                }
            }
        </script>

    </head>
    <body onload="document.getElementById('buscar').focus()">

        <div class="container">

            <br>
            <br>
            <h1>Listado de materia por alumno</h1>
            <?php
            include './menu_alumno.html';
            ?>

            <br><br><br>

            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Materia / Nivel</th>
                            <th>Calificacion</th>
                    </thead>

                    <?php
                    include ("./conexion.php");
                    $con = conectar();

                    session_start();
                    $id_alumno = $_SESSION['id_alumno'];



                    $sql = "SELECT materia.nombre, curso.curso, alumno_materia.id_alumno_materia, alumno_materia.calificacion 
                        FROM alumno_materia
                        inner join materia on materia.id_materia = alumno_materia.id_materia
                        INNER JOIN curso on materia.id_curso = curso.id_curso
                        where id_alumno = '$id_alumno' and (alumno_materia.borrado != '1' or alumno_materia.borrado is null) ";

//                    $sql = "SELECT id_alumno, id_materia, id_alumno_materia, calificacion FROM `alumno_materia` where id_alumno = '$id_alumno'";
                    $result = mysqli_query($con, $sql);

                    if ($result != null) {

                        while ($row = mysqli_fetch_array($result)) {


                            $calif = $row[3];
                            if ($row[3] == 0) {
                                $calif = "-";
                            }


                            echo "<tr>"
                            . "<td>$row[1]</td>"
                            . "<td>$row[0]</td>"
                            . "<td>$row[3]</td>"
                            . "</tr> \n";
                        }
                    }



                    $nivel = "";
                    $unidades = "";

                    $sql = "SELECT alumno_unidades.id_alumno_unidad, nivel_unidades.unidades, nivel.nivel, alumno_unidades.calificacion
                            FROM alumno_unidades
                            inner join nivel_unidades on nivel_unidades.id_nivel_unidades = alumno_unidades.id_nivel_unidades
                            inner join nivel on nivel.id_nivel = nivel_unidades.id_nivel
                            where id_alumno = '$id_alumno'  and (alumno_unidades.borrado != '1' or alumno_unidades.borrado is null)";
                    $result = mysqli_query($con, $sql);
                    if ($result != null) {

                        while ($row = mysqli_fetch_array($result)) {


                            $calif = $row[3];
                            if ($row[3] == 0) {
                                $calif = "-";
                            }

                            echo "<tr>"
                            . "<td>$row[2]</td>"
                            . "<td>$row[1]</td>"
                            . "<td>$row[3]</td>"
                            . "</tr> \n";
                        }
                    }
                    mysqli_close($con);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>