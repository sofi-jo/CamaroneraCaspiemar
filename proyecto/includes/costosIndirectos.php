<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli.php");


    echo '<main class="content">';

	$miconexion= new clase_mysqli7;
	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$miconexion->consulta("select idcostosIndirectos, nombre, tipo from costosindirectos");
	$miconexion->verconsulta3();
	

    echo '<a href="<?php echo $urlSitio; ?>includes/formCostosIndirectos.php">agregar</a>';

    echo '</main>';
 

    include("piePagina.php");
?>