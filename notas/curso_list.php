
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
        
            <h1>Listado de Cursos</h1>
            <?php
            include './menu.html';
            ?>

            <br>
            <br>

            <br>
            <a href="curso_nuevo.php" > Agregar Curso </a>
            <Br>
            <Br>


            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Cursos</th>
                            <th>Opciones</th>
                    </thead>


                    <?php
                    $sql = "SELECT curso, id_curso FROM `curso` where borrado != '1' or borrado is null";

                    include ("./conexion.php");
                    $con = conectar();
                    $result = mysqli_query($con, $sql);

                    if ($result != null) {

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>"
                            . "<td>$row[0]</td>"
                                ?> <td> <a href="javascript:;" onclick="aviso('curso_borrar.php?id=<?php echo $row[1] ?>'); return false;">Borrar</a></td><?php
                             "</tr> \n";
                        }
                    }
                    mysqli_close($con);
//                }
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>