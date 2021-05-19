<?php

////////////////// SESION EN EL NAVEGADOR ////////////////////////////////////

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

if(isset($_POST['buscar'])){
	$nombre= $_POST['nombre'];
}

$where= "";

////////////////////// BOTON BUSCAR //////////////////////////////////////
if(!empty($nombre)){
    $where .=" AND NOMBRE_PROVEEDOR like '%".$nombre."%'";
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$usuarios="SELECT * FROM proveedores WHERE 1=1 $where ";

$resUsuarios=$conexion->query($usuarios);

if(mysqli_num_rows($resUsuarios)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
	<title>PROVEEDORES</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css\styles.css">
	</head>
	<body>
	
	<!--/////////////////////// ENCABEZADO ////////////////////////-->

  <header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		
		<a class="navbar-brand" href="../home.php">
			<img src="../img/icon.svg" width="30" height="30" alt="">
			GESTOR FACTURAS
		</a>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../home.php">FACTURAS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="proveedores.php">PROVEEDORES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="usuarios.php">USUARIOS</a>
					</li>
				</ul>
				<a class="btn btn-outline-success my-2 my-sm-0" href="php/cerrar_sesion.php">CERRAR SESION</a>
			</div>
		</nav>
	  </header>

<!--/////////////////////// FORMULARIO ////////////////////////-->


<form method="POST">
    </br>
    <div class="row">
        <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="form-group">
                    <h2 align= "center">GESTION PROVEEDORES</h2>
                       <label for="razon"> Razón Social:</label>
                         <input type="text" class="form-control" placeholder="Ingrese la Razon Social del proveedor" id="nombre" name="nombre" value="">
                        </br>
                        <input type="submit" name= "buscar" value="BUSCAR" class="btn btn-primary col-sm-4">
                        <button type="button" onclick="location.href='../home.php'" class="btn btn-secondary col-sm-4">CANCELAR</button">
                </div>
            </div> 
        <div class="col-sm-2"></div>
    </div>
</form>

<!--/////////////////////// TABLA DE PROVEEDORES ////////////////////////-->

			<table id="tabla_proveedores" class="table table-striped">
      </br>
				<tr>
					<th>NIT</th>
					<th>RAZON SOCIAL</th>
					<th>TELEFONO</th>
					<th>DIRECCION</th>
					<th>CORREO</th>
					<th>FECHA DE REGISTRO</th>
					<th>ULTIMA ACTUALIZACION</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr>

				<?php

				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				{
          
					echo'<tr>
						 <td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['NOMBRE_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['TELEFONO_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['DIRECCION_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['CORREO_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_CREACION'].'</td>
						 <td>'.$registroUsuarios['FECHA_ACTUALIZACION'].'</td>
						 <td> <a class="btn btn-warning onclick="href="actualizar_proveedor.php?id='.$registroUsuarios['NIT_PROVEEDOR'].'">Editar</button></td>
						 <td> <a class="btn btn-danger table__item__link" onclick= href="eliminar_proveedor.php?id='.$registroUsuarios['NIT_PROVEEDOR'].'">Eliminar</button></td>
						 </tr>';
				}
				?>
			</table>
		</section>
		<script src="../js\confirmacion_eliminar.js"></script>
	</body>
</html>