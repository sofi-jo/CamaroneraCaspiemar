<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];

    echo '<main class="content">';
    echo "<h2 class='titulo'>Gestionar Trabajadores</h2>";
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formuTrabajadores.php">Agregar +</a></div>';


    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $miconexion->consulta("SELECT t.cedula 'Cedula',nombres 'Nombres',apellidos 'Apellidos',telefono 'Telefono',correo 'Correo',
                    catidad_horas 'Horas de Trabajo',salario 'Salario', aportacion_iess 'IESS'
                    FROM persona as p
                    INNER JOIN trabajador t ON t.cedula = p.cedula;");
	$miconexion->verconsulta5();



    echo '</main>';
    include("piePagina.php");

?>
