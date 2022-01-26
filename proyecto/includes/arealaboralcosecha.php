<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];
    extract($_GET) ;

    echo '<main class="content">';

    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    echo "<h2 class='titulo'>Areas Laborales</h2>";


    if ($fase == 1){
        $sql =" SELECT ro.id_registro_mano_obre, r.fecha'Fecha', a.nombre_area'Nombre', a.total_salario'A pagar'
        FROM registro_mano_obra ro
        INNER JOIN registro_mano_obra_arealaboral r ON r.registro_mano_obre_id_registro_mano_obre = ro.id_registro_mano_obre
        INNER JOIN arealaboral a ON a.id_areaLaboral = r.areaLaboral_id_areaLaboral
        WHERE ( ro.fase_idFase % 2 ) != 0;";
        $miconexion->consulta($sql);
        $miconexion->verconsulta3(); 
    }elseif($fase == 2){
        $sql = " SELECT ro.id_registro_mano_obre, r.fecha'Fecha', a.nombre_area'Nombre', a.total_salario'A pagar'
        FROM registro_mano_obra ro
        INNER JOIN registro_mano_obra_arealaboral r ON r.registro_mano_obre_id_registro_mano_obre = ro.id_registro_mano_obre
        INNER JOIN arealaboral a ON a.id_areaLaboral = r.areaLaboral_id_areaLaboral
        WHERE ( ro.fase_idFase % 2 ) = 0;";
        $miconexion->consulta($sql);
        $miconexion->verconsulta3(); 
    }

    echo '</main>';
    include("piePagina.php");

?>
