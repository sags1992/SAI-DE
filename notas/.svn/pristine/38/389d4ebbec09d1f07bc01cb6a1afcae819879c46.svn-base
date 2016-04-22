<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
echo $id;

mysqli_query($con, "DELETE FROM `evento` WHERE in_evento = '$id'");
mysqli_close($con);

header('Location: eventos_dt.php');

?>



