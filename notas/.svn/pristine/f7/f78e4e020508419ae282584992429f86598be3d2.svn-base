<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];

$sql = "UPDATE `curso` SET `borrado`='1' WHERE `id_curso`=$id";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

header('Location: curso_list_dt.php');

?>



