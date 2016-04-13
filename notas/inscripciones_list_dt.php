<?php
include ("./conexion.php");


$con = conectar();
$sql = "select i.id_inscripcion, a.nombre,ifnull(n.nivel, c.curso) nivel_curso, i.fecha
from inscripcion i
LEFT  OUTER JOIN nivel n on i.id_nivel = n.id_nivel
LEFT  OUTER JOIN curso c on i.id_curso = c.id_curso
LEFT  OUTER JOIN alumno a on i.id_alumno = a.id_alumno
where (i.borrado is null or i.borrado != 1)";
$result = mysqli_query($con, $sql);
include ("./head.php");
?>
<!DOCTYPE html>
<html>
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
            <h1>Lista de Inscripciones</h1>
            <?php
            include './menu.html';
            ?>
            
            <br>
            <br>

            <br>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                <thead>
                <tr>
                    <th>Nº Inscripcion</th>  
                    <th>Nombre</th>
                    <th>Nivel/ Curso</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                 

                </tr>
                </thead>

                <tbody>
                    <?php while ($rows = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $rows['id_inscripcion']; ?></td>
                            <td><?php echo $rows['nombre']; ?></td>
                            <td><?php echo $rows['nivel_curso']; ?></td>
                            <td><?php echo $rows['fecha']; ?></td>
                         
                           <td>
                               <input type="button" title="Borrar Curso" href="javascript:;" onclick="aviso('inscripcion_borrar.php?id=<?php echo $rows['id_inscripcion'] ?>'); return false;" name="Borrar" value="Borrar">
                             </td>


                        </tr>

                    <?php } ?>

                </tbody>

            </table>
            <br>
            <br>
        </div>

    </body>

</html>