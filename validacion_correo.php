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

$usuarios="SELECT * FROM facturas";

$resUsuarios=$conexion->query($usuarios);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
	<link rel="shortcut icon" href="img\icon.svg">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Notificaciones</title>
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
				<a class="btn btn-outline-success my-2 my-sm-0" href="php/cerrar_sesion.php">CERRAR SESION</a>
			</div>
		</nav>
	  </header>

<!--/////////////////////// TABLA VENCIMIENTO ////////////////////////-->

<table id="tabla_facturas" class="table table-dark">
				<tr>
					<th>NUMERO FACTURA</th>
					<th>PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
                    <th>ACTUAL</th>
					<th>AYER</th>
					<th>HOY</th>
					<th>MAÑANA</th>
					<th>ESTATUS</th>
				</tr>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				
				{
                    $actual = date('Y-m-d h:i a');
                    $hoyRaro = date('Y-m-d');
                    $hoy = date("Y-m-d",strtotime($hoyRaro."- 1 days")); 
                    $ayer = date("Y-m-d",strtotime($hoy."- 1 days")); 
                    $por_vencer = date("Y-m-d",strtotime($hoy."+ 3 days")); 
                    $manana = date("Y-m-d",strtotime($hoy."+ 1 days")); 
                    $factura= $registroUsuarios['NUMERO_FACTURA'];
                    $nit= $registroUsuarios['NIT_PROVEEDOR'];
                    $emision= $registroUsuarios['FECHA_EMISION'];
                    $vence= $registroUsuarios['FECHA_VENCE'];
                    $concepto= $registroUsuarios['CONCEPTO'];
                    $valor= $registroUsuarios['VALOR'];

                    if ($vence == $hoy){
                        $estatus= '<font color="yellow">VENCE HOY</font>';
                    } else if ($vence <= $ayer) {
                        $estatus= '<font color="red">VENCIDO</font>';
                      } else if ($vence == $por_vencer) {
                        //// $estatus= '<font color="cyan"> CORREO ENVIADO</font>';
                        $estatus= '<a class="btn btn-info" onclick= href="enviar_correo.php?id='.$registroUsuarios['NUMERO_FACTURA'].'">Correo</button>';
                        } else if ($vence >= $manana){
                            $estatus= '<font color="green"> POR VENCER </font>';
                            }

					echo'<tr>
						 <td>'.$registroUsuarios['NUMERO_FACTURA'].'</td>
						 <td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_EMISION'].'</td>
						 <td>'.$registroUsuarios['FECHA_VENCE'].'</td>
                         <td>'.$actual.'</td>
						 <td>'.$ayer.'</td>
						 <td>'.$hoy.'</td>
						 <td>'.$manana.'</td>
						 <td>'.$estatus.'</td>
                         </tr>';
				}
				?>
			</table>
    </body>
</html>