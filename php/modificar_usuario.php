<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);

$id =$_GET["id"];
$usuarios="select * from usuarios WHERE ID_USUARIO = '$id'";

$resUsuarios=$conexion->query($usuarios);

?>
<html lang="es">

	<head>
	<title>ACTUALIZAR USUARIOS</title> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="../img\icon.svg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<section>
			<div class="row">
					<div class="col-sm-4"></div>
				</br>
					<div class="col-sm-6">
					</br> </br>
							<h2>ACTUALIZAR DATOS DE USUARIO</h2>
                            </br></br>
					</div>
					<div class="col-sm-4"></div>
			</div>
			<div class="row">

    <div class="col-sm-2"></div>
</div>

<form action="actualizar_usuario.php" method="POST">
				
				
					<h2>REGISTRESE</h2>

						<div class="form-group">
					      <label for="nombres">Nombres *:</label>
					      <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" size="40" required="true">
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
		</section>
	</body>
</html>