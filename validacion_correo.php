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
	<link rel="shortcut icon" href="../img\icon.svg">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Control Gastos Sistemas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='js/app.js'></script>
</head>
<body background= "#e9efff">  

<!--/////////////////////// ENCABEZADO ////////////////////////-->

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
			  	Gestion de Proveedores
              </a>
            </li>
            <li>
              <a href="php/usuarios.php" class="current">
                Gestion de Usuarios
              </a>
            </li>
			<li>
              <a href="php/validacion_correo.php" class="current">
                Notificaciones
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
                    $hoy = date('Y-m-d');
                    $ayer = date("Y-m-d",strtotime($hoy."- 1 days")); 
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
                        } else if ($vence >= $manana) {
                        $estatus= '<font color="green"> POR VENCER</font>';
                        } else {
                            $estatus= '<font color="green"> NORMAL </font>';
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