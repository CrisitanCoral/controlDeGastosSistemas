

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Control Gastos Sistemas</title>
    <link rel="shortcut icon" href="img\icon.svg">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='js/app.js'></script>
</head>
<body>    
    <div id="contenedorPrimario" class="col-sm-4">	
        <div class="container-fluid">
            <form action="php/ingresar_usuario.php" method="POST">
                    <h2>LOGIN</h2>
                </br>
                        <div class="form-group">
                          <label for="correo">Correo Electronico *:</label>
                          <input type="email" class="form-control" id="correo" placeholder="Ingrese correo" name="correo" size="40" required="true">
                        </div>

                        <div class="form-group">
                          <label for="clave">Contraseña *:</label>
                          <input type="password" class="form-control" id="clave" placeholder="Ingrese contraseña" name="clave" size="40" required="true">
                        </div>

                    </br>
                        <div>
                            <input type="submit" value="Ingresar" class="btn btn-primary col-sm-4">
                            <button type="button" onclick=" location.href= 'https://tvnovedades.com.co/' "class="btn btn-secondary col-sm-4">Cancelar</button">
                        </div>  
                      <p id="registrese" class="regtext">¿No estas registrado? <a href="registro.html" >Registrate Aquí</a>!</p>
            </form>
        </div>
    </div>
<section id="imagenFinal">
  <img src="img\tvnovedades.jpg">
</section>
</body>
</html>
