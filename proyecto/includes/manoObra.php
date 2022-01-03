<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli.php");
?>

    <?php 
		$miconexion= new clase_mysqli7;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
		$miconexion->consulta("select idManoObra, tipo from manoObra");
		$miconexion->verconsulta3();
	?>

    <a href="<?php echo $urlSitio; ?>includes/formuManObra.php">agregar</a>
 
<?php
    include("piePagina.php");
?>