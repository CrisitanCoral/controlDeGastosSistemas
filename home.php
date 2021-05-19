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
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

if(isset($_POST['buscar'])){
	$id= $_POST['id'];
}

$where= "";

////////////////////// BOTON BUSCAR //////////////////////////////////////
if(!empty($id)){
    $where .=" AND NUMERO_FACTURA like '%".$id."%'";
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$usuarios="SELECT * FROM facturas WHERE 1=1 $where";

$resUsuarios=$conexion->query($usuarios);

if(mysqli_num_rows($resUsuarios)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
	<link rel="shortcut icon" href="img\icon.svg">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Control Gastos Sistemas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
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
					<li class="nav-item">
						<a class="nav-link" href="validacion_correo.php">NOTIFICACIONES</a>
					</li>
				</ul>
				<a class="btn btn-outline-success my-2 my-sm-0" href="php/cerrar_sesion.php">CERRAR SESION</a>
			</div>
		</nav>
	  </header>

<!--/////////////////////// FORMULARIO DEL BUSCAR ////////////////////////-->

<form method="POST">
	</br> 
	<div class="row">
		<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<h2 align= "center">GESTION DE FACTURAS</h2>
						<label for="id"> Numero de Factura:</label>
						<input type="text" class="form-control" placeholder="Ingrese Numero de Factura" name="id" id="id" value="">
						</br>
						<input type="submit" name= "buscar" value="BUSCAR" class="btn btn-primary col-sm-4">
						<button type="button" onclick="location.href='home.php'" class="btn btn-secondary col-sm-4">CANCELAR</button">
				</div>
			</div> 
		<div class="col-sm-2"></div>
	</div>
</form>
</br>
			<table id="tabla_facturas" class="table table-striped">
				<tr>
					<th>NUMERO FACTURA</th>
					<th>PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
					<th>CONCEPTO</th>
					<th>VALOR A PAGAR</th>
					<th>ULTIMA ACTUALIZACION</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				
				{
					echo'<tr>
						 <td>'.$registroUsuarios['NUMERO_FACTURA'].'</td>
						 <td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_EMISION'].'</td>
						 <td>'.$registroUsuarios['FECHA_VENCE'].'</td>
						 <td>'.$registroUsuarios['CONCEPTO'].'</td>
						 <td>'."$ ".$registroUsuarios['VALOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_ACTUALIZACION'].'</td>
						 <td> <a class="btn btn-warning onclick="href="php/actualizar_factura.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">Editar</button></td>
						 <td> <a class="btn btn-danger table__item__link" onclick= href="php/eliminar_factura.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">Eliminar</button></td>
						 </tr>';
				}
				?>
			</table>
		</section>
		<script src="js\confirmacion_eliminar.js"></script>
</body>
</html>