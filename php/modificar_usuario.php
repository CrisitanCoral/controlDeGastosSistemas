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
        
		$id=$_POST['id'];
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        $clave2=$_POST['clave2'];
        $fecha_modificacion=date('Y-m-d H:i:s');

        $var_consulta= "select * from usuarios where correo_usuario='$correo'";
        $var_resultado = $obj_conexion->query($var_consulta);

            if($clave == $clave2)
            {
            // $clave= hash('sha512', $clave);
            $sql="UPDATE usuarios 
				SET NOMBRE_USUARIO = '$nombres',
				APELLIDO_USUARIO = '$apellidos', 
				CORREO_USUARIO = '$correo',
				CLAVE_USUARIO = '$clave',
				FECHA_MODIFICACION = '$fecha_modificacion'
				WHERE ID_USUARIO = '$id'";

                if ($obj_conexion->query($sql) === TRUE) 
                {
                echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="usuarios.php"</script>';
                } 
                    else 
                    {
                    echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                    }
            }
            else 
            {
            echo '<script language="javascript">alert("Las contraseñas ingresadas no coinciden");window.location.href="usuarios.php"</script>';
            }
?>