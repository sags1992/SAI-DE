<?php

include ("./conexion.php");
$con = conectar();
$nombre = $_POST["curso"];
mysqli_query($con, "INSERT INTO curso(curso) VALUES('$nombre')");
mysqli_close($con);

header('Location: curso_list_dt.php');

?>



