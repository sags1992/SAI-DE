<?php

include ("./conexion.php");
$con = conectar();
$in_evento = $_POST["in_evento"];
$evento= $_POST["evento"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$sql = "UPDATE `evento` SET `evento`='$evento',`fecha`='$fecha',`hora`='$hora' WHERE `in_evento`=$in_evento";


if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
//
//mysqli_query($con, $sql);
//mysqli_close($con);

header('Location: eventos_dt.php');

?>




