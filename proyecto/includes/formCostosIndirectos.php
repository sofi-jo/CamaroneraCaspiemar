<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h1>Costo Indirecto</h2>
		
		<form class ="formulario" method="post" action="aggCostosIndirecDb.php">
            <input type="text" name="id" placeholder="Ingresar id costo"><br>
            <input type="text" name="tipo" placeholder="Ingresar tipo costo"><br>
			<input type="submit" value="Agregar">
		</form>
		
	</main>
	

<?php
include("piePagina.php");
?>