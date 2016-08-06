<?php
include ("./conexion.php");


$con = conectar();
$sql = "SELECT nombre, password, id_usuario FROM `usuario`";
$result = mysqli_query($con, $sql);
include ("./head.php");
?>
<!DOCTYPE html>
<html>
            <script language="JavaScript">
            function aviso(url) {
                if (!confirm("ALERTA!! esta seguro de continuar?")) {
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
          
            <Br>
            <Br>
            <br>
        
  <a href="usuario_nuevo.php"> Agregar Usuario </a>
      <br>
          

            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

                <thead>
                <tr>
                    <th>Codigo Usuario</th>  
                    <th>Nombre</th>
                    <th>Contraseña </th>
                    <th>Opciones</th>
                 

                </tr>
                </thead>

                <tbody>
                    <?php while ($rows = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $rows['id_usuario']; ?></td>
                            <td><?php echo $rows['nombre']; ?></td>
                            <td><?php echo $rows['password']; ?></td>
                           
                           <td>
                               <input type="button" title="Borrar Usuario" href="javascript:;" onclick="aviso('usuario_borrar.php?id=<?php echo $rows['id_usuario'] ?>'); return false;" name="Borrar" value="Borrar">
                               <input type="button" title="Editar Usuario" href="javascript:;" onclick="aviso('usuario_editar.php?id=<?php echo $rows['id_usuario'] ?>'); return false;" name="Editar" value="Editar">
                             
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