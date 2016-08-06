
<?php
$ok = null;
session_start();
if ($_SESSION['last_access'] == "1") {
    $ok = 1;
}


//HEADER
include './head.php';
if ($ok == 1) {
    ?>
    <div  class = "container">
        <br>
        <br>
        <h1>SAI-DE</h1>
        <?php include './menu.html'; ?>
        <br>
        </br>
        <img src="images/banner.png" width="1240" height="300" alt=""></img>
    </div>
    <?php
} else {
    header('Location: index.php');
}

//Footer
include './foter.php';
?>
