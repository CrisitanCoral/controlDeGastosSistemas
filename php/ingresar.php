<?php
    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="bd_gestiongastos";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

    /*
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
    */
    
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        header("ranking.php?correo_ensesion=" . $_POST['correo']);
        header ('snake.html' .$correo.'ingresar.php');

        $var_consulta= "select * from usuarios where correo='$correo' and clave='$clave'";
        $var_resultado = $obj_conexion->query($var_consulta);

            if($var_resultado->num_rows>0)
            {
                header("Location:juego.html");
            } else {
    
                echo '<script language="javascript">alert("Error en la autentificacion. Correo o clave errado/a");window.location.href="login.html"</script>';
          }

?>