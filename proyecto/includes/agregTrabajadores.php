<?php
extract($_POST);
include("../dll/config.php");
include("../dll/class_mysqli.php");


$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

//insert, delete, update, listar
$porcentaje = $porcentaje/100;
$salario = $precio_hora * $catidad_horas;
$aportacion_iess = $salario * $porcentaje;
echo $salario;
echo $aportacion_iess;
$sql = "insert into persona values('$cedula','$nombres','$apellidos','$correo','$telefono')";
$miconexion->consulta($sql);
$sql = "insert into trabajador values('$cedula', '$precio_hora','$catidad_horas','$aportacion_iess','$salario', '$areaLaboral_id_areaLaboral')";
$miconexion->consulta($sql);

echo "<script>location.href='trabajadores.php';</script>";
?>
<?php
include("piePagina.php");
?>

