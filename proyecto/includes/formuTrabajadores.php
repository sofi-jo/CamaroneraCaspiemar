<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h2 class= "titulo">Agregar Trabajador</h2>
		
		<form class ="formulario" method="post" action="agregTrabajadores.php" autocomplete="off">
         
            <input type="text" name="nombres" placeholder="Ingresar Nombres"><br>
            <input type="text" name="apellidos" placeholder="Ingresar Apellidos"><br>
			<input type="text" name="cedula" placeholder="Ingresar Cedula"><br>
			<input type="text" name="catidad_horas" placeholder="Ingresar Horas a trabajar"><br>
			<input type="text" name="precio_hora" placeholder="Ingresar Precio por Hora"><br>
			<input type="text" name="porcentaje" placeholder="Ingresar Porcentaje de aportacion al IESS"><br>
			<input type="text" name="telefono" placeholder="Ingresar Telefono"><br>
			<input type="mail" name="correo" placeholder="Ingresar correo"><br>
			<input type="text" name="areaLaboral_id_areaLaboral" placeholder="Ingresar id del area laboral"><br>
			<input type="submit" value="Agregar">
		</form>
		
	</main>
	
<?php
include("piePagina.php");
?>