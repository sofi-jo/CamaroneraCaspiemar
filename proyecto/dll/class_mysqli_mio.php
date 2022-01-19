<?php

class clase_mysqli7
{
	//variables de conexion
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	//identificadores de error
	var $Error = "";
	var $Errno = 0;

	//identificadores de consultas
	var $Conexion_ID = 0;
	var $Consulta_ID = 0;

	//no se le encuentra utilidad por el momento

	/*
	public function __construct($host = "", $user = "", $pass = "", $db = "")
	{
		$this->BaseDatos = $db;
		$this->Servidor = $host;
		$this->Usuario = $user;
		$this->Clave = $pass;
	}
*/
	//funcion conect db
	function conectar($host, $user, $pass, $db)
	{
		if ($db != "") $this->BaseDatos = $db;
		if ($host != "") $this->Servidor = $host;
		if ($user != "") $this->Usuario = $user;
		if ($pass != "") $this->Clave = $pass;


		//no hay forma de controlarlo hasta ahora, sale error directo en produccion
		$this->Conexion_ID = new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if (!$this->Conexion_ID) {
			$this->Error = "Hay problemas en la conexion al servidor";
			return 0;
		}
		return $this->Conexion_ID;
	}

	//funcion de ejecutar un sql
	//se inicializa la variable para poder controlar la excepcion
	function consulta($sql = "")
	{
		if ($sql == "") {
			$this->Error = "No hay senetencia SQL";
			return 0;
		}
		$this->Consulta_ID = mysqli_query($this->Conexion_ID, $sql);
		if (!$this->Consulta_ID) {
			echo $this->Conexion_ID->error;
		}
		return $this->Consulta_ID;
	}

	//retorna el numero de campos de la consulta
	function numcampos()
	{
		return mysqli_num_fields($this->Consulta_ID);
	}

	//retorna los campos de la consulta
	function numregistros()
	{
		return mysqli_num_rows($this->Consulta_ID);
	}

	//presenta la tabla de la consulta
	function verconsulta()
	{
		echo "<table border=1 class = 'tabla'>";
		echo '<thead>';
		echo "<tr>";
		for ($i = 0; $i < $this->numcampos(); $i++) {
			echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
		}
		echo "</tr>";
		echo '</thead>';
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i = 0; $i < $this->numcampos(); $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultaenlace(){
		echo <<< EOT
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
		EOT;
		echo "<table id ='tabla'class='display' style='width:100%'>";
		echo "<thead>";
		echo "<tr>";
		for ($i = 1; $i < $this->numcampos(); $i++) {
			echo "<th>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</th>";
		}
		echo "<th>Editar</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i = 1; $i < $this->numcampos(); $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "<td><a href='crudCosechas.php?idRegistro=$row[0]'>Visualizar</a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}



	//Retorna una lista de la consulta - 1 fila
	function consultaLista()
	{
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i = 0; $i < $this->numcampos(); $i++) {
				$row[$i];
			}
			return $row;
		}
	}


	function consultaListaGaa()
	{
		$anotherrow = array();
		while ($row = mysqli_fetch_array($this->Consulta_ID, MYSQLI_NUM)) {
			array_push($anotherrow, $row[0]);
		}
		return $anotherrow;
	}


	function consultaListaPrueba()
	{
		$row = mysqli_fetch_array($this->Consulta_ID);
		return $row;
	}

	function consultaListaPruebaGaa()
	{
		$row =  mysqli_fetch_assoc($this->Consulta_ID);
		return $row;
	}


	function consultaListaPrueba2()
	{
		//echo $this->numregistros();
		for ($i = 0; $i < $this->numregistros(); $i++) {
			$row = mysqli_fetch_array($this->Consulta_ID);
			$anotherArray[$i] = array($row[0], $row[1]);
		}
		return $anotherArray;
	}

	function consultaLista3()
	{
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i = 0; $i < $this->numcampos(); $i++) {
				$row[$i];
			}
			return $row;
		}
	}

	//presenta la tabla de la consulta con el CRUD
	function verconsulta2()
	{
		echo "<table border=1>";
		echo "<tr>";
		for ($i = 0; $i < $this->numcampos(); $i++) {
			echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
		}
		echo "<td>Actualizar</td>";
		echo "<td>Borrar</td>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i = 0; $i < $this->numcampos(); $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "<td><a href='actualizarRegistro.php?idRegistro=$row[0]'>Actualizar</a></td>";
			echo "<td><a href='borrarRegistro.php?idRegistro=$row[0]'>Borrar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsulta3()
	{
		echo <<< EOT
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
		
		EOT;

		echo "<table id='tabla' class='display' style='width:100%'>";
		echo "<thead>";
		echo "<tr>";
		for ($i = 1; $i < $this->numcampos(); $i++) {
			echo "<th>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</th>";
		}
		echo "<th>Editar</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i = 1; $i < $this->numcampos(); $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			$link = $_SERVER['REQUEST_URI'];
			
			echo <<< EOT
			<td>
				<form action="editarDatos.php">
					<select name="tipoEdit" onchange="location = this.value;">
						<option>...</option>
						<option value = "editarDatos.php?urlFrom=$link&tipoEdit=Actualizar&idRegistro=$row[0]">Actualizar</option>
						<option value = "editarDatos.php?urlFrom=$link&tipoEdit=Eliminar&idRegistro=$row[0]">Eliminar</option>
					</select>
				</form>
			</td>
			</tr>
			echo "</tbody>";
			EOT;
		}
		echo "</tbody>";
		echo "</table>";
	}


	function consultaListaMateriaPrima()
	{
		echo <<< EOT
		<input type="search" id="inputlist" name="busquedacostoIndirecto" placeholder = "Materia Prima" list="listamodelos"><br>
		<datalist id="listamodelos">
		EOT;

		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<option value='$row[1]' oldvalue='$row[0]'>";
		}
		echo '</datalist>';
	}

	function consultaListaCostosIndirectos()
	{
		echo <<< EOT
		<input type="search" name="busquedacostoIndirecto" placeholder = "Materia Prima" list="listamodelos"><br>
		<datalist id="listamodelos">
		EOT;

		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo '<option value=' . $row[0] . ">";
		}
		echo '</datalist>';
	}
}
