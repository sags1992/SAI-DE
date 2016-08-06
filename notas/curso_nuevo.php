 

<html>
    <head>
        <?php include './head.php'; ?>


        <!-- validacion de campos por javaScript -->
        <script language="JavaScript">
            function formulariodecontacto() {
                if (document.formulario.nombre.value == "") {
                    alert("Por favor ingresa tu Nombre.");
                    document.formulario.nombre.select();
                    return false;
                }
                if (document.formulario.direccion.value == "") {
                    alert("Por favor ingresa tu Direccion.");
                    document.formulario.direccion.select();
                    return false;
                }

                return true;
            }
            function revisar_correo(str) {
                var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (filter.test(str)) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body onload="document.getElementById('nombre').focus()">
        <div class="container">
            <br>
            <br>

            <h1>Ingrese el Curso</h1>
            <!-- Agregamos el menu -->
            <?php
            include './menu.html';
            ?>
            <br>
            <br>

            <h1 class="main_title">Ingrese la información</h1>
            <div id="contenedor">
                <form action="curso_guardar.php" method="post" name="formulario">

                    Nombre:     <input name="curso" type="text" class="campo" id="curso" size="80" required="" placeholder="Escriba el curso..."/> 
                    <br>
                    <br>
                    <input type="submit" value="Guardar" />

                </form>
            </div>
        </div>
    </body>
</html>

