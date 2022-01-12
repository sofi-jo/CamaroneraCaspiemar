<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h1>Trabajadores</h2>
		
		<form class ="formulario" method="post" action="agregTrabajadorTemp.php">
         
			<input type="text" name="cedula" placeholder="Ingresar Cedula"><br>
			<input type="text" name="tipo" placeholder="Ingresar Tipo Oficio"><br>
			<input type="text" name="catidad_horas" placeholder="Ingresar Horas"><br>
			<input type="text" name="telefono" placeholder="Ingresar Telefono"><br>
			<input type="text" name="correo" placeholder="Ingresar correo"><br>
            <input type="text" name="apellidos" placeholder="Ingresar Apellidos"><br>
            <input type="text" name="nombres" placeholder="Ingresar Nombres"><br>
			<input type="text" name="areaLaboral_id_areaLaboral" placeholder="Ingresar id del area laboral"><br>
			<input type="submit" value="Agregar">

		</form>
		
	</main>
	
<?php
include("piePagina.php");
?>