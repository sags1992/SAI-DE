<?php

include ("./conexion.php");
$con = conectar();
$nombre = $_POST["materia"];
$id_curso = $_POST["id_curso"];
mysqli_query($con, "INSERT INTO materia(nombre, id_curso) VALUES('$nombre','$id_curso')");
mysqli_close($con);

header('Location: materia_list_dt.php');

?>



