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

<!DOCTYPE html>
<html>
<head>
	<title>REGISTRESE</title>
	<meta charset="utf-8">
  	<link rel="shortcut icon" href="img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>

<div class="container home">   
	<div class="row">
					<div class="col-sm-2"></div>
				</br>
					<div class="col-sm-6">
					</br> </br>
						<h2> ACTUALIZACIÓN DE USUARIOS</h2> 
						</br></br>
					</div>
					<div class="col-sm-4"></div>
			</div>

	<div class="col-sm-16">    
    <table id="tabla_datos" class="table table-striped">
				<tr>
					<th>ID</th>
					<th>NOMBRES</th>
					<th>APELLIDOS</th>
					<th>CORREO</th>
					<th>CLAVE</th>
					<th>FECHA DE REGISTRO</th>
					<th>FECHA DE MODIFICACION</th>
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
					</tr>';
}
				?>
			</table>
			</div>
		</div>

		<div id="contenedorRegistro" class="col-sm-12">
				<form action="modificar_usuario.php" method="POST">
			
                        <div class="form-group">
					      <label for="id">Id Usuario *:</label>
					      <input type="text" class="form-control" id="id" name="id" size="40" required="true" readonly="readonly" value="<?php echo $id; ?>">
					    </div>

						<div class="form-group">
					      <label for="nombres">Nombres *:</label>
					      <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" size="40" required="true" value="">
					    </div>
				 		
				 		<div class="form-group">
					      <label for="apellidos">Apellidos *:</label>
					      <input type="text" class="form-control" id="apellidos" placeholder="Ingrese apellidos" name="apellidos" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="correo">Correo Electronico *:</label>
					      <input type="email" class="form-control" id="correo" placeholder="Ingrese correo" name="correo" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="clave">Contraseña *:</label>
					      <input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="clave2">Confirmar Contraseña *:</label>
					      <input type="password" class="form-control" id="clave2" placeholder="Confirmar contraseña" name="clave2" size="40" required="true">
					    </div>

					    </br>
					    	<div>
							  	<input type="submit" value="Actualizar" class="btn btn-primary col-sm-4">
								<button type="button" onclick=" location.href='usuarios.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
				  			</div>
                    </form>
		</div>
</body>
