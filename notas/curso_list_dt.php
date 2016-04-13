<?php
include ("./conexion.php");


$con = conectar();
$sql = "SELECT curso, id_curso FROM `curso` where borrado != '1' or borrado is null";
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
            <h1>Lista de Cursos</h1>
            <?php
            include './menu.html';
            ?>
            
            <br>
            <br>

            <br>
            <a href="curso_nuevo.php" > Agregar Curso </a>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                <thead>
                <tr>
                        
                    <th>Codigo</th>
                    <th>Descripcion Curso</th>
                    <th>Opciones</th>
                 

                </tr>
                </thead>

                <tbody>
                    <?php while ($rows = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $rows['id_curso']; ?></td>
                            <td><?php echo $rows['curso']; ?></td>
                         
                           <td>
                               <input type="button" title="Borrar Curso" href="javascript:;" onclick="aviso('curso_borrar.php?id=<?php echo $rows['id_curso'] ?>'); return false;" name="Borrar" value="Borrar">
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