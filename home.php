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

error_reporting(E_ALL ^ E_NOTICE);
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

$where= "";
$id= $_POST['id'];

////////////////////// BOTON BUSCAR //////////////////////////////////////
if(!empty($id)){
    $where .=" AND NUMERO_FACTURA like '%".$id."%'";
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$usuarios="SELECT * FROM facturas WHERE 1=1 $where ";

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
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Control Gastos Sistemas</title>
    <link rel="shortcut icon" href="img\icon.svg">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='js/app.js'></script>
</head>
<body>  
  <div id="contorno">
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
              <a href="php/creacionfac.php" class="current">
                Crear Facturas
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

    <section>
			<form method="POST">
					<div class="col-sm-12">
					</br> </br></br> </br>
							<h2 align= "center">GESTION DE FACTURAS</h2>
					</div>
			<div class="row">

	<div class="col-sm-4"></div>
	<div class="col-sm-4">
	<div class="form-group">
		<label for="id"> Numero de Factura:</label>
		<input type="text" class="form-control" placeholder="Ingrese Numero de Factura" name="id" value="">
	</div>
</div> 
<div class="col-sm-2"></div>
</div>


<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
							<input type="submit" name= "buscar" value="BUSCAR" class="btn btn-primary col-sm-4">
							<button type="button" onclick=" location.href='home.php' "class="btn btn-secondary col-sm-4 ">CANCELAR</button">
					</div>
			</br> </br></br> </br>
					<div class="col-sm-6"></div>
			</div>

			</form>
			<table id="tabla_facturas" class="table table-striped">
				<tr>
					<th># FACTURA</th>
					<th>NIT PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
					<th>CONCEPTO</th>
					<th>MONTO</th>
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
						 <td>'.$registroUsuarios['VALOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_ACTUALIZACION'].'</td>
						 <td> <a class="btn btn-warning onclick="href="php/actualizar_factura.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">Editar</button></td>
						 <td> <a class="btn btn-danger table__item__link" onclick= href="php/eliminar_factura.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">Eliminar</button></td>
						 </tr>';
				}
				?>
			</table>
		</section>
		<script src="js\confirmacion_eliminar.js"></script>

    </header>
</body>
</html>
