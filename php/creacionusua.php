<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>
	<meta charset="utf-8">
  	<link rel="shortcut icon" href="../img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>
		<div id="contenedorRegistro" class="col-sm-12">
				<form action="registro_usuarios_interno.php" method="POST">
			
				
					<h2>CREAR USUARIOS</h2>

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
							  	<input type="submit" value="CREAR" class="btn btn-primary col-sm-4">
								<button type="button" onclick=" location.href='usuarios.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
				  			</div>
					</form>
		</div>
	<section id="imagenFinal">
      <img src="../img\tvnovedades.jpg">
    </section>
</body>
