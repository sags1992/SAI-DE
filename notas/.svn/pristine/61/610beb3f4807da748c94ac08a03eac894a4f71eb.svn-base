
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
            <h1>Lista de Usuarios</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <br>
            <a href="usuario_nuevo.php"> Agregar Usuario </a>
            <Br>
            <Br>

            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Opciones</th>
                    </thead>


                    <?php
                    include ("./conexion.php");
                    $con = conectar();
                    $sql = "SELECT nombre, password, id_usuario FROM `usuario`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>"
                        . "<td> $row[0]</td>"
                        . "<td>******************</td>"
                        ?> <td> <a href="javascript:;" onclick="aviso('usuario_borrar.php?id=<?php echo $row[2] ?>');
                                    return false;">Borrar</a> 

                            <a href="usuario_editar.php?id=<?php echo $row[2] ?>">Editar</a>
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