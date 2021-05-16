<?php

session_start();

if(!isset($_SESSION['usuario'])){
  echo '
	<script>
	  alert("Por favor inicia sesión");
	  window.location = "../index.php";
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

$where="";
$email = $_POST['correo'];

////////////////////// BOTON BUSCAR //////////////////////////////////////
if(!empty($email)){
    $where .=" AND CORREO_USUARIO like '%".$email."%'";
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$usuarios="SELECT * FROM usuarios WHERE 1=1 $where ";

$resUsuarios=$conexion->query($usuarios);

if(mysqli_num_rows($resUsuarios)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
	<title>GESTION DE USUARIOS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="../img\icon.svg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css\styles.css">
	</head>
	<body>
		
		<section>
			<form method="POST">
				<div class="row">
						<div class="col-sm-4"></div>
					</br>
						<div class="col-sm-6">
						</br> </br>
								<h2>GESTION DE USUARIOS</h2>
						</div>
						<div class="col-sm-4"></div>
				</div>
				<div class="row">

				<div class="col-sm-4"></div>
				<div class="col-sm-4">
				<div class="form-group">
					<label for="correo"> Correo del usuario:</label>
					<input type="text" class="form-control" placeholder="Ingrese correo del usuario" name="correo" value="">
				</div>
			</div>
				<div class="col-sm-8"></div>
		</div>
	<div class="row">
			<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<input type="submit" name= "buscar" value="BUSCAR" class="btn btn-primary col-sm-4">
					<button type="button" onclick=" location.href='../home.php' "class="btn btn-secondary col-sm-4 ">CANCELAR</button">
			</div>
			</br></br></br></br>
		<div class="col-sm-6"></div>
	</div>
			</form>
			<table id="tabla" class="table table-striped">
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>CORREO</th>
					<th>CLAVE</th>
					<th>FECHA DE REGISTRO</th>
					<th>ULTIMA ACTUALIZACIÓN</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr>

				<?php

				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
						 <td>'.$registroUsuarios['ID_USUARIO'].'</td>
						 <td>'.$registroUsuarios['NOMBRE_USUARIO'].'</td>
						 <td>'.$registroUsuarios['APELLIDO_USUARIO'].'</td>
						 <td>'.$registroUsuarios['CORREO_USUARIO'].'</td>
						 <td>'.$registroUsuarios['CLAVE_USUARIO'].'</td>
						 <td>'.$registroUsuarios['FECHA_CREACION'].'</td>
						 <td>'.$registroUsuarios['FECHA_MODIFICACION'].'</td>
						 <td> <a class="btn btn-warning onclick="href="actualizar_usuario.php?id='.$registroUsuarios['ID_USUARIO'].'">Editar</button></td>
						 <td> <a class="btn btn-danger table__item__link" onclick= href="eliminar_usuario.php?id='.$registroUsuarios['ID_USUARIO'].'">Eliminar</button></td>
						 </tr>';
						 
				}
				?>
			</table>
		</section>
		<script src="../js\confirmacion_eliminar.js"></script>
	</body>
</html>