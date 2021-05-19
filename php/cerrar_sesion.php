<?php
    session_start();
    session_destroy();
    echo '<script language="javascript">alert("Sesion Cerrada Correctamente");window.location.href="../index.php"</script>';
?>