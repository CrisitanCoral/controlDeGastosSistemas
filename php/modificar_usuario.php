<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);

$id= $_GET["id"];
$usuarios="SELECT * FROM usuarios WHERE ID_USUARIO = '$id'";
$resUsuarios=$conexion->query($usuarios);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="../css\styles.css">
	</head>
	<body>
		
    <div class="container home">    
    <h2>ACTUALIZACIÓN DE USUARIOS</h2>      
    <table id="data_table" class="table table-striped">
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>CORREO</th>
					<th>CLAVE</th>
					<th>FECHA DE REGISTRO</th>
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
                         </tr>';
				}
				?>
			</table>
</div>
	</body>
</html>