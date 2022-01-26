<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];
    extract($_GET) ;

    echo '<main class="content">';

    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    echo "<h2 class='titulo'>Trabajadores Temporales</h2>";
    if ($fase == 1){
        $sql =" SELECT ro.id_registro_mano_obre,t.cedula'Cedula', p.nombres'Nombres',p.apellidos'Apellidos',t.precio_hora'Precio por Hora',
        r.horas_trabajadas'Horas Trabajadas',r.pago'Total'
        FROM registro_mano_obra ro
        INNER JOIN registro_mano_obra_trabajador_temp r ON r.registro_mano_obra_id_registro_mano_obre = ro.id_registro_mano_obre
        INNER JOIN trabajador_temp t ON t.cedula = r.trabajador_temp_cedula
        INNER JOIN persona p ON p.cedula = t.cedula
        WHERE ( ro.fase_idFase % 2 ) != 0;";
        $miconexion->consulta($sql);
        $miconexion->verconsulta3(); 
    }elseif($fase == 2){
        $sql =" SELECT ro.id_registro_mano_obre,t.cedula'Cedula', p.nombres'Nombres',p.apellidos'Apellidos',t.precio_hora'Precio por Hora',
        r.horas_trabajadas'Horas Trabajadas',r.pago'Total'
        FROM registro_mano_obra ro
        INNER JOIN registro_mano_obra_trabajador_temp r ON r.registro_mano_obra_id_registro_mano_obre = ro.id_registro_mano_obre
        INNER JOIN trabajador_temp t ON t.cedula = r.trabajador_temp_cedula
        INNER JOIN persona p ON p.cedula = t.cedula
        WHERE ( ro.fase_idFase % 2 ) = 0;";
        $miconexion->consulta($sql);
        $miconexion->verconsulta3(); 
    }

    echo '</main>';
    include("piePagina.php");

?>1