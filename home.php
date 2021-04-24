<?php

  session_start();

  if(!isset($_SESSION['usuario'])){
    echo '
      <script>
        alert("Por favor inicia sesión");
        window.location = "index.php";
      </script>
    ';
    // header("location: index.php");
    session_destroy();
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Control Gastos Sistemas</title>
    <link rel="shortcut icon" href="img\icon.svg">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='js/app.js'></script>
</head>
<body>  <div id="contorno">

  <div>
    <header>
      <div id="header">
        <nav>
          <a href="#" id="menu-icon">
          </a>
          <ul>
            <li>
              <a href="home.html" class="current">
                Inicio
              </a>
            </li>
            <li>
              <a href="creacioprov.html" class="current">
                Crear Proveedor
              </a>
            </li>
            <li>
              <a href="creacionfac.html" class="current">
                Crear Facturas
              </a>
            </li>
            <li>
              <a href="buscarprov.html" class="current">
                Ver facturas
              </a>
            </li>
             <li>
              <a href="buscarprov.html" class="current">
                Ver Proveedores
              </a>
            </li>
            <li>
              <a href="index.html" class="current">
                Gestionar Facturas
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
</body>
</html>
