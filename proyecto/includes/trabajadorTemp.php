<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");



    echo '<h2 class = "titulo">Gestionar Trabajador</h2>';
    echo '<main class="content">';
   
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formuTrabajadorTemp.php">Agregar +</a></div>';

	$miconexion= new clase_mysqli7;
	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$miconexion->consulta("select cedula 'Cedula', tipo 'Tipo', catidad_horas 'Cantidad Horas', apellidos 'Apellidos', nombres 'Nombres', salario 'Salario' from trabajador");
	$miconexion->verconsulta3();

    echo '</main>';
 

    include("piePagina.php");
?>