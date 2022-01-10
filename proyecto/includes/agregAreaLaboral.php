<?php
extract($_POST);
include("../dll/config.php");
include("../dll/class_mysqli.php");


$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

//insert, delete, update, listar
$sql = "insert into arealaboral values('', '$nombre_area','$total_salario')";
$miconexion->consulta($sql);

echo "<script>location.href='arealaboral.php';</script>";
?>
<?php
include("piePagina.php");
?>