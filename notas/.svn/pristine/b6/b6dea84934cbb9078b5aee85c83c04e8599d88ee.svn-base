
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
            <h1>SAI-DE</h1>
            <?php
            include './menu_alumno.html';
            ?>

            <br>
            <br>



            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>Informacion</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                    </thead>

                    <?php
                    include ("./conexion.php");
                    $con = conectar();
                    $sql = "SELECT evento, fecha, hora FROM `evento`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>"
                        . "<td> $row[0]</td>"
                        . "<td>$row[1]</td>"
                        . "<td>$row[2]</td>"
                        . "</tr> \n";
                    }
                    mysqli_close($con);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>