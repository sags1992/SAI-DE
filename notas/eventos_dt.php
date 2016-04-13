<?php
include ("./conexion.php");


$con = conectar();
$sql = "SELECT in_evento, evento, fecha, hora FROM `evento`";
$result = mysqli_query($con, $sql);
include ("./head.php");
?>
<!DOCTYPE html>
<html>
            <script language="JavaScript">
            function aviso(url) {
                if (!confirm("Desea continuar?")) {
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
            <h1>Noticias y Eventos</h1>
            <?php
            include './menu.html';
            ?>
            
            <br>
            <br>

            <br>

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                <thead>
                <tr>
                    <th>Nº Evento</th>
                    <th>Informacion</th>  
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Opciones</th>
                 

                </tr>
                </thead>

                <tbody>
                    <?php while ($rows = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $rows['in_evento']; ?></td>
                            <td><?php echo $rows['evento']; ?></td>
                            <td><?php echo $rows['fecha']; ?></td>
                            <td><?php echo $rows['hora']; ?></td>
                          
                            <td>
                               <input type="button" title="Borrar Evento" href="javascript:;" onclick="aviso('evento_borrar.php?id=<?php echo $rows['in_evento'] ?>'); return false;" name="Borrar" value="Borrar">
                                   
                                <input type="button" title="Editar Evento" href="javascript:;" onclick="aviso('evento_editar.php?id=<?php echo $rows['in_evento'] ?>'); return false;" name="Editar" value="Editar">
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