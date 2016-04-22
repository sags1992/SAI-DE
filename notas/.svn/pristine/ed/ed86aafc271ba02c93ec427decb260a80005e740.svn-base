<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];

$sql =          "UPDATE `inscripcion` SET `borrado`='1' WHERE `id_inscripcion` = $id";
$sql_materia =  "UPDATE `alumno_materia` SET `borrado`='1' WHERE `id_inscripcion` = $id";
$sql_unidades = "UPDATE `alumno_unidades` SET `borrado`='1' WHERE `id_inscripcion` = $id";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

if ($con->query($sql_materia) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

if ($con->query($sql_unidades) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

header('Location: inscripciones_list_dt.php');

?>



