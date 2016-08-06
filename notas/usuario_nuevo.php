<html>
    <head>
        <?php include './head.php'; ?>
    </head>
    <body onload="document.getElementById('usuario').focus()">

        <!-- Agregamos el menu -->
        <div class="container">

            <br>
            <br>
            <h1>Agregar Nuevo usuario</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <h1 class="main_title">Ingrese la informacion</h1>
            <div id="contenedor">
                <form action="usuario_guardar.php" method="post" name="formulario">

                    <div class="label_div">Usuario: </div>

                    <input name="nombre" type="text" class="campo" id="nombre" size="80" required="" placeholder=""/> 
                    <br>
                    <br>
                    <div class="label_div">Password: </div>
                    <input type="password"  class="campo" name="password" id="password" size="80" required="">
                    <br>
                    <br>
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

