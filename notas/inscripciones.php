<html>
    <head>

        <?php
        include './head.php';
        ?>


        <script type="text/javascript">
            $(document).ready(function() {
                $("#datepicker").datepicker();
            });
        </script>

    </head>
    <body onload="document.getElementById('nombre').focus()">

        <div class="container">
            <br>
            <br>
            <h1>Inscribir alumno</h1>
            <?php
            include './menu.html';
            ?>
            <br>
            <br>

            <h1 class="main_title">Ingrese la información</h1>
            <div class="content">
                <form  action="inscripciones_guardar.php" method="post">
                    <div class="label_div">Alumno : </div>
                    <div class="input_container">
                        <input type="text" id="country_id" name="alumno" required="" onkeyup="autocomplet()">
                        <ul id="country_list_id"></ul>
                    </div>
                    <br>
                    <br>

                    <div class="label_div">Cursos: </div>
                    <select name="id_curso">
                        <option value="0">Elija un curso...</option>
                        <?php
                        include ("./conexion.php");
                        $con = conectar();
                        $sql = "SELECT id_curso, curso FROM `curso` where borrado != '1' or borrado is null order by curso";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>  
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>


                    <div class="label_div">Niveles: </div>
                    <select name="id_nivel" >
                        <option value="0">Elija nivel...</option>
                        <?php
                        $sql2 = "SELECT id_nivel, nivel FROM `nivel` where borrado != '1' or borrado is null order by nivel";
                        $result2 = mysqli_query($con, $sql2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                            ?>
                            <option value="<?php echo $row2[0] ?>"><?php echo $row2[1] ?></option>  
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <br>


                    <div class="label_div">Fecha : </div>
                    <input required="" type="text" name="fecha" value="" id="datepicker" readonly="readonly" size="12" />
                    <br>
                    <br>

                    <input type="submit" value="Guardar">
                </form>


                <div id="cal1Container"></div>
            </div>   
        </div>
    </body>
</html>






