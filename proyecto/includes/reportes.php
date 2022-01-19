<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
?>
    <main class="content">
		<h2 class ="titulo">Generar Reporte</h2>
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
            });
        </script>
		<form class ="formulario_reporte" method="post" action="aggCostosIndirecDb.php">
            <label for="fecha_inicio">Fecha Inicio: </label>
            <input type="select" id="campofechainicio" name="fecha_inicio" placeholder="" ><br>
            <label for="fecha_fin">Fecha Fin: </label>
            <input type="select" id="campofechafin" name="fecha_fin"><br>
            <label for="filtrar">Filtrar por: </label>
            <select class="filtro" name="select">
                <option value="1"selected>Todos</option>
                <option value="2" >Materia Prima</option>
                <option value="3">Mano de Obra</option>
                <option value="4">Costos Indirectos</option>
            </select><br>
			<input type="submit" value="BUSCAR">
		</form>
<hr><br>
<?php

    echo '<h2 class = "titulo">Reporte</h2>';

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    @$fechaInicio = $_POST["fecha_inicio"];
    @$fechaFin = $_POST["fecha_fin"];
    @$filtrar = $_POST["select"];


    if ($filtrar == "1") {
        echo "1";
    }elseif ($filtrar == "2") {
        echo "2";
    }elseif ($filtrar == "3") {
        echo "3";
    }elseif ($filtrar == "4") {
        echo "4";
    }
    /* $sql = "SELECT 
    FROM registromateriaprima rm
    INNER JOIN registromateriaprima_has_materiaprima r ON r.registroMateriaPrima_idregistroMateriaPrima = rm.idregistroMateriaPrima
    INNER JOIN materiaprima m ON m.idmateriaprima  = r.materiaPrima_idmateriaPrima
    WHERE ( rm.Fase_idFase % 2 ) = 0;"; */
    $miconexion->consulta("select idcostosIndirectos 'Id', nombre'Nombre', tipo'Tipo' from costosindirectos");
    $miconexion->verconsulta3();

    echo '</main>';


    include("piePagina.php");
?>