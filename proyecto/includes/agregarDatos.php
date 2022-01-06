<?php
include("../dll/class_mysqli.php");
include("cabeceraInterna.php");
extract($_POST);
extract($_GET);

$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


if($urlFrom == '/Clases/ingenieriaWeb/proyecto/includes/gestionarBDmateriaPrima.php'){
    echo <<< EOT
    <main>

    <h2 class="titulo">Agregar Materia Prima a la Base de Datos</h2>

    <form class ="formulario" method="post">
        <input type="text" name="nombre" placeholder="Ingrese nombre de producto"><br>
        <input type="text" name="descripcionNuevo" placeholder="Ingresar descripcion"><br>
        <input type="submit" value="Agregar">
        <input type="cancel" onclick="javascript:window.location='$urlSitio/includes/gestionarBDmateriaPrima.php';"
        value="Cancelar">
    </form>

    </main>
    EOT;

    if(array_key_exists('descripcionNuevo',$_POST)){
        agregarDatos();
        #echo '<script>alert("Datos guardados...");</script>';
        echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
    }
}elseif ($urlFrom == '/camaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php') {
    echo <<< EOT
    <main class="content">

    <h1>Agregar Materia Prima a la Cosecha</h2>

    <form class ="formulario" method="post">
        <input type="text" name="nombre" placeholder="Ingresar nombre del producto"><br>
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('nombre',$_POST)){
        agregarDatos2();
        echo '<script>alert("Datos guardados...");</script>';
        echo "<script>location.href='materiaPrimaCosecha.php'</script>";
    }
}

function agregarDatos(){
    global $miconexion;
    $nombre = $_POST["nombre"];
    $descripcionNuevo = $_POST["descripcionNuevo"];
    
    $sql = "insert into materiaprima values('','$descripcionNuevo','$nombre')";
    
    $miconexion->consulta($sql);
}


function agregarDatos2(){
    global $miconexion;
    $id = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $precioU = $_POST["precioUnitario"];
    
    $sql = "insert into registromateriaprima values('$id','','1','$cantidad','','$precioU')";
    
    $miconexion->consulta($sql);
}

include("piePagina.php");
?>
