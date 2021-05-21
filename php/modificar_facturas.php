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
        $nit=$_POST['nit'];
        $fecha_emision=$_POST['fecha_emision'];
        $fecha_vence=$_POST['fecha_vence'];
        $concepto=$_POST['concepto'];
        $valor=$_POST['valor'];
        $estado_factura=$_POST['estado_factura'];
        $fecha_actualizacion=date('Y-m-d H:i:s');
        

        $var_consulta= "SELECT * FROM facturas WHERE NUMERO_FACTURA='$id'";
        $var_resultado = $obj_conexion->query($var_consulta);

            // $clave= hash('sha512', $clave);
            $sql="UPDATE facturas 
				SET NIT_PROVEEDOR = '$nit',
				FECHA_EMISION = '$fecha_emision', 
				FECHA_VENCE = '$fecha_vence',
				CONCEPTO = '$concepto',
				VALOR = '$valor',
				FECHA_ACTUALIZACION = '$fecha_actualizacion',
				ESTADO_FACTURA = '$estado_factura'
				WHERE NUMERO_FACTURA = '$id'";

                if ($obj_conexion->query($sql) === TRUE) 
                {
                echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="../home.php"</script>';
                } 
                    else 
                    {
                    echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                    }
?>