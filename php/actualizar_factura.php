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
$usuarios="SELECT * FROM facturas WHERE NUMERO_FACTURA = '$id'";
$query=mysqli_query($conexion,"SELECT NIT_PROVEEDOR, NOMBRE_PROVEEDOR FROM proveedores");

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
                $nit= $registroUsuarios['NIT_PROVEEDOR'];
                $fecha_emision= $registroUsuarios['FECHA_EMISION'];
                $fecha_vence= $registroUsuarios['FECHA_VENCE'];
                $concepto= $registroUsuarios['CONCEPTO'];
                $valor= $registroUsuarios['VALOR'];
                $fecha_actualizacion= $registroUsuarios['FECHA_ACTUALIZACION'];
                }
				?>
		</div>

		<div id="contenedorRegistro" class="col-sm-12">
        <form action="modificar_facturas.php" method="POST">
				
				
                <h2>ACTUALIZAR FACTURA</h2>

                    <div class="form-group">
                      <label for="id">Numero de factura *:</label>
                      <input type="text" class="form-control" id="id" placeholder="Ingrese número de factura" name="id" size="40" required="true" readonly="readonly" value="<?php echo $id; ?>">
                    </div>
                     

                    <div class="form-group">
                      <label for="proveedor">Proveedor *:</label>
                      <input type="text" class="form-control" id="nit" placeholder="Ingrese proveedor" name="nit" size="40" required="true" readonly="readonly" value="<?php echo $nit; ?>">
                    </div>
                    
                    <!--  Opcion
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> Proveedor *:</label>
                        <select class="form-control" id="nit" name="nit">
                        <select name="estado">
                                        <?php 
                                            while($datos = mysqli_fetch_array($query))
                                            {
                                        ?>
                                                <option value="<?php echo $datos['NIT_PROVEEDOR'] ." - ". $datos['NOMBRE_PROVEEDOR']?>"> <?php echo $datos['NIT_PROVEEDOR']." - ". $datos['NOMBRE_PROVEEDOR']?> </option>
                                        <?php
                                            }
                                        ?> 
                                        </select>
                      </div>
                   -->

                    <div class="form-group">
                      <label for="fecha_emision">Fecha de emision *:</label>
                      <input type="date" class="form-control" id="fecha_emision" placeholder="Ingrese fecha de emision" name="fecha_emision" size="40" required="true" value="<?php echo $fecha_emision; ?>">
                    </div>

                    <div class="form-group">
                        <label for="fecha_vence">Fecha de vencimiento *:</label>
                        <input type="date" class="form-control" id="fecha_vence" placeholder="Ingrese fecha de vencimiento" name="fecha_vence" size="40" required="true" value="<?php echo $fecha_vence; ?>">
                      </div>

                    <div class="form-group">
                      <label for="concepto">Concepto*:</label>
                      <input type="text" class="form-control" id="concepto" placeholder="Ingrese el Concepto" name="concepto" size="40" required="true" value="<?php echo $concepto; ?>">
                    </div>

                    <div class="form-group">
                      <label for="valor">Monto *:</label>
                      <input type="number" class="form-control" id="valor" placeholder="Ingrese el monto" name="valor" size="40" required="true" value="<?php echo $valor; ?>">
                    </div>

                    <!--  Opcion -->
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"> Estado *:</label>
                    <select class="form-control" id="estado_factura" name="estado_factura">
                        <option>SIN PAGAR</option>
                        <option>PENDIENTE</option>
                        <option>PAGADO</option>
                        <option>VENCIDO</option>
                    </select>
                    </div>
                    <!--  Opcion -->

                    </br>
                        <div>
                              <input type="submit" value="Actualizar" class="btn btn-primary col-sm-4">
                            <button type="button" onclick=" location.href='../home.php' "class="btn btn-secondary col-sm-4">Cancelar</button">
                          </div>
            </form>
			</div>
		</body>
</html>