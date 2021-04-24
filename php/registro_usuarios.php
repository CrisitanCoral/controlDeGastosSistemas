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
        
    
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        $clave2=$_POST['clave2'];
        $fecha_creacion=date('Y-m-d H:i:s');

        $var_consulta= "select * from usuarios where correo_usuario='$correo'";
        $var_resultado = $obj_conexion->query($var_consulta);

        if($var_resultado->num_rows>0)
        {
        echo '<script language="javascript">alert("Ya existe un usuario con ese correo");window.location.href="../registro.html"</script>';
        } 
        else 
        {
            if($clave == $clave2)
            {
            // $clave= hash('sha512', $clave);
            $sql="INSERT INTO usuarios VALUES( '0', '$nombres','$apellidos', '$correo','$clave','$fecha_creacion')";

                if ($obj_conexion->query($sql) === TRUE) 
                {
                echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="../index.php"</script>';
                } 
                    else 
                    {
                    echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                    }
            }
            else 
            {
            echo '<script language="javascript">alert("Las contraseñas ingresadas no coinciden");window.location.href="../registro.html"</script>';
            }
        }
?>