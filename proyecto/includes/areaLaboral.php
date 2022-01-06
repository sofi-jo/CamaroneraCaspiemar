<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");

    echo '<h2 class = "titulo">Gestionar Area Laboral</h2>';
    echo '<main class="content">';
    
		$miconexion= new clase_mysqli7;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
		$miconexion->consulta("select idAreaLaboral, tipo from areaLaboral");
		$miconexion->verconsulta3();
	

    <a href="<?php echo $urlSitio; ?>includes/formuAreaLaboral.php">agregar</a>


    echo '</main>';
 

    include("piePagina.php");
?>