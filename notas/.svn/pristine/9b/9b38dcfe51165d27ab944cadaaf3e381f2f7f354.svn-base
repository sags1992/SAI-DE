
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
            <h1>Listado de materias</h1>
            <?php
            include './menu.html';
            ?>

            <br>
            <br>
            <br>


            <a href="materia_nuevo.php" > Agregar Materia </a>

            <br>
            <br>
            <div class="datagrid">
                <table>

                    <thead>
                        <tr>
                            <!--<th>ID</th>-->
                            <th>Materias</th>
                            <th>Curso</th>
                            <th>Opciones</th>
                    </thead>


                    <?php
                    $sql = "SELECT nombre, id_curso, id_materia FROM `materia` where borrado != '1' or borrado is null order by id_materia";

                    include ("./conexion.php");
                    $con = conectar();
                    $result = mysqli_query($con, $sql);

                    if ($result != null) {
                        while ($row = mysqli_fetch_array($result)) {
                            $result_curso = mysqli_query($con, "SELECT curso FROM `curso` where id_curso = '$row[1]'");
                            while ($row2 = mysqli_fetch_array($result_curso)) {
                                echo "<tr>"
//                                . "<td>$row[2]</td>"
                                . "<td>$row[0]</td>"
                                . "<td>$row2[0]</td>"
                                ?> <td> <a href="javascript:;" onclick="aviso('materia_borrar.php?id=<?php echo $row[2] ?>');
                                                    return false;">Borrar</a></td><?php
                                    "</tr>";
                                }
                            }
                        }

                        mysqli_close($con);
                        ?>
                </table>
                <br>
                <br>
            </div>
        </div>

    </body>
</html>