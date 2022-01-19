<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
?>
    <main class="content">
		<h2 class ="titulo">Generar Reporte</h2>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
              $( "#campofechainicio" ).datepicker({
                numberOfMonths: 1,
              });
              $( "#campofechafin" ).datepicker({
                numberOfMonths: 1,
              });
          
              $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
              $( "#campofechafin" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
            });
        </script>
		<form class ="formulario_reporte" method="post" action="aggCostosIndirecDb.php">
            <label for="fecha_inicio">Fecha Inicio: </label>
            <input type="select" id="campofechainicio" name="fecha_inicio" placeholder="" ><br>
            <label for="fecha_fin">Fecha Fin: </label>
            <input type="select" id="campofechafin" name="fecha_fin"><br>
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