<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);

$id= $_GET["id"];
$eliminar="DELETE FROM facturas WHERE NUMERO_FACTURA = '$id'";
$resEliminar=$conexion->query($eliminar);

if ($resEliminar){
    echo '<script language="javascript">alert("Se elimino correctamente la factura");window.location.href="../home.php"</script>';
} else {
    echo '<script language="javascript">alert("No se pudo eliminar la factura");window.location.href="../home.php"</script>';
}

?>