<?php
include("../dll/class_mysqli.php");
include("cabeceraInterna.php");
extract($_POST);
extract($_GET);

$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'){
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
}elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php') {
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
}elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/cosechas.php') {
    echo <<< EOT
    <main class="content">

    <h2 class="titulo">Agregar Cosecha</h2>

    <form class ="formulario" method="post">
        <input type="text" name="peso" placeholder="Ingresar peso inicial de la cosecha"><br>
        <input type="text" name="fechaInicio" placeholder="Ingresar la fecha de inicio"><br>
        <input type="text" name="fechaFin" placeholder="Ingresar la fecha de fin"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('peso',$_POST)){
        agregarDatos3();
        echo '<script>alert("Datos guardados...");</script>';
        echo "<script>location.href='cosechas.php'</script>";
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

function agregarDatos3(){
    global $miconexion;
    $peso = $_POST["peso"];
    $fechaI = $_POST["fechaInicio"];
    $fechaF = $_POST["fechaFin"];
    
    $sql = "insert into cosecha values('3','$peso','$fechaI','$fechaF','1')";
    
    $miconexion->consulta($sql);
}

include("piePagina.php");
?>
