<?php
    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="gestor_facturas";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

        
        if($obj_conexion)
        {
            echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
        }
        else
        {
            echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
        
		$nit=$_POST['nit'];
        $nombres=$_POST['nombres'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $correo=$_POST['correo'];
        $fecha_modificacion=date('Y-m-d H:i:s');

        $var_consulta= "SELECT * FROM usuarios WHERE NIT_PROVEEDOR='$nit'";
        $var_resultado = $obj_conexion->query($var_consulta);

            // $clave= hash('sha512', $clave);
            $sql="UPDATE proveedores 
				SET NOMBRE_PROVEEDOR = '$nombres',
				TELEFONO_PROVEEDOR = '$telefono', 
				DIRECCION_PROVEEDOR = '$direccion',
				CORREO_PROVEEDOR = '$correo',
				FECHA_ACTUALIZACION = '$fecha_modificacion'
				WHERE NIT_PROVEEDOR = '$nit'";

                if ($obj_conexion->query($sql) === TRUE) 
                {
                echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="proveedores.php"</script>';
                } 
                    else 
                    {
                    echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                    }
?>