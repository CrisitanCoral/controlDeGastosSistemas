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

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$usuarios="SELECT * FROM historico_facturas";

$resUsuarios=$conexion->query($usuarios);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
	<link rel="shortcut icon" href="img\icon.svg">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Historico</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/estilos.css'>
    <script src='js/app.js'></script>
</head>
<body>  

<!--/////////////////////// ENCABEZADO ////////////////////////-->

<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		
		<a class="navbar-brand" href="home.php">
			<img src="img/icon.svg" width="30" height="30" alt="">
			GESTOR FACTURAS
		</a>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="home.php">FACTURAS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="php/proveedores.php">PROVEEDORES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="php/usuarios.php">USUARIOS</a>
					</li>
				</ul>
				<a class="btn btn-outline-warning my-2 my-sm-0" href="php/cerrar_sesion.php">CERRAR SESION</a>
			</div>
		</nav>
	  </header>

<!--/////////////////////// TABLA VENCIMIENTO ////////////////////////-->

<table id="tabla_facturas" class="table table-striped table-dark">
				<tr>
					<th>NUMERO FACTURA</th>
					<th>ESTADO</th>
					<th>PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
					<th>CONCEPTO</th>
					<th>VALOR PAGADO</th>
					<th>FACTURA</th>
				</tr>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				
				{
					
					echo'<tr>
						<td>'.$registroUsuarios['NUMERO_FACTURA'].'</td>
						<td>'.$registroUsuarios['ESTADO_FACTURA'].'</td>
						<td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						<td>'.$registroUsuarios['FECHA_EMISION'].'</td>
						<td>'.$registroUsuarios['FECHA_VENCE'].'</td>
						<td>'.$registroUsuarios['CONCEPTO'].'</td>
						<td>'."$ ".$registroUsuarios['VALOR'].'</td>
						<td><a href="'.$registroUsuarios['ARCHIVO'].'" target="_blank"><img src="img/pdf.png" width="60" height="50" alt=""></a></td>
            		</tr>';
				}
				?>
			</table>
    </body>
</html>