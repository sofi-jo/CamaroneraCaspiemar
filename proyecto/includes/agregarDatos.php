<?php
include("../dll/class_mysqli_mio.php");
include("cabeceraInterna.php");
extract($_POST);
extract($_GET);

$miconexion = new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


if($urlFrom == $ruta.'gestionarBDmateriaPrima.php'){
    echo <<< EOT
    <main>

    <h2 class="titulo">Agregar Materia Prima a la Base de Datos</h2>

    <form class="formulario" method="post" autocomplete="off">
        <input type="text" name="nombre" placeholder="Ingrese nombre de producto"><br>
        <input type="text" name="descripcionNuevo" placeholder="Ingresar descripcion"><br>
        <input type="submit" value="Agregar">
        <a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'>Cancelar</a>

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

    <form name="myformmp" class ="formulario" method="post" autocomplete="off">

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
        <input type="hidden" id=idmp name=idmp value="">
        <input type="text" id="campofechainicio" name="fecha" placeholder="Ingresar fecha"><br>
        <input type="text" name="cantidad" placeholder="Ingresar cantidad"><br>
        <input type="text" name="precioUnitario" placeholder="Ingresar precio unitario"><br>
        <input type="submit" value="Agregar">
        <a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'>Cancelar</a>
    </form>
    </main>
    
    EOT;

	echo <<< EOT
    <script>

    $(document).ready(function() {
        $('#inputlist').on('input', function() {
            var inputval= $('#inputlist').val();
            var oldval= $("datalist option[value='"+inputval+"']").attr('oldvalue');
            console.log(oldval);
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <form name="myformci" class ="formulario" method="post" autocomplete="off">

    <script>
    $( function() {
      $( "#campofechainicio" ).datepicker({
        numberOfMonths: 1,
      });
      $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    } );
    </script>

    EOT;

    $sql = "select idcostosIndirectos, nombre from costosindirectos";
    $miconexion->consulta($sql);
    $miconexion->consultaListaCostosIndirectos();

    echo <<< EOT
        <input type="hidden" id=idci name=idci value="">
        <input type="text" id="campofechainicio" name="fecha" placeholder="Ingresar fecha"><br>
        <input type="text" name="cantidadP" placeholder="Ingresar cantidad pagada"><br>
        <input type="submit" value="Agregar">
        <a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'>Cancelar</a>
    </form>

    </main>
    EOT;

    echo <<< EOT
    <script>

    
    $(document).ready(function() {
        $('#inputlist').on('input', function() {
            var inputval= $('#inputlist').val();
            var oldval= $("datalist option[value='"+inputval+"']").attr('oldvalue');
            console.log(oldval);
            if (oldval){
                var myidci = document.forms['myformci']['idci'];
                myidci.setAttribute('value', oldval);
            }
        })
    });
    </script>
    EOT;

    if(array_key_exists('cantidadP',$_POST)){
        agregarDatosCostosIndirectosCosecha();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == $ruta.'registroCostoIndirecto.php?fase=1'){
            //echo "<script>location.href='registroCostoIndirecto.php?fase=1'</script>";
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
    } );
    </script>
    
    <main class="content">
    <h2 class="titulo">Agregar Cosecha</h2>
    <form class ="formulario" method="post" autocomplete="off">
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
}elseif ($urlFrom == $ruta.'areaLaboralCosecha.php?fase=1'or $urlFrom == $ruta.'areaLaboralCosecha.php?fase=2') {
    echo <<< EOT
    <main class="content">
    <h2 class ="titulo">Agregar Area Laboral</h2>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <form name="myformal" class ="formulario" method="post" autocomplete="off">

    <script>
    $( function() {
      $( "#campofechainicio" ).datepicker({
        numberOfMonths: 1,
      });
      $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    } );
    </script>

    EOT;

    $sql = "select id_areaLaboral, nombre_area from arealaboral";
    $miconexion->consulta($sql);
    $miconexion->consultaListaAreasLaborales();

    echo <<< EOT
        <input type="hidden" id=idal name=idal value="">
        <input type="text" id="campofechainicio" name="fecha" placeholder="Ingresar fecha de pago"><br>
        <input type="text" name="cantidadP" placeholder="Ingresar cantidad pagada"><br>
        <input type="submit" value="Agregar">
        <a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/areaLaboralCosecha.php?fase=1'>Cancelar</a>
    </form>

    </main>
    EOT;

    echo <<< EOT
    <script>

    
    $(document).ready(function() {
        $('#inputlist').on('input', function() {
            var inputval= $('#inputlist').val();
            var oldval= $("datalist option[value='"+inputval+"']").attr('oldvalue');
            console.log(oldval);
            if (oldval){
                var myidal = document.forms['myformal']['idal'];
                myidal.setAttribute('value', oldval);
            }
        })
    });
    </script>
    EOT;

    if(array_key_exists('cantidadP',$_POST)){
        agregarDatosAreaLaboralCosecha();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == $ruta.'areaLaboralCosecha.php?fase=1'){
            echo "<script>location.href='areaLaboralCosecha.php?fase=1'</script>";
        }else{
            echo "<script>location.href='areaLaboralCosecha.php?fase=2'</script>";
        }
    }
}elseif ($urlFrom == $ruta.'trabajadorTempCosecha.php?fase=1'or $urlFrom == $ruta.'trabajadorTempCosecha.php?fase=2') {
    echo <<< EOT
    <main class="content">
    <h2 class ="titulo">Agregar Trabajador Temporal</h2>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <form name="myformtt" class ="formulario" method="post" autocomplete="off">

    <script>
    $( function() {
      $( "#campofechainicio" ).datepicker({
        numberOfMonths: 1,
      });
      $( "#campofechainicio" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    } );
    </script>

    EOT;

    $sql = "select t.cedula, p.nombres, p.apellidos
    from trabajador_temp t
    INNER JOIN persona p ON p.cedula = t.cedula;";
    $miconexion->consulta($sql);
    $miconexion->consultaListaTrabajadoresTemporales();

    echo <<< EOT
        <input type="hidden" id=idtt name=idtt value="">
        <input type="text" id="campofechainicio" name="fecha" placeholder="Ingresar fecha de pago"><br>
        <input type="text" name="cantHoras" placeholder="Ingresar Horas Trabajadas"><br>
        <input type="submit" value="Agregar">
        <a class= 'cancelar' href='http://127.0.0.1/CamaroneraCaspiemar/proyecto/includes/trabajadorTempCosecha.php?fase=1'>Cancelar</a>
    </form>

    </main>
    EOT;

    echo <<< EOT
    <script>

    
    $(document).ready(function() {
        $('#inputlist').on('input', function() {
            var inputval= $('#inputlist').val();
            var oldval= $("datalist option[value='"+inputval+"']").attr('oldvalue');
            console.log(oldval);
            if (oldval){
                var myidtt = document.forms['myformtt']['idtt'];
                myidtt.setAttribute('value', oldval);
            }
        })
    });
    </script>
    EOT;

    if(array_key_exists('cantHoras',$_POST)){
        agregarDatosTrabajadoresTemporales();
        /*echo '<script>alert("Datos guardados...");</script>';*/
        if ($urlFrom == $ruta.'trabajadorTempCosecha.php?fase=1'){
            //echo "<script>location.href='trabajadorTempCosecha.php?fase=1'</script>";
        }else{
            echo "<script>location.href='trabajadorTempCosecha.php?fase=2'</script>";
        }
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
    $rowidCosecha = $miconexion->consultaListaGaa();
   

    //la fase debe ser una de las que se encuentra en la bse 
    if ($urlFrom == $ruta.'materiaPrimaCosecha.php?fase=1'){
        $sql = "insert into registromateriaprima values('', '$rowidCosecha[0]')";
    }else{
        $sql = "insert into registromateriaprima values('', '$rowidCosecha[1]')";
    }
    $miconexion->consulta($sql);

    $sql = "SELECT MAX(idregistroMateriaPrima) FROM registromateriaprima";
    $miconexion->consulta($sql);
    $rowmaxidRegistroMP = $miconexion->consultaListaPrueba();
    $rowmaxidRegistroMP = $rowmaxidRegistroMP[0];

    echo $idmp;



    $sql = "INSERT INTO registromateriaprima_materiaprima VALUES('', '$rowmaxidRegistroMP', '$idmp', '$fecha', '$cantidad', '$precioU', '$total')";
    $miconexion->consulta($sql);
}

function agregarDatosCostosIndirectosCosecha(){
    global $idci;
    global $miconexion;
    global $urlFrom;
    global $ruta;
    global $fecha;
    global $idCosecha;
    $cantidad = $_POST["cantidadP"];
    $sql = "";


    $sql = "SELECT idFase FROM fase WHERE cosecha_idcosecha = '$idCosecha'";
    $miconexion->consulta($sql);
    $rowidCosecha = $miconexion->consultaListaGaa();

    echo $rowidCosecha[0];
   

    //la fase debe ser una de las que se encuentra en la bse 
    if ($urlFrom == $ruta.'registroCostoIndirecto.php?fase=1'){
        $sql = "insert into registrocostosindirectos values('', '$rowidCosecha[0]')";
    }else{
        $sql = "insert into registrocostosindirectos values('', '$rowidCosecha[1]')";
    }
    $miconexion->consulta($sql);

    $sql = "SELECT MAX(idregistroCostosIndirectos) FROM registrocostosindirectos";
    $miconexion->consulta($sql);
    $rowmaxidRegistroCI = $miconexion->consultaListaPrueba();
    $rowmaxidRegistroCI = $rowmaxidRegistroCI[0];

    $sql = "INSERT INTO registrocostosindirectos_costosindirectos VALUES('', '$rowmaxidRegistroCI', '$idci', '$fecha', '$cantidad')";
    $miconexion->consulta($sql);
}

function agregarDatosAreaLaboralCosecha(){
    global $idal;
    global $miconexion;
    global $urlFrom;
    global $ruta;
    global $fecha;
    global $idCosecha;
    $sql = "";

    $sql = "SELECT idFase FROM fase WHERE cosecha_idcosecha = '$idCosecha'";
    $miconexion->consulta($sql);
    $rowidCosecha = $miconexion->consultaListaGaa();


    //la fase debe ser una de las que se encuentra en la bse 
    if ($urlFrom == $ruta.'areaLaboralCosecha.php?fase=1'){
        $sql = "insert into registro_mano_obra values('', '$rowidCosecha[0]')";
    }else{
        $sql = "insert into registro_mano_obra values('', '$rowidCosecha[1]')";
    }
    $miconexion->consulta($sql);

    $sql = "SELECT MAX(id_registro_mano_obre) FROM registro_mano_obra";
    $miconexion->consulta($sql);
    $rowmaxidRegistroCI = $miconexion->consultaListaPrueba();
    $rowmaxidRegistroCI = $rowmaxidRegistroCI[0];
    $sql = "INSERT INTO registro_mano_obra_arealaboral VALUES('', '$rowmaxidRegistroCI', '$idal', '$fecha')";
    $miconexion->consulta($sql);
}

function agregarDatosTrabajadoresTemporales(){
    global $idtt;
    global $miconexion;
    global $urlFrom;
    global $ruta;
    global $fecha;
    global $idCosecha;
    
    $cantHoras = $_POST["cantHoras"];
    $sql = "";

    $sql = "SELECT idFase FROM fase WHERE cosecha_idcosecha = '$idCosecha'";
    $miconexion->consulta($sql);
    $rowidCosecha = $miconexion->consultaListaGaa();

    //la fase debe ser una de las que se encuentra en la bse !@
    if ($urlFrom == $ruta.'trabajadorTempCosecha.php?fase=1'){
        $sql = "insert into registro_mano_obra values('', '$rowidCosecha[0]')";
    }else{
        $sql = "insert into registro_mano_obra values('', '$rowidCosecha[1]')";
    }
    $miconexion->consulta($sql);

    $sql = "SELECT MAX(id_registro_mano_obre) FROM registro_mano_obra";
    $miconexion->consulta($sql);
    $rowmaxidRegistroCI = $miconexion->consultaListaPrueba();
    $rowmaxidRegistroCI = $rowmaxidRegistroCI[0];
    
    $sql = "SELECT precio_hora FROM trabajador_temp WHERE cedula = $idtt";
    $miconexion->consulta($sql);
    $precioHora = $miconexion->consultaListaPrueba();
    $pago = $cantHoras * $precioHora[0];

    $sql = "INSERT INTO registro_mano_obra_trabajador_temp VALUES('', '$rowmaxidRegistroCI', '$idtt', '$cantHoras', '$pago')";
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
