<?php
    include("cabeceraInterna.php");
    include("../dll/class_mysqli_mio.php");
?>
    <main class="content">
		<h2 class ="titulo">Generar Reporte</h2>
		
		<form class ="formulario_reporte" method="post" action="reportes.php">
            <label for="fecha_inicio">Fecha Inicio: </label>
            <input type="select" name="fecha_inicio" placeholder="AAAA/MM/DD" ><br>
            <label for="fecha_fin">Fecha Fin:</label>
            <input type="select" name="fecha_fin" placeholder="AAAA/MM/DD"><br>
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