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
        $fecha_actualizacion=date('Y-m-d H:i:s');
        $estado= 'SIN PAGAR';
        $rutabase="facturas/".$_FILES['factura']['name'];
        $ruta="../facturas/".$_FILES['factura']['name'];
        $factura1=$_FILES['factura']['tmp_name'];


        $var_consulta= "SELECT * FROM facturas WHERE NUMERO_FACTURA='$id'";
        $var_consulta1= "SELECT * FROM historico_facturas WHERE NUMERO_FACTURA='$id'";

        $var_resultado = $obj_conexion->query($var_consulta);
        $var_resultado1 = $obj_conexion->query($var_consulta1);

        if($var_resultado->num_rows>0)
        {
        echo '<script language="javascript">alert("Ya existe una factura con ese numero");window.location.href="../home.php"</script>';
        } 
        else if ($var_resultado1->num_rows>0)
        {
        echo '<script language="javascript">alert("Ya existe una factura PAGA con ese numero");window.location.href="historico.php"</script>';
            } else {
                $sql="INSERT INTO facturas VALUES( '$id','$nit','$fecha_emision','$fecha_vence','$concepto','$valor','$fecha_actualizacion','$estado','$rutabase')";
                move_uploaded_file($factura1,$ruta);

                    if ($obj_conexion->query($sql) === TRUE) 
                    {
                    echo '<script language="javascript">alert("Los datos se almacenaron correctamente");window.location.href="../home.php"</script>';
                    } 
                        else 
                        {
                        echo "Error al almacenar los datos: " . $sql . "<br>" . $obj_conexion->error;
                    }
            }
?>