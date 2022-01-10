<?php
    include("cabeceraInterna.php");
?>
    <h2 class="titulo">Gestionar Base de Datos</h2>
    <div class="opciones">
        <a href="<?php echo $urlSitio; ?>includes/gestionarBDmateriaPrima.php">Materia Prima</a>
        <a href="<?php echo $urlSitio; ?>includes/trabajadorTemp.php">Mano de Obra</a>
        <a href="<?php echo $urlSitio; ?>includes/costosIndirectos.php">Costos Indirectos</a>
    </div>
        
<?php
    include("piePagina.php");
?>