<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Pacientes</title>

        <link rel="stylesheet" href="style.css" />

    </head>

    <body>
        <div id="content">

            <h1>Pacientes</h1>

            <hr />

            <?php
            include ("./conexion.php");
            $con = conectar();


            $sql = "SELECT id_paciente, clave, nombre, apellido_paterno, apellido_materno from pacientes";
            $result = mysqli_query($con, $sql);
            
           

            echo '<table cellpadding="0" cellspacing="0" width="100%">';
            echo '<thead><tr><td>No.</td><td>CLAVE</td><td>NOMBRE</td><td>HISTORIAL</td></tr></thead>';
            while ($row = mysqli_fetch_array($result)) {
             echo "<tr>"
                        . "<td>$row[0]</td>"
                        . "<td>$row[1]</td>"
                        . "<td>$row[2]</td>"
                        . "<td>$row[3]</td>"
                        ?> <td>

                            <a href="reporte_historial.php?id=<?php echo $row[0] ?>">Editar</a> </td>

                        <?php
                        "</tr> \n";
                    }
            ?>			

        </div>
    </body>
</html>