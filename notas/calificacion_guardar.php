<?php

include ("./conexion.php");
$con = conectar();
$id_alumno_materia = $_POST["id_alumno_materia"];
$calificacion = $_POST["calificacion"];
$tipo = $_POST["tipo"];
$ida = $_POST["ida"];

if ($tipo == 1) {
    
    echo 'Entro ';

    $sql = "UPDATE `alumno_materia` SET `calificacion`='$calificacion' WHERE `id_alumno_materia`= '$id_alumno_materia'";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

if ($tipo == 2) {

    $sql = "UPDATE `alumno_unidades` SET `calificacion`='$calificacion' WHERE `id_alumno_unidad`= '$id_alumno_materia'";
    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

header('Location: calificaciones_list.php?id='.$ida);
?>



