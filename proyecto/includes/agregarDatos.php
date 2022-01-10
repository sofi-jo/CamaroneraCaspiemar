<?php
include("../dll/class_mysqli_mio.php");
include("cabeceraInterna.php");
extract($_POST);
extract($_GET);

$miconexion= new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


if($urlFrom == $ruta.'gestionarBDmateriaPrima.php'){
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
        agregarDatosMateriaPrima();
        #echo '<script>alert("Datos guardados...");</script>';
        echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
    }
}elseif ($urlFrom == $ruta.'materiaPrimaCosecha.php?fase=1' or $urlFrom == $ruta.'materiaPrimaCosecha.php?fase=2' ) {
    echo <<< EOT
    <main class="content">

    <h2 class ="titulo">Agregar Materia Prima a la Cosecha</h2>

    <form class ="formulario" method="post">
    
    EOT;

    $sql = "select idmateriaprima,nombre from materiaprima";
    $miconexion->consulta($sql);
    $miconexion->consultaListaMateriaPrima();

    echo <<< EOT
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('cantidad',$_POST)){
        agregarDatosMateriaPrimaCosecha();

        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
            //echo "<script>location.href='materiaPrimaCosecha.php?fase=1'</script>";
        }else{
            echo "<script>location.href='materiaPrimaCosecha.php?fase=2'</script>";
        }
    }
}elseif($urlFrom == $ruta.'registroCostoIndirecto.php?fase=1'or $urlFrom == $ruta.'registroCostoIndirecto.php?fase=2'){
    echo <<< EOT
    <main class="content">
    <h2 class ="titulo">Agregar Costos Indirectos</h2>
    <form class ="formulario" method="post">
    EOT;

    $sql = "select idcostosIndirectos, nombre from costosindirectos";
    $miconexion->consulta($sql);
    $miconexion->consultaListaMateriaPrima();

    echo <<< EOT
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    EOT;

    if(array_key_exists('cantidad',$_POST)){
        agregarDatosCostosIndirectosCosecha();

        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == $ruta.'registroCostoIndirecto.php?fase=1'){
            echo "<script>location.href='registroCostoIndirecto.php?fase=1'</script>";
        }else{
            echo "<script>location.href='registroCostoIndirecto.php?fase=2'</script>";
        }
    }
}elseif ($urlFrom == $ruta.'cosechas.php') {
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

elseif ($urlFrom == $ruta.'trabajadores.php') {
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
}



function agregarDatosMateriaPrima(){
    global $miconexion;
    $nombre = $_POST["nombre"];
    $descripcionNuevo = $_POST["descripcionNuevo"];
    
    $sql = "insert into materiaprima values('','$nombre','$descripcionNuevo')";
    
    $miconexion->consulta($sql);
}


function agregarDatosMateriaPrimaCosecha(){
    global $miconexion;
    global $urlFrom;
    global $ruta;
    $cantidad = $_POST["cantidad"];
    $precioU = $_POST["precioUnitario"];
    $sql = "";
    $total = $cantidad * $precioU;
    date_default_timezone_set('America/Bogota');
    $fechaActual = date('Y-m-d');
   
    if ($urlFrom == $ruta.'materiaPrimaCosecha.php?fase=1'){
        $sql = "insert into registromateriaprima values('','$fechaActual','1','$cantidad','$total','$precioU')";
    }else{
        $sql = "insert into registromateriaprima values('','$fechaActual','2','$cantidad','$total','$precioU')";
    }
    $miconexion->consulta($sql);

    /* $sql2 ="SELECT max(idregistroMateriaPrima) from registromateriaprima";
    $miconexion->consulta($sql2);
    $idRegistro = $miconexion->consultaListaPrueba($sql2);

    $sql = "insert into registromateriaprima_has_materiaprima
            values ('$idRegistro[0]','$id')";
    $miconexion->consulta($sql); */
    
}

function agregarDatosCostosIndirectosCosecha(){
    global $miconexion;
    global $urlFrom;
    global $ruta;
    $idMateria = $_POST[""];
    echo $idMateria;
    $cantidad = $_POST["cantidad"];
    $sql = "";
    date_default_timezone_set('America/Bogota');
    $fechaActual = date('Y-m-d');
    if ($urlFrom == $ruta.'registroCostoIndirecto.php?fase=1'){
        $sql = "insert into registrocostosindirectos values('','$fechaActual','1','$cantidad')";
    }else{
        $sql = "insert into registromateriaprima values('','$fechaActual','2','$cantidad')";
    }
    $miconexion->consulta($sql);

    /* $sql2 ="SELECT max(idregistroMateriaPrima) from registromateriaprima";
    $miconexion->consulta($sql2);
    $idRegistro = $miconexion->consultaListaPrueba($sql2);

    $sql = "insert into registromateriaprima_has_materiaprima
            values ('$idRegistro[0]','$id')";
    $miconexion->consulta($sql); */
    
}

function agregarCosecha(){
    global $miconexion;
    $peso = $_POST["peso"];
    $fechaI = $_POST["fechaInicio"];
    $fechaF = $_POST["fechaFin"];
    
    $sql = "INSERT INTO cosecha (peso, fecha, fechaFin, Empresa_idEmpresa) VALUES ('$peso', '$fechaI', '$fechaF', 1)";
    $miconexion->consulta($sql);  
}

include("piePagina.php");
?>
