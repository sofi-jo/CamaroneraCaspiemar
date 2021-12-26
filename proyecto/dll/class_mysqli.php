<?php 

class clase_mysqli7{
	//variables de conexion
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	//identificadores de error
	var $Error="";
	var $Errno=0;

	//identificadores de consultas
	var $Conexion_ID=0;
	var $Consulta_ID=0;

	var $num =0;

	public function __construct($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

	//funcion conect db
	function conectar($host, $user, $pass, $db){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;

		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if(!$this->Conexion_ID){
			$thisyear->Error="Hay problemas en la conexion al servidor";
			return 0;
		}
		return $this->Conexion_ID;
	}

	//funcion de ejecutar un sql
	function consulta($sql=""){
		if ($sql=="") {
			$this->Error="No hay senetencia SQL";
			return 0;
		}
		$this->Consulta_ID=mysqli_query($this->Conexion_ID, $sql);
		if (!$this->Consulta_ID) {
			echo $this->Conexion_ID->error; 
		}
		return $this->Consulta_ID;
	}

	//retorna el numero de campos de la consulta
	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}

	//retorna los campos de la consulta
	function numregistros(){
		$num = mysqli_num_rows($this->$num);
		return mysqli_num_rows($this->Consulta_ID);
	}

	//presenta la tabla de la consulta
	function verconsulta(){
		echo "<table border=1>";
		echo "<tr>";
		for($i=0;$i<$this->numcampos(); $i++){
			echo "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

	}

	//Retorna una lista de la consulta
	function consultaLista(){
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
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

?>