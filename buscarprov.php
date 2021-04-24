<?php

error_reporting(E_ALL ^ E_NOTICE);
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion->
mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where=" ";
$nombres=$_POST['nombres'];
$email=$_POST['correo'];

////////////////////// BOTON BUSCAR //////////////////////////////////////
if (isset($_POST['buscar'])){

if(!empty($nombres)){
$where .=" AND nombres like '%".$nombres."%'";
}
if(!empty($email)){
$where .=" AND correo_electronico like '%".$email."%'";

}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$proveedores="select * from proveedores where 1=1 $where ";

$resProveedor=$conexion->query($proveedores);

if(mysqli_num_rows($resProveedor)==0)
{
$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

<head>
<title>TVNOVEDADES</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<section>

<form method="post">

<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-4">

<h2>BUSQUEDA DE PROVEEDORES</h2>

</div>
<div class="col-sm-4"></div>

</div>
<div class="row">

<div class="col-sm-2"></div>
<div class="col-sm-4">

<div class="form-group">
<label for="nombres"> Nombre del proveedor:</label>
<input type="text" class="form-control" placeholder="Ingrese nombre del

proveedor" name="nombres" value="">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="correo"> Correo del proveedor:</label>
<input type="text" class="form-control" placeholder="Ingrese correo del

proveedor" name="correo" value="">
</div>
</div>
<div class="col-sm-2"></div>
</div>

<div class="row">

<div class="col-sm-2"></div>
<div class="col-sm-4">

<input type="submit" name= "buscar"

value="BUSCAR" class="btn btn-primary col-sm-4">

<button type="button" onclick="
location.href='pagina.php' "class="btn btn-secondary col-sm-4 ">CREAR</button">

</div>
<div class="col-sm-6"></div>

</div>

</form>
<table class="table">
<tr>
<th>id</th>
<th>nombres</th>
<th>apellidos</th>
<th>edad</th>
<th>correo</th>
<th>celular</th>
<th>telefono</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>

<?php

while ($registroProveedor = $resProveedor-

>fetch_array(MYSQLI_BOTH))
{

echo'<tr>
<td>'.$registroProveedor['id_proveedores'].'</td>
<td>'.$registroProveedor['nombres'].'</td>
<td>'.$registroProveedor['apellidos'].'</td>
<td>'.$registroProveedor['edad'].'</td>

<td>'.$registroProveedor['correo_electronico'].'</td>

<td>'.$registroProveedor['celular'].'</td>
<td>'.$registroProveedor['telefono'].'</td>
<td> <a class="btn btn-warning onclick="

location.href="paginaEditar.php?variable=<?php echo
$.$registroAlumnos["id_proveedores"]">Editar</button></td>

<td> <button class="btn btn-danger glyphicon

glyphicon-remove">Eliminar</button></td>
</tr>';

}
?>
</table>

<?
echo $mensaje;
?>
</section>
</body>
</html>