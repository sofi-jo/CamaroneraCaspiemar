<?php
    $mysqli = new mysqli("127.0.0.1", "root", "", "mydb");

    $salida = "";
    $query = "select * from materiaprima";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "select nombre from materiaprima where nombre like '%" . $q . "%'";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        $salida.= "<table class='tabla_datos'>
                        <thead>
                            <tr>
                            <td>Nombre</td>
                            </tr>
                        </thead>
                        <tbody>";

        while($fila= $resultado->fetch_assoc()){
            $salida.="<tr>
                        <td>". $fila['nombre']."<td>
                    </tr>";
        }

        $salida.="</tbody></table>";

    }else{
        $salida.="No hay dato";
    }

    echo $salida;

    $mysqli->close();
?>

