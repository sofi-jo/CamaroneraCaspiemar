<?php
extract($_POST);
include("../dll/config.php");
include("../dll/class_mysqli.php");


$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

//insert, delete, update, listar
$sql = "insert into arealaboral values('', '$arealaboral','$sueldo')";
$miconexion->consulta($sql);

echo "<script>location.href='arealaboral.php';</script>";
?>
<?php
include("piePagina.php");
?>