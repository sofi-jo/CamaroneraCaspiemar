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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <form name="myformmp" class ="formulario" method="post">

    <script>
    $( function() {
      $( "#campofechainicio" ).datepicker({
        numberOfMonths: 1,
      });
      $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    } );
    </script>
    
    EOT;

    $sql = "select idmateriaprima,nombre from materiaprima";
    $miconexion->consulta($sql);
    $miconexion->consultaListaMateriaPrima();

    echo <<< EOT
        <input type="hidden" id=idmp name=idmp value=0>
        <input type="text" id="campofechainicio" name="fecha" placeholder="Ingresar fecha"><br>
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
    </form>

    </main>
    
    EOT;

	echo <<< EOT
    <script>
    $(document).ready(function() {
        $('#inputlist').on('input', function() {
            var inputval= $("#inputlist").val();
            var oldval= $('datalist option[value='+inputval+']').attr('oldvalue');
            if (oldval){
                var myidmp = document.forms['myformmp']['idmp'];
                myidmp.setAttribute('value', oldval);
            }
        })
    });
    </script>
    EOT;



    if(array_key_exists('cantidad',$_POST)){
        agregarDatosMateriaPrimaCosecha();

       
        if ($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
            echo "<script>location.href='materiaPrimaCosecha.php?fase=1'</script>";
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#campofechainicio" ).datepicker({
        numberOfMonths: 1,
      });
      $( "#campofechafin" ).datepicker({
        numberOfMonths: 1,
      });

      $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      $( "#campofechafin" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      //var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
    } );
    </script>
    
    <main class="content">
    <h2 class="titulo">Agregar Cosecha</h2>
    <form class ="formulario" method="post">
        <input type="text" name="peso" placeholder="Ingresar peso de la cosecha"><br>
        <input type="text" id="campofechainicio" name="fechaInicio" placeholder="Ingresar la fecha de inicio"><br>
        <input type="text" id="campofechafin" name="fechaFin" placeholder="Ingresar la fecha de fin"><br>
        <input type="submit" value="Agregar">
    </form>
    </main>

    EOT;


    if(array_key_exists('peso',$_POST)){
        agregarCosecha();
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
    global $idmp;
    global $miconexion;
    global $urlFrom;
    global $ruta;
    global $fecha;
    global $idCosecha;
    $cantidad = $_POST["cantidad"];
    $precioU = $_POST["precioUnitario"];
    $sql = "";
    $total = $cantidad * $precioU;


    $sql = "SELECT idFase FROM fase WHERE cosecha_idcosecha = '$idCosecha'";
    $miconexion->consulta($sql);
    $rowidCosecha = $miconexion->consultaListaPrueba();
    
    
    #date_default_timezone_set('America/Bogota');
    #$fechaActual = date('Y-m-d');
   

    //la fase debe ser una de las que se encuentra en la bse 
    if ($urlFrom == $ruta.'materiaPrimaCosecha.php?fase=1'){
        echo '<script>alert("Datos guardados...");</script>';
        $sql = "insert into registromateriaprima values('', '$rowidCosecha[0]')";
    }else{
        echo '<script>alert("Datos guardados...");</script>';
        $sql = "insert into registromateriaprima values('', '$rowidCosecha[1]')";
    }
    $miconexion->consulta($sql);

    $sql = "SELECT MAX(idregistroMateriaPrima) FROM registromateriaprima";
    $miconexion->consulta($sql);
    $rowmaxidRegistroMP = $miconexion->consultaListaPrueba();
    $rowmaxidRegistroMP = $rowmaxidRegistroMP[0];



    $sql = "INSERT INTO registromateriaprima_has_materiaprima VALUES('', '$idmp', '$rowmaxidRegistroMP', '$fecha', '$cantidad', '$precioU', '$total')";
    $miconexion->consulta($sql);
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
}

function agregarCosecha(){
    global $miconexion;
    $peso = $_POST["peso"];
    $fechaI = $_POST["fechaInicio"];
    $fechaF = $_POST["fechaFin"];
    
    $sql = "INSERT INTO cosecha (peso, fecha, fechaFin, Empresa_idEmpresa) VALUES ('$peso', '$fechaI', '$fechaF', 1)";
    $miconexion->consulta($sql);  

    $sql = "SELECT MAX(idcosecha) FROM cosecha";
    $miconexion->consulta($sql);
    $row = $miconexion->consultaListaPrueba();
    $row = $row[0];

    $sql = "INSERT INTO fase (nombre_fase, cosecha_idcosecha) VALUES ('cria', '$row')";
    $miconexion->consulta($sql);

    $sql = "INSERT INTO fase (nombre_fase, cosecha_idcosecha) VALUES ('engorde', '$row')";
    $miconexion->consulta($sql);
}

include("piePagina.php");
?>
