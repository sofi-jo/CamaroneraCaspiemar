<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
?>
    <main class="content">
		<h2 class ="titulo">Generar Reporte</h2>
		
		<form class ="formulario_reporte" method="post" action="aggCostosIndirecDb.php">
            <label for="fecha_inicio">Fecha Inicio: </label>
            <input type="select" name="fecha_inicio" placeholder="" ><br>
            <label for="fecha_fin">Fecha Fin: </label>
            <input type="select" name="fecha_fin"><br>
            <label for="filtrar">Filtrar por: </label>
            <!-- <input type="select" name="filtrar"><br> -->
            <select  classs="filtro" name="select">
                <option value="value1">Todos</option>
                <option value="value2" selected>Materia Prima</option>
                <option value="value3">Costos Indirectos</option>
            </select><br>
			<input type="submit" value="BUSCAR">
		</form>
		
	</main>
<?php
    echo '</main>';
    include("piePagina.php");
?>