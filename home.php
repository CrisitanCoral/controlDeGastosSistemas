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

$hoy = date('Y-m-d H:i');
$actual = strtotime ('-7 hour',strtotime($hoy));
$actual = date('Y-m-d H:i',$actual); 
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
    <script src='script.js'></script>
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
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="home.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						FACTURAS
					</a>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
							<li><a class="dropdown-item" href="php/creacionfac.php">Crear Factura</a></li>
							<li><a class="dropdown-item" href="historico.php">Historico</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="php/proveedores.php">PROVEEDORES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="php/usuarios.php">USUARIOS</a>
					</li>
				</ul>

				<ul class="nav justify-content-end">
					<li class="nav-item">
						<h4 class="nav-link active" color="yellow"><?php echo $actual?></h4>
					</li>
				</ul>
				<a class="btn btn-outline-warning my-2 my-sm-0" href="php/cerrar_sesion.php">CERRAR SESION</a>
			</div>
		</nav>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>  </header>

<!--/////////////////////// FORMULARIO DEL BUSCAR ////////////////////////-->

<form method="POST">
	</br> 
	<div class="row">
		<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="form-group" align= "center">
					<h2>GESTION DE FACTURAS</h2>
						<label for="id"> Numero de Factura:</label>
						<input class="form-control mr-sm-2" type="search" placeholder="Ingrese Numero de Factura" name="id" id="id" value="">
						</br>
						<input type="submit" name= "buscar" value="BUSCAR" class="btn btn-primary col-sm-4">
						<button type="button" onclick="location.href='home.php'" class="btn btn-secondary col-sm-4">CANCELAR</button">
				</div>
			</div> 
		<div class="col-sm-2"></div>
	</div>
</form>
			<table id="tabla_facturas" class="table table-striped">
				<tr>
					<th>NUMERO FACTURA</th>
					<th>ESTADO</th>
					<th>PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
					<th>CONCEPTO</th>
					<th>VALOR A PAGAR</th>
					<th>VENCIMIENTO</th>
					<th>EDITAR</th>
					<th>ELIMINAR</th>
				</tr>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				
				{
					$hoy = date('Y-m-d H:i');
					$actual1 = strtotime ('-7 hour',strtotime($hoy));
					$actual = date('Y-m-d',$actual1); 
                    //$hoy = date("Y-m-d",strtotime($hoyRaro."- 1 days")); 
                    $ayer = date("Y-m-d",strtotime($actual."- 1 days")); 
                    $dos_vencer = date("Y-m-d",strtotime($actual."+ 2 days")); 
                    $tres_vencer = date("Y-m-d",strtotime($actual."+ 3 days")); 
                    $manana = date("Y-m-d",strtotime($actual."+ 1 days")); 
                    $factura= $registroUsuarios['NUMERO_FACTURA'];
                    $nit= $registroUsuarios['NIT_PROVEEDOR'];
                    $emision= $registroUsuarios['FECHA_EMISION'];
                    $vence= $registroUsuarios['FECHA_VENCE'];
                    $concepto= $registroUsuarios['CONCEPTO'];
                    $valor= $registroUsuarios['VALOR'];

                    if ($vence == $actual){
                        $estatus= '<a class="btn btn-outline-warning button_letra_amarilla" onclick= href="enviar_correo1.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">HOY</button>';
                    } else if ($vence <= $ayer) {
                        $estatus= '<font color="red">VENCIDO</font>';
                      } else if ($vence == $tres_vencer) {
                        $estatus= '<a class="btn btn-outline-primary button_letra_azul" onclick= href="enviar_correo3.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">3 DIAS</button>';
                        } else if ($vence == $dos_vencer) {
							$estatus= '<a class="btn btn-outline-primary button_letra_azul" onclick= href="enviar_correo2.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">2 DIAS</button>';
							} else if ($vence >= $manana){
                            $estatus= '<font color="green"> POR VENCER </font>';
                            }

					echo'<tr>
						 <td>'.$registroUsuarios['NUMERO_FACTURA'].'</td>
						 <td>'.$registroUsuarios['ESTADO_FACTURA'].'</td>
						 <td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_EMISION'].'</td>
						 <td>'.$registroUsuarios['FECHA_VENCE'].'</td>
						 <td>'.$registroUsuarios['CONCEPTO'].'</td>
						 <td>'."$ ".$registroUsuarios['VALOR'].'</td>
						 <td>'.$estatus.'</td>
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