<?php
extract($_POST);
include("../dll/config.php");
include("../dll/class_mysqli.php");


$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


$sql = "insert into persona values('$cedula','$nombres','$apellidos','$correo','$telefono')";
$miconexion->consulta($sql);
$sql = "insert into trabajador_temp values('$cedula', '$precio_hora')";
$miconexion->consulta($sql);

echo "<script>location.href='trabajadorTemp.php';</script>";
?>
<?php
include("piePagina.php");
?>

