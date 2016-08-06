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

        <!-- Agregamos el menu -->
        <div class="container">


            <br>
            <br>
        <h1>SAI-DE</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <h1 class="main_title">Ingrese la informacion</h1>
            <div id="contenedor">
                <form action="alumno_guardar.php" method="post" name="formulario">

                    <div class="label_div">Nombre: </div>

                    <input name="nombre" type="text" class="campo" id="nombre" size="80" required="" placeholder="Escriba el nombre..."/> 
                    <br>
                    <br>
                    <div class="label_div">Direccion: </div>
                    <input type="text"  class="campo" name="direccion" id="direccion" size="80" required="" placeholder="Escriba una direccion...">
                    <br>
                    <br>
                    <div class="label_div">Telefono: </div>
                    <input type="number"  class="campo" name="telefono" id="telefono" required="" placeholder="Numero de telefono..." >
                    <br>
                    <br>
                    <div class="label_div">CI: </div>
                    <input type="text"  class="campo" name="ci" id="ci" size="80" required="" placeholder="Escriba su numero de Cedula de Identidad...">
                    <br>
                    <br>
                    <div class="label_div">Password: </div>
                    <input type="password"  class="campo" name="password" required="" id="password" size="80" placeholder="Escriba un password para ingresar al sistema...">
                    <br>
                    <br>
                    <input type="submit" value="Guardar" />
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>

