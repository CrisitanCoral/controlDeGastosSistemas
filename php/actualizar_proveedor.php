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
$usuarios="SELECT * FROM proveedores WHERE NIT_PROVEEDOR = '$id'";
$resUsuarios=$conexion->query($usuarios);
?>

<!DOCTYPE html>
<html>
<head>
	<title>MODIFICACION</title>
	<meta charset="utf-8">
  	<link rel="shortcut icon" href="../img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>


				<?php
				while ($registroUsuarios = $resUsuarios->fetch_array(MYSQLI_BOTH))
                {
                $nombre= $registroUsuarios['NOMBRE_PROVEEDOR'];
                $telefono= $registroUsuarios['TELEFONO_PROVEEDOR'];
                $direccion= $registroUsuarios['DIRECCION_PROVEEDOR'];
                $correo= $registroUsuarios['CORREO_PROVEEDOR'];
                $fecha_creacion= $registroUsuarios['FECHA_CREACION'];
                }
				?>
		</div>

		<div id="contenedorRegistro" class="col-sm-12">
				<form action="modificar_proveedor.php" method="POST">
				
				
					<h2>ACTUALIZAR PROVEEDOR</h2>

						<div class="form-group">
					      <label for="nit">Nit del Proveedor *:</label>
					      <input type="text" class="form-control" id="nit" placeholder="Ingrese NIT del Proveedor de factura" name="nit" size="40" required="true" readonly="readonly" value="<?php echo $id; ?>">
					    </div>
				 		
				 		<div class="form-group">
					      <label for="nombres">Razón Social *:</label>
					      <input type="text" class="form-control" id="nombres" placeholder="Ingrese Razon Social" name="nombres" size="40" required="true" value="<?php echo $nombre; ?>">
					    </div>

					    <div class="form-group">
					      <label for="telefono">Telefono *:</label>
					      <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono del proveedor" name="telefono" size="40" required="true" value="<?php echo $telefono; ?>">
					    </div>

						<div class="form-group">
							<label for="direccion_prov">Dirección *:</label>
							<input type="text" class="form-control" id="direccion_prov" placeholder="Ingrese la direccion del proveedor" name="direccion" size="40" required="true" value="<?php echo $direccion; ?>">
						  </div>

					    <div class="form-group">
					      <label for="email">Correo Electronico*:</label>
					      <input type="text" class="form-control" id="email_prov" placeholder="Ingrese el correo del proveedor" name="correo" size="40" required="true" value="<?php echo $correo; ?>">
					    </div>

					    </br>
					    	<div>
							  	<input type="submit" value="Actualizar" class="btn btn-primary col-sm-4">
								<button type="button" onclick=" location.href='proveedores.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
				  			</div>
				</form>
			</div>
		</body>
</html>