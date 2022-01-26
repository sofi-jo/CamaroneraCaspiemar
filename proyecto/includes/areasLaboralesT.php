<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");

    echo '<main class="content">';
    echo '<h2 class ="titulo">Area Laboral</h2>';
    $link = $_SERVER['REQUEST_URI'];
    echo '<div class = "agregar"><a href="' . $urlSitio . 'includes/formuAreaLaboral.php">Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $sql="SELECT id_areaLaboral 'Id', nombre_area 'Nombre Area', total_salario 'Salario' FROM arealaboral"; 

    $miconexion->consulta($sql);
    $miconexion->verconsultaenlace1(); 
    

    echo '</main>';
    include("piePagina.php");
?>