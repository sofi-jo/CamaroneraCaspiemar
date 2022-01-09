<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];

    echo '<main class="content">';
    echo "<h2 class='titulo'>Trabajadores</h2>";
    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $sql="SELECT * FROM `trabajador`"; 
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera

    $miconexion->consulta($sql);
    $miconexion->verconsulta3(); 


    echo '</main>';
    include("piePagina.php");

?>
