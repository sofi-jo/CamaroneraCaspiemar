<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");



    echo '<h2 class = "titulo">Gestionar Costos Indirectos</h2>';
    echo '<main class="content">';
    /*
    echo '<div class = "agregar"><a href="<?php echo $urlSitio;?>includes/formCostosIndirectos.php">Agregar +</a></div>';
    */
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formCostosIndirectos.php">Agregar +</a></div>';

	$miconexion= new clase_mysqli7;
	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$miconexion->consulta("select idcostosIndirectos 'Id', nombre'Nombre', tipo'Tipo' from costosindirectos");
	$miconexion->verconsulta3();

    echo '</main>';
 

    include("piePagina.php");
?>