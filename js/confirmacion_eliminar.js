function confirmacion(eliminar) {
    if (confirm("¿Está seguro que desea eliminar este usuario?")) {
        return true;
    } else {
        eliminar.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table__item__link")

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}