<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];
    extract($_GET) ;

    echo '<main class="content">';
    echo "<h2 class='titulo'>Materia Prima</h2>";
    echo '<label id="texto_nav1"></label>';

    echo <<< EOT
    '<script>
    var url = document.referrer;;
    var objetivo = document.getElementById('texto_nav1');
    objetivo.innerHTML = url;
    </script>'
    EOT;


    echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    //$sql = "";

    if ($fase == 1){
        $sql = "SELECT idregistroCostosIndirectos, fecha'Fecha', Fase_idFase'Fase', totalCostoIndirecto'Total' FROM registrocostosindirectos WHERE Fase_idFase = 1";
    }elseif($fase == 2){
        $sql = "SELECT idregistroCostosIndirectos, fecha'Fecha', Fase_idFase'Fase', totalCostoIndirecto'Total' FROM registrocostosindirectos WHERE Fase_idFase = 2";
    }
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera

    $miconexion->consulta($sql);
    $miconexion->verconsulta3(); 


    echo '</main>';
    include("piePagina.php");

?>
