<?php
extract($_GET);
include("../dll/class_mysqli.php");
@include("cabeceraInterna.php");

$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

//insert, delete, update, listar

$sql = "delete from costosindirectos where idcostosIndirectos=$idRegistro";
$miconexion->consulta($sql);
echo '<script>alert("Datos eliminados...");</script>';
echo "<script>location.href='costosIndirectos.php';</script>";
?>

<?php
include("piePagina.php");
?>