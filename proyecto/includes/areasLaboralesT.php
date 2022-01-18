<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");

    echo '<main class="content">';
    echo '<h2 class ="titulo">Area Laboral</h2>';
    $link = $_SERVER['REQUEST_URI'];

    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';
    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $sql="SELECT id_areaLaboral 'Id', nombre_area 'Nombre Area', total_salario 'Total' FROM arealaboral"; 
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera
   
    $miconexion->consulta($sql);
    $miconexion->verconsultaenlace(); 

    echo '</main>';
    include("piePagina.php");
?>