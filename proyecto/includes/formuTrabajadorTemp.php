<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h1>Trabajadores Temporales</h2>
		
		<form class ="formulario" method="post" action="agregTrabajadorTemp.php">
            //Trabajador temporal
            <input type="text" name="apellidos" placeholder="Ingresar Apellidos"><br>
            <input type="text" name="nombres" placeholder="Ingresar Nombres"><br>
            <input type="text" name="oficio" placeholder="Ingresar Oficio"><br>
            <input type="text" name="horasTrabajadas" placeholder="Ingresar Horas Trabajadas"><br>
			<input type="submit" value="Agregar">

		</form>
		
	</main>
	
<?php
include("piePagina.php");
?>