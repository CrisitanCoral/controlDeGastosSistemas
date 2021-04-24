<?php
    session_start();
    
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
    
    
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        

        $var_consulta= "SELECT * FROM usuarios WHERE correo_usuario='$correo' and clave_usuario='$clave'";
        $var_resultado = $obj_conexion->query($var_consulta);

            if($var_resultado->num_rows>0)
            {   
                $_SESSION['usuario'] = $correo;
                header("Location:../home.php");
            } else {
    
                echo '<script language="javascript">alert("Error en la autentificacion. Correo o clave errado/a");window.location.href="../index.php"</script>';
          }

?>