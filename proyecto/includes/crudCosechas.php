<?php
    include("cabeceraInterna.php");
?>
    <div class="dashboard">
    <script> prevUrl = document.referrer; </script>

        <h2 class="titulo">Dashboard</h2>
        <h3 class="titulo3">Fase 1: Pre-Cria</h3>
        <div class="opciones">
            <a href="<?php echo $urlSitio; ?>includes/materiaPrimaCosecha.php?fase=1">Materia Prima</a>
            <a href="<?php echo $urlSitio; ?>includes/trabajadores.php">Mano de Obra</a>
            <a href="<?php echo $urlSitio; ?>includes/registroCostoIndirecto.php?fase=1">Costos Indirectos</a>
        </div>
        <h3 class="titulo3">Fase 2: Engorde</h3>
        <div class="opciones">
            <a href="<?php echo $urlSitio; ?>includes/materiaPrimaCosecha.php?fase=2">Materia Prima</a>
            <a href="<?php echo $urlSitio; ?>includes/trabajadores.php">Mano de Obra</a>
            <a href="<?php echo $urlSitio; ?>includes/registroCostoIndirecto.php?fase=2">Costos Indirectos</a>
        </div>
    </div>
<?php
    include("piePagina.php");
?>