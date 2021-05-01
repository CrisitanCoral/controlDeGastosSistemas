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
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $correo=$_POST['correo'];
        $fecha_creacion=date('Y-m-d H:i:s');

        $var_consulta= "select * from proveedores where id_proveedor='$nit'";
        $var_resultado = $obj_conexion->query($var_consulta);

        if($var_resultado->num_rows>0)
        {
        echo '<script language="javascript">alert("Ya existe un proveedores con ese nit");window.location.href="creacionprov.php"</script>';
        } 
        else 
        {
            $sql="INSERT INTO proveedores VALUES( '$nit','$nombre','$telefono','$direccion','$correo','$fecha_creacion')";

                if ($obj_conexion->query($sql) === TRUE) 
                {
                echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="creacionprov.php"</script>';
                } 
                    else 
                    {
                    echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                }
        }
?>