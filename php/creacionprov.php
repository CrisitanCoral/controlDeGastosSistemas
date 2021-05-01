<!DOCTYPE html>
<html>
<head>
	<title>CREAR PROVEEDOR</title>
	<meta charset="utf-8">
  	<link rel="shortcut icon" href="../img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>
		<div id="contenedorRegistro" class="col-sm-12">
				<form action="registro_proveedor.php" method="POST">
				
				
					<h2>CREAR PROVEEDOR</h2>

						<div class="form-group">
					      <label for="nit">Nit del Proveedor *:</label>
					      <input type="text" class="form-control" id="nit_proveedor" placeholder="Ingrese NIT del Proveedor de factura" name="nit" size="40" required="true">
					    </div>
				 		
				 		<div class="form-group">
					      <label for="nombre">Razón Social *:</label>
					      <input type="text" class="form-control" id="razon_social" placeholder="Ingrese Razon Social" name="nombre" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="telefono_prov">Telefono *:</label>
					      <input type="text" class="form-control" id="telefono_prov" placeholder="Ingrese telefono del proveedor" name="telefono" size="40" required="true">
					    </div>

						<div class="form-group">
							<label for="direccion_prov">Dirección *:</label>
							<input type="text" class="form-control" id="direccion_prov" placeholder="Ingrese la direccion del proveedor" name="direccion" size="40" required="true">
						  </div>

					    <div class="form-group">
					      <label for="email">Correo Electronico*:</label>
					      <input type="text" class="form-control" id="email_prov" placeholder="Ingrese el correo del proveedor" name="correo" size="40" required="true">
					    </div>

					    </br>
					    	<div>
							  	<input type="submit" value="Crear" class="btn btn-primary col-sm-4">
								<button type="button" onclick=" location.href='../home.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
				  			</div>
		  	</form>
		</div>
	<section id="imagenFinal">
      <img src="../img\tvnovedades.jpg">
    </section>
</body>
