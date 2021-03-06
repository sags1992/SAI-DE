<?php

include ("./head.php");
?>
<!DOCTYPE html>
<html>
            <script language="JavaScript">
            function aviso(url) {
                if (!confirm("Desea ingresar Calificacion?")) {
                    return false;
                }
                else {
                    document.location = url;
                    return true;
                }
            }
            </script>
    <head>
        <style type="text/css" title="currentStyle">
            @import "css/demo_table_jui.css";
            @import "themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                oTable = $('#example').dataTable({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "oLanguage": {
                        "sEmptyTable": "No hay datos", //tabla vacia
                        "sInfo": "Mostrando  (_START_ - _END_) de _TOTAL_ registros",
                        "sLengthMenu": 'Mostrar <select>' +
                                '<option value="10">10</option>' +
                                '<option value="20">20</option>' +
                                '<option value="30">30</option>' +
                                '<option value="40">40</option>' +
                                '<option value="50">50</option>' +
                                '<option value="-1">Todo</option>' +
                                '</select> registros',
                        "sLoadingRecords": "Espere un momento, cargando...",
                        "sSearch": "Buscar:",
                        "sZeroRecords": "No hay datos con esa busqueda",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Ultimo",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior",
                        }
                    }

                });

            });

        </script>

    </head>

    <body class="ex_highlight_row">

        <div class="container">

            <br>
            <br>
            <br>
            <h1>Materias del Alumno</h1>
            <?php
            include './menu.html';
            ?>
            
            <br>
            <br>

            <br>
           

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                <thead>
                <tr>
                        
                    <th>Curso</th>
                    <th>Materia / Nivel</th>
                    <th>Calificacion</th>
                    
                    <th>Opciones</th>
                 

                </tr>
                </thead>

                <tbody>
                   
                    
                    <?php
                    include ("./conexion.php");
                    $con = conectar();

                    $id_alumno = $_GET["id"];


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
                            ?> 
                            <td><a href="calificacion_ingresar.php?id=<?php echo $row[2] ?>&tipo=1&ida=<?php echo $id_alumno ?>">Calificaciones</a> </td>


                            <?php
                            "</tr> \n";
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
                            ?> 
                            <td><a href="calificacion_ingresar.php?id=<?php echo $row[0] ?>&tipo=2&ida=<?php echo $id_alumno ?>">Calificaciones</a> </td>


                            <?php
                            "</tr> \n";
                        }
                    }
                    mysqli_close($con);
                    ?>
                </tbody>

            </table>
            <br>
            <br>
        </div>

    </body>

</html>