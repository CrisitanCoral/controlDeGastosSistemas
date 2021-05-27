function enviarCorreo(factura) {
    var id = new String(factura);
    window.open("../enviarcorreo.php?factura=" + id, '_blank');
    location.reload();
    }