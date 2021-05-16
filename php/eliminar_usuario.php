<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="gestor_facturas";

$conexion= new mysqli($host, $usuario, $contraseña, $base);

$id= $_GET["id"];
$eliminar="DELETE FROM usuarios WHERE ID_USUARIO = '$id'";
$resEliminar=$conexion->query($eliminar);

if ($resEliminar){
    echo '<script language="javascript">alert("Se elimino correctamente el usuario");window.location.href="usuarios.php"</script>';
} else {
    echo '<script language="javascript">alert("No se pudo eliminar el usuario");window.location.href="usuarios.php"</script>';
}

?>