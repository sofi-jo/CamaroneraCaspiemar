<?php
extract($_POST);
include("../dll/config.php");
include("../dll/class_mysqli.php");


$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

//insert, delete, update, listar
$sql = "insert into costosindirectos values('$id','$tipo')";
$miconexion->consulta($sql);

echo '<script>alert("Datos guardados...");</script>';
echo "<script>location.href='costosIndirectos.php';</script>";
?>
<?php
include("piePagina.php");
?>