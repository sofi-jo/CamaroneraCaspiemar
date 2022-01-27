<?php 
    extract($_GET);
 	include("../dll/class_mysqli_mio.php");
    include("cabeceraInterna.php");

 	$miconexion= new clase_mysqli7;
 	$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);

    if ($tipoEdit == 'Eliminar'){
        if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'){
            $sql="delete from materiaprima where idmateriaPrima=$idRegistro";
            $miconexion->consulta($sql);
    
            
            echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
        
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=2'){
            $sql="delete from registromateriaprima_materiaprima where registroMateriaPrima_idregistroMateriaPrima=$idRegistro";
            $miconexion->consulta($sql);

            $sql="delete from registromateriaprima where idregistroMateriaPrima=$idRegistro";
            $miconexion->consulta($sql);

            if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
                echo "<script>location.href='materiaPrimaCosecha.php?fase=1&idcosecha=" . $idCosecha . "'</script>";
            }else{
                echo "<script>location.href='materiaPrimaCosecha.php?fase=2&idcosecha=" . $idCosecha . "'</script>";
            }
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=2'){
            $sql="delete from registrocostosindirectos_costosindirectos where registroCostosIndirectos_idregistroCostosIndirectos=$idRegistro";
            $miconexion->consulta($sql);

            $sql="delete from registrocostosindirectos where idregistroCostosIndirectos=$idRegistro";
            $miconexion->consulta($sql);

            if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1'){
                echo "<script>location.href='registroCostoIndirecto.php?fase=1&idcosecha=" . $idCosecha . "'</script>";
            }else{
                echo "<script>location.href='registroCostoIndirecto.php?fase=2&idcosecha=" . $idCosecha . "'</script>";
            }
    
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/arealaboral.php'){
            $sql="delete from arealaboral where id_areaLaboral=$idRegistro";
            $miconexion->consulta($sql);
    
            echo "<script>location.href='arealaboral.php'</script>";
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/costosIndirectos.php'){
            $sql="delete from costosindirectos where idcostosIndirectos=$idRegistro";
            $miconexion->consulta($sql);
    
            echo "<script>location.href='costosIndirectos.php'</script>";
        
        }

    } 

    if ($tipoEdit == 'Actualizar'){
        if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'){

            $sql="select * from materiaprima where idmateriaPrima = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();
            echo <<< EOT
            <main class="content">
            <h2 class="titulo">Formulario de actualización de productos</h2>
            <form method="post" autocomplete="off">
            <input type="hidden" name="idRegistro" value = $listaUser[0]><br>
            <input type="text" name="nombre" value = '$listaUser[1]'><br>
            <input type="text" name="descripcion" placeholder="Ingrese la descripcion del producto" value = '$listaUser[2]'><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>
            EOT;
    
            
            if(array_key_exists('descripcion',$_POST)){
                actualizarDatosMateriaPrima();
                echo "<script>location.href='/CamaroneraCaspiemar/proyecto/includes/gestionarBDmateriaPrima.php'</script>";
                
            }
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=2'){

            $sql="select * from registromateriaprima_materiaprima where registroMateriaPrima_idregistroMateriaPrima = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();


            $sql="select nombre from materiaprima where idmateriaPrima = $listaUser[2]";
            $miconexion->consulta($sql);
            $listaComida = $miconexion->consultaLista3();
            echo <<< EOT
            <main class="content">
            <h2 class="titulo">Fornmulario de actualización de productos de la Cosecha</h2>
            Producto: $listaComida[0]
            <form method="post" autocomplete="off">
            <input type="hidden" name="idRegistro" value = $listaUser[0]><br>
            Cantidad
            <input type="text" name="cantidad" placeholder="Ingrese la cantidad del producto" value = $listaUser[4]><br>
            Costo Unitario
            <input type="text" name="costoUnitario" placeholder="Ingrese el costo unitario del producto" value = $listaUser[5]><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>
            EOT;
    
            if(array_key_exists('cantidad',$_POST)){
                actualizarDatosMateriaPrimaCosecha();
                
                if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1'){
                    echo "<script>location.href='/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=1&idCosecha=$idCosecha'</script>";
                }else{
                    echo "<script>location.href='/CamaroneraCaspiemar/proyecto/includes/materiaPrimaCosecha.php?fase=2idCosecha=$idCosecha'</script>";
                }
            }
        }elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/costosIndirectos.php'){

            $sql="select * from costosIndirectos where idcostosIndirectos = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();
            echo <<< EOT
            <main class="content">
            <h2 class="titulo">Formulario de actualización de Costos Indirectos</h2>
            <form method="post" autocomplete="off">
            <input type="hidden" name="idRegistro" value = '$listaUser[0]'><br>
            <input type="text" name="nombre" value = '$listaUser[1]'><br>
            <input type="text" name="tipoCostos" placeholder="Ingrese el tipo de producto" value = '$listaUser[2]'><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>

            EOT;
    
            
            if(array_key_exists('tipoCostos',$_POST)){
                actualizarDatosCostosIndirectos();
            }
        } elseif($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1' or $urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=2'){
            $sql="select * from registrocostosindirectos_costosindirectos where registroCostosIndirectos_idregistroCostosIndirectos = $idRegistro";
            $miconexion->consulta($sql);
            $listaUser = $miconexion->consultaListaPrueba();


            $sql="select nombre from costosindirectos where idcostosIndirectos = $listaUser[2]";
            $miconexion->consulta($sql);
            $listaCosto = $miconexion->consultaLista3();
            echo <<< EOT
            <main class="content">
            <h2 class="titulo">Fornmulario de actualización de costos indirectos de la Cosecha</h2>
            Producto: $listaCosto[0]
            <form method="post" autocomplete="off">
            <input type="hidden" name="idRegistro" value = $listaUser[0]><br>
            Precio costo indirecto
            <input type="text" name="costo" placeholder="Ingrese el precio" value = $listaUser[4]><br>
            <input type="submit" value="Actualizar">
            </form>
            </main>
            EOT;
    
            if(array_key_exists('costo',$_POST)){
                actualizarDatosCostosIndirectosCosecha();
                
                if($urlFrom == '/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1'){
                    echo "<script>location.href='/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=1&idCosecha=$idCosecha'</script>";
                }else{
                    echo "<script>location.href='/CamaroneraCaspiemar/proyecto/includes/registroCostoIndirecto.php?fase=2&idCosecha=$idCosecha'</script>";
                }
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
       echo "<script>location.href='gestionarBDmateriaPrima.php'</script>";
    }

    function actualizarDatosMateriaPrimaCosecha(){
        $id = $_POST["idRegistro"];
        $cantidad = $_POST["cantidad"];
        $costoUnitario = $_POST["costoUnitario"];
        $total = $cantidad * $costoUnitario;
        $sql="update registromateriaprima_materiaprima set cantidad = '$cantidad', costoUnitario = '$costoUnitario', total = '$total' where registroMateriaPrima_idregistroMateriaPrima = '$id'";
        global $miconexion;
        $miconexion->consulta($sql);
   
       #echo "<script>alert('Datos actualizados....') </script>";
       #echo "<script>location.href='materiaPrimaCosecha.php'</script>";
    }

    
    function actualizarDatosCostosIndirectos(){
        $id = $_POST["idRegistro"];
        $tipo = $_POST["tipoCostos"];
        $nombre = $_POST["nombre"];


        $sql="update costosIndirectos set nombre = '$nombre',tipo = '$tipo' where idcostosIndirectos = '$id'";

        global $miconexion;
        $miconexion->consulta($sql);
   
       #echo "<script>alert('Datos actualizados....') </script>";
       echo "<script>location.href='costosIndirectos.php'</script>";
    }



    function actualizarDatosCostosIndirectosCosecha(){
        $id = $_POST["idRegistro"];
        $costo = $_POST["costo"];


        $sql="update registrocostosindirectos_costosindirectos set totalCostoIndirecto = '$costo' where idRelacionCindirectos = '$id'";

        global $miconexion;
        $miconexion->consulta($sql);
   
    }

    include("piePagina.php");

?>