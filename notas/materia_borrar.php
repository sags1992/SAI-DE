<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];

$sql = "UPDATE `materia` SET `borrado`='1' WHERE `id_materia`=$id";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

header('Location: materia_list.php');
?>



