<h2>Materia Prima</h2>

<?php
    include("dll/config.php");
    include("dll/class_mysqli_mio.php");

    $miconexion= new clase_mysqli7;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME); 
    $sql="SELECT * FROM `materiaprima`"; 
    // es necesario que haya una consulta antes de llamar a una funcion, en el caso de llamar a dos funciones solo reconocera la primera
    $miconexion->consulta($sql);
    $list = $miconexion->consultaListaPrueba2();
    $miconexion->consulta($sql);
    $miconexion->verconsulta(); 
    
    
    echo $list[0][0] . "     " . $list[0][1];
    echo "<br>";
    echo $list[1][0] . "     " . $list[1][1];
?>
