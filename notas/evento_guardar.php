<?php

include ("./conexion.php");
$con = conectar();
$evento = $_POST["evento"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

mysqli_query($con, "INSERT INTO evento(evento, fecha, hora) VALUES('$evento','$fecha','$hora')");
mysqli_close($con);

header('Location: eventos_dt.php');

?>



