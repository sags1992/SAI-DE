
<?php
$ok = null;
session_start();
if ($_SESSION['last_access'] == "1") {
    $ok = 1;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        
        <?php
        include './head.php';
        ?>
        
    </head>
    <body>
        <?php
        if ($ok == 1) {
            ?>
            <div  class = "container">
            
                <br>
                <br>
                <h1>SAI-DE</h1>
                <?php include './menu_alumno.html'; ?>
                <br>
                </br>
                <img src="images/banner.png" width="1240" height="400" alt=""></img>
            </div>
            <?php
        } else {
            header('Location: index.php');
        }
        ?>
    </body>
</html>