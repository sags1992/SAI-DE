<?php

include ("./conexion.php");
$con = conectar();
$id = $_POST["id_usuario"];
$nombre = $_POST["nombre"];
$password = $_POST["password"];



$sql = "UPDATE `usuario` SET `nombre`='$nombre',`password`='$password' WHERE `id_usuario`=$id";


if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
//
//mysqli_query($con, $sql);
//mysqli_close($con);

header('Location: usuario_list.php');

?>




