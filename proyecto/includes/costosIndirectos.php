<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli.php");
?>

    <?php 
		$miconexion= new clase_mysqli7;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
		$miconexion->consulta("select idcostosIndirectos, tipo from costosindirectos");
		$miconexion->verconsulta3();
	?>

    <a href="<?php echo $urlSitio; ?>includes/formCostosIndirectos.php">agregar</a>
 
<?php
    include("piePagina.php");
?>