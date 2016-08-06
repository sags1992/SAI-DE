
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
            <h1>Lista de alumnos</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <br>
            <form action="alumno_list_buscar.php" method="post">
                Buscar: <input placeholder="Buscar alumno por nombre..." id="buscar" required="" name="buscar" size="50" >
                <input type="submit" value="Buscar" >
            </form>
            <br>
            <a href="alumno_nuevo.php"> Agregar Alumno </a>
            <Br>
            <Br>

            <div class="datagrid">
                <table>
                   <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Nro. C.I.</th>
                            <th>Opciones</th>
                </thead>


                    <?php
                    include ("./conexion.php");
                    $con = conectar();
                    $sql = "SELECT nombre, direccion, telefono, ci, id_alumno FROM `alumno` where borrado != '1'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>"
                        . "<td> $row[0]</td>"
                        . "<td>$row[1]</td>"
                        . "<td>$row[2]</td>"
                        . "<td>$row[3]</td>"
                        ?> <td> <a href="javascript:;" onclick="aviso('alumno_borrar.php?id=<?php echo $row[4] ?>');
                                    return false;">Borrar</a> 

                            <a href="alumno_editar.php?id=<?php echo $row[4] ?>">Editar</a>
                            <!--<a href="#.php?id=<?php echo $row[4] ?>">Cuotas</a>--> 
                            <a href="calificaciones_list.php?id=<?php echo $row[4] ?>">Ver Materias</a>
                            <a href="historial_curso.php?id=<?php echo $row[4] ?>">Historial</a> 
                        </td>

                        <?php
                        "</tr> \n";
                    }
                    mysqli_close($con);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>