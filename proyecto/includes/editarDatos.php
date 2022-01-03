<?php 
    extract($_GET);
 	include("../dll/class_mysqli_mio.php");
    include("cabeceraInterna.php");

 	$miconexion= new clase_mysqli7;
 	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    if ($tipoEdit == 'Eliminar'){
        if($urlFrom == '/camaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'){
            $sql="delete from materiaprima where idmateriaPrima=$idRegistro";
            $miconexion->consulta($sql);
    
            echo "<script>alert('Datos elimanados....') </script>";
            echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
        
        }elseif($urlFrom == '/camaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php'){
            $sql="delete from registromateriaprima where idregistromateriaPrima=$idRegistro";
            $miconexion->consulta($sql);
    
            echo "<script>alert('Datos elimanados....') </script>";
            echo "<script>location.href='materiaPrimaCosecha.php'</script>";
        }

    } 

    if ($tipoEdit == 'Actualizar'){
        if($urlFrom == '/camaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'){

            $sql="select * from materiaprima where idmateriaPrima = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();
            echo <<< EOT
            <main class="content">
            <h2>Fornmulario de actualización de productos</h2>
            <form method="post">
            <input type="hidden" name="idRegistro" value = $listaUser[0]><br>
            <input type="text" name="nombre" value = $listaUser[2]><br>
            <input type="text" name="descripcion" placeholder="Ingrese la descripcion del producto" value = $listaUser[1]><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>
            EOT;
    
            
            if(array_key_exists('descripcion',$_POST)){
                actualizarDatosMateriaPrima();
            }
        }elseif($urlFrom == '/camaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php'){

            $sql="select * from registromateriaprima where idregistromateriaPrima = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();
            echo <<< EOT
            <main class="content">
            <h2>Fornmulario de actualización de productos de la Cosecha</h2>
            Producto: $listaUser[0]
            <form method="post">
            <input type="hidden" name="idRegistro" value = $listaUser[0]><br>
            Cantidad
            <input type="text" name="cantidad" placeholder="Ingrese la cantidad del producto" value = $listaUser[3]><br>
            Costo Unitario
            <input type="text" name="costoUnitario" placeholder="Ingrese el costo unitario del producto" value = $listaUser[5]><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>
            EOT;
    
            
            if(array_key_exists('cantidad',$_POST)){
                actualizarDatosMateriaPrimaCosecha();
            }
        }

    } 

    function actualizarDatosMateriaPrima(){
        $id = $_POST["idRegistro"];
        $descripcion = $_POST["descripcion"];
        $nombre = $_POST["nombre"];

        $sql="update materiaprima set nombre = '$nombre',descripcion = '$descripcion' where idmateriaprima = '$id'";
        global $miconexion;
        $miconexion->consulta($sql);
   
       #echo "<script>alert('Datos actualizados....') </script>";
       #echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
    }

    function actualizarDatosMateriaPrimaCosecha(){
        $id = $_POST["idRegistro"];
        $cantidad = $_POST["cantidad"];
        $costoUnitario = $_POST["costoUnitario"];
        $sql="update registromateriaprima set cantidad = '$cantidad', costoUnitario = '$costoUnitario' where idregistroMateriaPrima = '$id'";
        global $miconexion;
        $miconexion->consulta($sql);
   
       echo "<script>alert('Datos actualizados....') </script>";
       echo "<script>location.href='materiaPrimaCosecha.php'</script>";
    }

    include("piePagina.php");
?>


