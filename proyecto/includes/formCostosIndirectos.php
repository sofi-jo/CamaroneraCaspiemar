<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h2 class ="titulo">Costo Indirecto</h2>
		
		<form class ="formulario" method="post" action="aggCostosIndirecDb.php">
            <input type="text" name="nombre" placeholder="Ingresar nombre costo"><br>
            <input type="text" name="tipo" placeholder="Ingresar tipo costo"><br>
			<input type="submit" value="Agregar">
			<a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/costosIndirectos.php'>Cancelar</a>
		</form>
		
	</main>
	

<?php
include("piePagina.php");
?>