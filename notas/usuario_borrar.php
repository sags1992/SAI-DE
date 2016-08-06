<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
echo $id;

mysqli_query($con, "DELETE FROM `usuario` WHERE id_usuario = '$id'");
mysqli_close($con);

header('Location: usuario_list.php');

?>



