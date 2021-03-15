<?php
    $cons_usuario="cristian.coral";
    $cons_contra="QWpoA1029.";
    $cons_base_datos="GESTOR_FACTURAS";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

    
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
    
    
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        header("index.php?correo_ensesion=" . $_POST['correo']);
        header ('index.html' .$correo.'ingresar.php');

        $var_consulta= "select * from usuarios where correo='$correo' and clave='$clave'";
        $var_resultado = $obj_conexion->query($var_consulta);

            if($var_resultado->num_rows>0)
            {
                header("Location:index.html");
            } else {
    
                echo '<script language="javascript">alert("Error en la autentificacion. Correo o clave errado/a");window.location.href="login.html"</script>';
          }

?>