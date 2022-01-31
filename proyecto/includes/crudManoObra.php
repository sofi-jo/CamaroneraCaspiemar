<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
    $link = $_SERVER['REQUEST_URI'];
    extract($_GET);
    echo '<script> prevUrl = document.referrer; </script>';

    echo <<< EOT
    <div class="dashboard">
    <script> prevUrl = document.referrer; </script>
    <h2 class="titulo">Seleccion de Mano de Obra</h2>
    EOT;

    if ($fase == 1){
        echo <<< EOT
        <div class="opciones">
            <a href="areaLaboralCosecha.php?fase=1&idCosecha=$idCosecha">Areas Laborales</a>
            <a href="trabajadorTempCosecha.php?fase=1&idCosecha=$idCosecha">Trabajadores Externos</a>
        </div>
        EOT;
    }elseif($fase == 2){
        echo <<< EOT
        <div class="opciones">
            <a href="areaLaboralCosecha.php?fase=2&idCosecha=$idCosecha">Areas Laborales</a>
            <a href="trabajadorTempCosecha.php?fase=2&idCosecha=$idCosecha">Trabajadores Externos</a>
        </div>
        EOT;
    }
        
    echo '</div>';

    include("piePagina.php");
?>