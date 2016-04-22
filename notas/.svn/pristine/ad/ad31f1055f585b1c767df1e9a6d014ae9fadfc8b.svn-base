<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];


$sql = "UPDATE `nivel` SET `borrado`='1' WHERE `id_nivel`=$id";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

header('Location: nivel_list_dt.php');

?>



