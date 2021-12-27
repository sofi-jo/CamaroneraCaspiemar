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
		echo "<tr>";
		for ($i = 0; $i < $this->numcampos(); $i++) {
			echo "<td>" . mysqli_fetch_field_direct($this->Consulta_ID, $i)->name . "</td>";
		}
		echo "</tr>";
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i = 0; $i < $this->numcampos(); $i++) {
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "</tr>";
		}
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

	function consultaListaPrueba()
	{
		$row = mysqli_fetch_array($this->Consulta_ID);
		return $row;
	}

/*     function consultaListaPrueba2()	
    {
        echo $this->numregistros();
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i = 0; $i < $this->numregistros(); $i++) {
				$anotherArray[$i] = array(mysqli_fetch_array($this->Consulta_ID));
			}
		}
        echo $anotherArray[0][0];
        return $anotherArray;
	} */

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


 
/* function consultaListaPrueba2()	
{
    //echo $this->numregistros();
    while ($row = mysqli_fetch_array($this->Consulta_ID)) {
        echo $row[1] . "    0000000   ";
    }
} */

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


	//Retorna una lista de la consulta JSON
	function consultaJson()
	{
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			$data[] = $row;	
		}
		//antes esta linea esta dentro del while y no validaba bien el json /// arreglar no hay sentido en la asignacion del data[] row
		echo json_encode(array("inscritos" => $data));
	}

	//Consultya Json // cosas raras el if siempre corre? el while reasigna el mismo valor multiples veces
	function consulta_busqueda_json()
	{
		if ($this->numcampos() > 0) {
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[] = $row;
			}
			$resultData = array('status' => true, 'postData' => $data);
		} else {
			$resultData = array('status' => false, 'message' => 'No hay datos');
		}
		echo json_encode($resultData);
	}
}