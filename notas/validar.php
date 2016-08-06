<?php

include ("./conexion.php");
$con = conectar();
$nombre = $_POST["usuario"];
$password = $_POST["password"];

$si = 0;

$sql = "SELECT * FROM `usuario` where nombre = '$nombre' and password = '$password'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $si = 1;

    session_start();

    $_SESSION['last_access'] = "1";

    $location = 'Location: principal.php';
}

$sql2 = "SELECT * FROM `alumno` where ci = '$nombre' and password = '$password'";
$result2 = mysqli_query($con, $sql2);
while ($row2 = mysqli_fetch_array($result2)) {
    $si = 1;

    session_start();
    $_SESSION['last_access'] = "1";
    $_SESSION['id_alumno'] = $row2[0];
    
    $location = 'Location: alumnos.php';
}


if ($si == 1) {
    header($location);
} else {
    header('Location: error.php?cod=2');
}
?>


