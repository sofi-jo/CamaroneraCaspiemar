<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: login.php");
}else{
    header("location: includes/cosechas.php")
    ?>
    <div id="Bienvenido">
        <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
        <p><a href="logout.php">Finalice</a> sesión aquí</p>
    </div>
   <?php
}
?>
