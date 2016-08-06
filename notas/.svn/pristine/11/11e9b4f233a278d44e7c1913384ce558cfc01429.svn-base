<?php

include ("./conexion.php");
$con = conectar();
$id_alumno = $_POST["id_alumno"];
$id_materia = $_POST["id_materia"];
mysqli_query($con, "INSERT INTO alumno_materia(id_alumno, id_materia) VALUES('$id_alumno','$id_materia')");
mysqli_close($con);
header('Location: alumno_materia_list.php');
?>







