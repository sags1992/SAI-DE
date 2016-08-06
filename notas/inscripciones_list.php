
<html>
    <head>
        <?php include './head.php'; ?>

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
            <h1>Lista de Alumnos Inscriptos</h1>


            <?php
            include './menu.html';
            ?>

            <br>
            <br>
            <br>


            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Curso/Nivel</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                    </thead>


                    <?php
                    include ("./conexion.php");
                    $con = conectar();

                    $sql = "SELECT * FROM `inscripcion` where borrado != '1'";

                    $curso = "";
                    $nivel = "";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {


                        $sql2 = "SELECT * FROM `alumno` where id_alumno = '$row[1]'";
                        $result2 = mysqli_query($con, $sql2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $nombre = $row2[1];
                        }

                        if ($row[2] != null) {
                            $sql3 = "SELECT * FROM `curso` where id_curso = '$row[2]'";
                            $result3 = mysqli_query($con, $sql3);
                            while ($row3 = mysqli_fetch_array($result3)) {
                                $curso = $row3[1];
                            }
                        }
                        if ($row[3] != null) {
                            $sql3 = "SELECT * FROM `nivel` where id_nivel = '$row[3]'";
                            $result3 = mysqli_query($con, $sql3);
                            while ($row3 = mysqli_fetch_array($result3)) {
                                $nivel = $row3[1];
                            }
                        }

                        echo "<tr>"
                        . "<td>$nombre</td>"
                        . "<td>$curso $nivel</td>"
                        . "<td>$row[4]</td>"
                        ?> <td> <a href="javascript:;" onclick="aviso('inscripcion_borrar.php?id=<?php echo $row[0] ?>');
                                    return false;">Borrar</a> 

                        </td>
                        <?php
                        "</tr> \n";

                        $curso = "";
                        $nivel = "";
                    }
                    mysqli_close($con);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>