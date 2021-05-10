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
              <a href="home.php" class="current">
                Inicio
              </a>
            </li>
            <li>
              <a href="php/creacionprov.php" class="current">
                Crear Proveedor
              </a>
            </li>
             <li>
              <a href="php/proveedores.php" class="current">
                Ver Proveedores
              </a>
            </li>
            <li>
              <a href="php/creacionfac.php" class="current">
                Crear Facturas
              </a>
            </li>
            <li>
              <a href="php/usuarios.php" class="current">
                Gestion de Usuarios
              </a>
            </li>
            <li>
              <a id="cerrar_sesion" href="php/cerrar_sesion.php">
                Cerrar Sesión
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
</body>
</html>
