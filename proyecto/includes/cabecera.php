<?php
    include("dll/config.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo $urlSitio;?>styles/style.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $nombreSitio?></title>
  </head>
  <body>
    <header>
      <nav>
        <img src="<?php echo $urlSitio; ?>images/logo.png" alt="logo" />
        <a href="<?php echo $urlSitio; ?>includes/cosechas.php"><h3 >Iniciar Sesión</h3></a>
      </nav>
    </header>