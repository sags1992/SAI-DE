<?php

include ("./conexion.php");
$con = conectar();
$id = $_GET["id"];
echo $id;
//
//mysqli_query($con, "DELETE FROM `alumno` WHERE id_alumno = '$id'");
//mysqli_close($con);



$sql = "UPDATE `alumno` SET `borrado`='1' WHERE `id_alumno`=$id";


if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

header('Location: alumno_list_jq.php');

?>



