<?php

  session_start();

  if(!isset($_SESSION['usuario'])){
    echo '
      <script>
        alert("Por favor inicia sesión");
        window.location = "../index.php";
      </script>
    ';
    // header("location: index.php");
    session_destroy();
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>CREAR FACTURA</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../img\icon.svg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css\styles.css">

</head>
<body>
		<div id="contenedorRegistro" class="col-sm-12">
				<form action="registro_facturas.php" method="POST">
				
				
					<h2>CREAR FACTURA</h2>

						<div class="form-group">
					      <label for="id">Numero de factura *:</label>
					      <input type="text" class="form-control" id="id" placeholder="Ingrese número de factura" name="id" size="40" required="true">
					    </div>
				 		
				 		<div class="form-group">
					      <label for="nit">NIT del Proveedor *:</label>
					      <input type="text" class="form-control" id="nit" placeholder="Ingrese proveedor" name="nit" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="fecha_emision">Fecha de emision *:</label>
					      <input type="date" class="form-control" id="fecha_emision" placeholder="Ingrese fecha de emision" name="fecha_emision" size="40" required="true">
					    </div>

						<div class="form-group">
							<label for="fecha_vence">Fecha de vencimiento *:</label>
							<input type="date" class="form-control" id="fecha_vence" placeholder="Ingrese fecha de vencimiento" name="fecha_vence" size="40" required="true">
						  </div>

					    <div class="form-group">
					      <label for="concepto">Concepto*:</label>
					      <input type="text" class="form-control" id="concepto" placeholder="Ingrese el Concepto" name="concepto" size="40" required="true">
					    </div>

					    <div class="form-group">
					      <label for="valor">Monto *:</label>
					      <input type="number" class="form-control" id="valor" placeholder="Ingrese el monto" name="valor" size="40" required="true">
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
</html>