<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");



    echo '<main class="content">';
    echo '<h2 class = "titulo">Gestionar Trabajador</h2>';
   
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formuTrabajadorTemp.php">Agregar +</a></div>';

	$miconexion= new clase_mysqli7;
	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$miconexion->consulta("SELECT t.cedula 'Cedula',nombres 'Nombres',apellidos 'Apellidos',telefono 'Telefono',
                            correo 'Correo',precio_hora 'Precio por Hora'
                            FROM persona as p
                            INNER JOIN trabajador_temp t ON t.cedula = p.cedula;");
	$miconexion->verconsulta5();

    echo '</main>';
 

    include("piePagina.php");
?>