<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: login.php");
}else{
    include("includes/cabecera.php"); ?>
    <div id="Bienvenido">
        <h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
        <p><a href="logout.php">Finalice</a> sesión aquí</p>
    </div>
   <?php
}
    include("includes/cosechas.php"); 
?>

<!-- 
    <?php
    

  echo '<main class="content">';
    echo '<h2 class ="titulo">Cosechas</h2>';
    $link = $_SERVER['REQUEST_URI'];

    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';
    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $sql="SELECT idcosecha,fecha 'Fecha de Inicio', fechaFin'Fecha Final', peso'Peso Actual' FROM cosecha"; 
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera
   
    $miconexion->consulta($sql);
    $miconexion->verconsultaenlace(); 

    echo '</main>';
    include("includes/piePagina.php");
?>
*/ -->