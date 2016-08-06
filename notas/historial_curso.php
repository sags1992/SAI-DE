
<?php
$id = $paciente = $_GET['id'];

include ("./conexion.php");
$con = conectar();
?>

<html>
    <head>
<?php include './head.php'; ?>

    </head>
    <body onload="document.getElementById('nombre').focus()">

        <!-- Agregamos el menu -->
        <div class="container">
            <br>
            <br>
            <h1>Informe de Calificaciones</h1>

            <?php
            include './menu.html';
            ?>
            <br>
            <br>
            <h1 class="main_title">Elija un curso o nivel</h1>
            <div id="contenedor">
                <form action="reporte_historial.php" method="post" name="formulario">

                    <div class="label_div">Alumno: </div>
                    
                     <?php
                        $sql = "SELECT nombre
                                FROM alumno
                                where id_alumno = '$id'";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo " <input size=40 value= $row[0] >";
                        }
                        ?>
                    
                   
                    
                    <br>
                    <br>
                    <div class="label_div">Cursos: </div>
                    <select name="id_curso">
                        <option value="0">Elija un curso...</option>
                        <?php
                        $sql = "SELECT curso.id_curso, curso.curso
                                FROM inscripcion
                                inner join curso on curso.id_curso = inscripcion.id_curso
                                where id_alumno = '$id'";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = $row[0]>$row[1]</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <br>


                    <div class="label_div">Niveles: </div>
                    <select name="id_nivel" >
                        <option value="0">Elija nivel...</option>
                         <?php
                        $sql = "SELECT
                                    inscripcion.id_nivel, nivel.nivel
                                FROM
                                    inscripcion
                                INNER JOIN
                                    nivel ON nivel.id_nivel = inscripcion.id_nivel
                                WHERE
                                    id_alumno = '$id'";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = $row[0]>$row[1]</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <input type="text" hidden="" name="id" value="<?php echo $id ?>"> 
                    <input type="submit" value="Continuar"> 
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>

