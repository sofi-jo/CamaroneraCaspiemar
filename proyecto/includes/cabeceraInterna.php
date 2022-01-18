<?php
    include("../dll/config.php");
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlSitio;?>styles/style.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../main.js"></script>
    <title><?php echo $nombreSitio?></title>
  </head>
  <body>
    <header>
      <nav>
        <img src="<?php echo $urlSitio; ?>images/logo.png" alt="logo"/>
        <a href="<?php echo $urlSitio; ?>includes/cosechas.php"><h3 >Iniciar Sesión</h3></a>
      </nav>
    </header>
    <nav class = "menu">
      <ul class = "tabs">
        <li><a id='cosechas' href="<?php echo $urlSitio; ?>includes/cosechas.php">Gestionar Cosechas</a></li>
        <li><a id='reportes' href="<?php echo $urlSitio; ?>includes/reportes.php">Generar Reportes</a></li>
        <li><a id='crudDB' href="<?php echo $urlSitio; ?>includes/crudDB.php">Gestionar Base de datos</a></li>
      </ul>
    </nav>
    <a class = "atras "href="javascript:history.back()"><img src="../images/atras.png" alt=""></a>
