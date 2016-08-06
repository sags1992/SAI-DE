<?php

include ("./conexion.php");
$con = conectar();
$nombre = $_POST["nombre"];
$password = $_POST["password"];
mysqli_query($con, "INSERT INTO usuario(nombre, password) VALUES('$nombre','$password')");
mysqli_close($con);

header('Location: principal.php');

?>



