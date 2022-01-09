<?php
include("../dll/class_mysqli_mio.php");
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
}elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=2' ) {
    echo <<< EOT
    <main class="content">

    <h2 class ="titulo">Agregar Materia Prima a la Cosecha</h2>

    <form class ="formulario" method="post">
    
    EOT;

    $sql = "select nombre from materiaprima";
    $miconexion->consulta($sql);
    $miconexion->consultaListaReal();

    echo <<< EOT
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('cantidad',$_POST)){
        agregarDatos2();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
            echo "<script>location.href='materiaPrimaCosecha.php?fase=1'</script>";
        }else{
            echo "<script>location.href='materiaPrimaCosecha.php?fase=2'</script>";
        }
    }
}elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/cosechas.php') {
    echo <<< EOT
    <main class="content">
    <h2 class="titulo">Agregar Cosecha</h2>
    <form class ="formulario" method="post">
        <input type="text" name="peso" placeholder="Ingresar peso de la cosecha"><br>
        <input type="text" name="fechaInicio" placeholder="Ingresar la fecha de inicio"><br>
        <input type="text" name="fechaFin" placeholder="Ingresar la fecha de fin"><br>
        <input type="submit" value="Agregar">
    </form>
    </main>
    EOT;

    if(array_key_exists('peso',$_POST)){
        agregarDatos3();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        echo "<script>location.href='cosechas.php'</script>";
    }
}

elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/trabajadores.php') {
    echo <<< EOT
    <main class="content">

    <h2 class="titulo">Agregar Trabajador</h2>

    <form class ="formulario" method="post">
        <input type="text" name="tipo" placeholder="Ingresar precio x hora"><br>
        <input type="text" name="precioHora" placeholder="Ingrese el precio por hora"><br>
        <input type="text" name="cantidadHoras" placeholder="Ingresar cantidad horas trabajadas"><br>
        <input type="text" name="telefono" placeholder="Ingresar telefono"><br>
        <input type="text" name="correo" placeholder="Ingresar correo"><br>
        <input type="text" name="nombres" placeholder="Ingresar nombres"><br>
        <input type="text" name="apellidos" placeholder="Ingresar apellidos"><br>
        <input type="text" name="aportacionIESS" placeholder="Ingresar aportacion IESS"><br>
        <input type="text" name="salario" placeholder="Ingresar salario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('peso',$_POST)){
        #agregarDatos3();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        echo "<script>location.href='cosechas.php'</script>";
    }
}elseif ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=2' ) {
    echo <<< EOT
    <main class="content">

    <h2 class ="titulo">Agregar Costos Indirectos a la Cosecha</h2>

    <form class ="formulario" method="post">
    
    EOT;

    $sql = "select nombre from costosindirectos";
    $miconexion->consulta($sql);
    $miconexion->consultaListaReal2();

    echo <<< EOT
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('cantidad',$_POST)){
        agregarDatos2();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
            echo "<script>location.href='materiaPrimaCosecha.php?fase=1'</script>";
        }else{
            echo "<script>location.href='materiaPrimaCosecha.php?fase=2'</script>";
        }
    }
}


function agregarDatos(){
    global $miconexion;
    $nombre = $_POST["nombre"];
    $descripcionNuevo = $_POST["descripcionNuevo"];
    
    $sql = "insert into materiaprima values('','$nombre','$descripcionNuevo')";
    
    $miconexion->consulta($sql);
}


function agregarDatos2(){
    global $miconexion;
    global $urlFrom;
    $id = $_POST["busquedacosehcas"];
    $cantidad = $_POST["cantidad"];
    $precioU = $_POST["precioUnitario"];
    $sql = "";

    
    if ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
        $sql = "insert into registromateriaprima values('$id','hoy','1','$cantidad','','$precioU')";
    }else{
        $sql = "insert into registromateriaprima values('$id','hoy','2','$cantidad','','$precioU')";
    }
    $miconexion->consulta($sql);
}

function agregarDatos3(){
    global $miconexion;
    $peso = $_POST["peso"];
    $fechaI = $_POST["fechaInicio"];
    $fechaF = $_POST["fechaFin"];
    
    #$sql = "insert into cosecha values('3','$peso','$fechaI','$fechaF','1')";
    $sql = "INSERT INTO cosecha (peso, fecha, fechaFin, Empresa_idEmpresa) VALUES ('$peso', '$fechaI', '$fechaF', 1)";
    $miconexion->consulta($sql);
    
}

include("piePagina.php");
?>
