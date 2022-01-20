<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: login.php");
}else{
    header("location: includes/cosechas.php")
    ?>
   <?php
}
?>
