function enviarCorreo(factura) {
    var cadena = new String(factura);
    window.open("/GastosSistemas/enviar_correo.php?id=" + cadena, '_blank');
    location.reload();
    }