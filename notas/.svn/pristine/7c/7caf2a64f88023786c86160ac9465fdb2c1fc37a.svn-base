
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
            <h1>Listado de Niveles</h1>
            <?php
            include './menu.html';
            ?>

            <br>
            <br>
            <br>

            <a href="nivel_nuevo.php" > Agregar Nivel </a>

            <br>
            <br>
            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Niveles</th>
                            <th>Opciones</th>
                    </thead>


                    <?php
                    $sql = "SELECT nivel, id_nivel FROM `nivel` where borrado != '1' or borrado is null";

                    include ("./conexion.php");
                    $con = conectar();
                    $result = mysqli_query($con, $sql);
                    if ($result != null) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>"
                            . "<td>$row[0]</td>"
                            ?> <td> <a href="javascript:;" onclick="aviso('nivel_borrar.php?id=<?php echo $row[1] ?>'); return false;">Borrar</a></td><?php
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