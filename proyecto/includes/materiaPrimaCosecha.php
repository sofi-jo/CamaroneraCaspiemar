<?php
include("cabeceraInterna.php");
include("../dll/class_mysqli_mio.php");
$link = $_SERVER['REQUEST_URI'];
extract($_GET);

echo '<main class="content">';
echo "<h2 class='titulo'>Materia Prima</h2>";
echo '<label id="texto_nav1"></label>';


echo '<div class="agregar"><a href=agregarDatos.php?urlFrom=' . $link . '>Agregar +</a></div>';

$miconexion = new clase_mysqli7;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);


if ($fase == 1) {
    echo $idCosecha;
    $sql = "SELECT idRegistroMateriaPrima, m.nombre'Nombre', fecha'FECHA', cantidad'Cantidad', costoUnitario'Costo Unitario',
    total'Total' 
    FROM registromateriaprima rm
    INNER JOIN registromateriaprima_materiaprima r ON r.registroMateriaPrima_idregistroMateriaPrima = rm.idregistroMateriaPrima
    INNER JOIN materiaprima m ON m.idmateriaprima  = r.materiaPrima_idmateriaPrima
    INNER JOIN fase f ON rm.Fase_idFase = f.idFase
    WHERE ( rm.Fase_idFase % 2 ) != 0 AND f.cosecha_idcosecha = $idCosecha;";

    
    } elseif ($fase == 2) {
    $sql = "SELECT idRegistroMateriaPrima, m.nombre'Nombre', fecha'FECHA', cantidad'Cantidad', costoUnitario'Costo Unitario',
    total'Total' 
    FROM registromateriaprima rm
    INNER JOIN registromateriaprima_materiaprima r ON r.registroMateriaPrima_idregistroMateriaPrima = rm.idregistroMateriaPrima
    INNER JOIN materiaprima m ON m.idmateriaprima  = r.materiaPrima_idmateriaPrima
    INNER JOIN fase f ON rm.Fase_idFase = f.idFase
    WHERE ( rm.Fase_idFase % 2 ) = 0 AND f.cosecha_idcosecha = $idCosecha;";

}
// es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera

$miconexion->consulta($sql);
$miconexion->verconsulta3();


echo '</main>';
include("piePagina.php");
