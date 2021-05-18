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
    <title>Control Gastos Sistemas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='js/app.js'></script>
</head>
<body>  

<table id="tabla_facturas" class="table table-dark">
				<tr>
					<th>NUMERO FACTURA</th>
					<th>PROVEEDOR</th>
					<th>FECHA EMISION</th>
					<th>FECHA VENCE</th>
					<th>CONCEPTO</th>
					<th>VALOR A PAGAR</th>
					<th>ULTIMA ACTUALIZACION</th>
					<th>ESTATUS</th>
				</tr>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
				
				{

                    $hoy = date('Y-m-d');
                    $factura= $registroUsuarios['NUMERO_FACTURA'];
                    $nit= $registroUsuarios['NIT_PROVEEDOR'];
                    $emision= $registroUsuarios['FECHA_EMISION'];
                    $vence= $registroUsuarios['FECHA_VENCE'];
                    $concepto= $registroUsuarios['CONCEPTO'];
                    $valor= $registroUsuarios['VALOR'];

                    if ($vence == $hoy){
                        $estatus= '<font color="red">VENCE HOY</font>';
                    } else {
                        $estatus= "NO VENCIDO";
                    }

					echo'<tr>
						 <td>'.$registroUsuarios['NUMERO_FACTURA'].'</td>
						 <td>'.$registroUsuarios['NIT_PROVEEDOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_EMISION'].'</td>
						 <td>'.$registroUsuarios['FECHA_VENCE'].'</td>
						 <td>'.$registroUsuarios['CONCEPTO'].'</td>
						 <td>'."$ ".$registroUsuarios['VALOR'].'</td>
						 <td>'.$registroUsuarios['FECHA_ACTUALIZACION'].'</td>
						 <td>'.$estatus.'</td>
                         </tr>';
				}
				?>
			</table>
    </body>
</html>