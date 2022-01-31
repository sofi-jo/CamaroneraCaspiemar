<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];
    extract($_GET) ;

    echo '<main class="content">';
    echo "<h2 class='titulo'>Costos Indirectos</h2>";

    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 

    if ($fase == 1){
        $sql ="SELECT rc.idregistroCostosIndirectos, r.fecha'Fecha',c.nombre'Nombre' , r.totalCostoIndirecto'Total'
        FROM registrocostosindirectos rc
        INNER JOIN registrocostosindirectos_costosindirectos r ON r.registroCostosIndirectos_idregistroCostosIndirectos = rc.idregistroCostosIndirectos
        INNER JOIN costosindirectos c ON c.idcostosIndirectos = r.costosIndirectos_idcostosIndirectos
        WHERE ( rc.Fase_idFase % 2 ) != 0;";
    }elseif($fase == 2){
        $sql = "SELECT rc.idregistroCostosIndirectos, r.fecha'Fecha',c.nombre 'Nombre',  r.totalCostoIndirecto'Total'
        FROM registrocostosindirectos rc
        INNER JOIN registrocostosindirectos_costosindirectos r ON r.registroCostosIndirectos_idregistroCostosIndirectos = rc.idregistroCostosIndirectos
        INNER JOIN costosindirectos c ON c.idcostosIndirectos = r.costosIndirectos_idcostosIndirectos
        WHERE ( rc.Fase_idFase % 2 ) = 0;";
    }
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera

    $miconexion->consulta($sql);
    $miconexion->verconsulta3(); 
    

    echo '</main>';
    include("piePagina.php");

?>
