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

$id= $_GET["id"];
$usuarios="SELECT * FROM usuarios WHERE ID_USUARIO = '$id'";
$resUsuarios=$conexion->query($usuarios);
?>

<!DOCTYPE html>
<html>
<head>
	<title>MODIFICACION</title>
	<meta charset="utf-8">
  	<link rel="shortcut icon" href="..img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>

<div id="contenedorRegistro" class="col-sm-12">				
				
					<h2>ACTUALIZAR USUARIO</h2>

				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
                {
                $nombre= $registroUsuarios['NOMBRE_USUARIO'];
                $apellido= $registroUsuarios['APELLIDO_USUARIO'];
                $correo= $registroUsuarios['CORREO_USUARIO'];
                $clave= $registroUsuarios['CLAVE_USUARIO'];
                $fecha_creacion= $registroUsuarios['FECHA_CREACION'];
                $fecha_registro= $registroUsuarios['FECHA_MODIFICACION'];
                }
				?>
		</div>

		<div id="contenedorRegistro" class="col-sm-12">
				<form action="modificar_usuario.php" method="POST">
			
                        <div class="form-group">
					      <label for="id">Id Usuario *:</label>
					      <input type="text" class="form-control" id="id" name="id" size="40" required="true" readonly="readonly" value="<?php echo $id; ?>">
					    </div>

						<div class="form-group">
					      <label for="nombres">Nombres *:</label>
					      <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" size="40" required="true" value="<?php echo $nombre; ?>">
					    </div>
				 		
				 		<div class="form-group">
					      <label for="apellidos">Apellidos *:</label>
					      <input type="text" class="form-control" id="apellidos" placeholder="Ingrese apellidos" name="apellidos" size="40" required="true" value="<?php echo $apellido; ?>">
					    </div>

					    <div class="form-group">
					      <label for="correo">Correo Electronico *:</label>
					      <input type="email" class="form-control" id="correo" placeholder="Ingrese correo" name="correo" size="40" required="true" readonly="readonly" value="<?php echo $correo; ?>">
					    </div>

					    <div class="form-group">
					      <label for="clave">Contraseña *:</label>
					      <input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave" size="40" required="true" value="<?php echo $clave; ?>">
					    </div>

					    <div class="form-group">
					      <label for="clave2">Confirmar Contraseña *:</label>
					      <input type="password" class="form-control" id="clave2" placeholder="Confirmar contraseña" name="clave2" size="40" required="true" value="<?php echo $clave; ?>">
					    </div>

					    </br>
					    	<div>
							  	<input type="submit" value="Actualizar" class="btn btn-primary col-sm-4">
								<button type="button" onclick=" location.href='usuarios.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
				  			</div>
                    </form>
		</div>
</body>
