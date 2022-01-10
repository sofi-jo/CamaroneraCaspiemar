<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");



    echo '<h2 class = "titulo">Gestionar Area Laboral</h2>';
    echo '<main class="content">';
   
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formuAreaLaboral.php">Agregar +</a></div>';

	$miconexion= new clase_mysqli7;
	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$miconexion->consulta("select id_areaLaboral 'Id', nombre_area 'Nombre Area', total_salario 'Total' from arealaboral");
	$miconexion->verconsulta3();

    echo '</main>';
 

    include("piePagina.php");
?>