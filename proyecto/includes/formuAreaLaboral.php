<?php
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");
?>

	<main class="content">

		<h2 class="titulo">Area Laboral</h2>
		
		<form class ="formulario" method="post" action="agregAreaLaboral.php" autocomplete="off">
      
            <input type="text" name="arealaboral" placeholder="Ingresar Area laboral"><br>
			<input type="submit" value="Agregar">
		</form>
		
	</main>
	

<?php
include("piePagina.php");
?>