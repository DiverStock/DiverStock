function validar(){
	var nombre, descripcion, cantidad;
	nombre= document.getElementById("nombre").value;
	descripcion= document.getElementById("descripcion").value;
	cantidad= document.getElementById("can").value;
	expre=/[a-zA-Z]/;

	if (nombre === "" || descripcion === "" || cantidad === "") {
		alert("Todos los campos son obligatorios ");
		return false;
	} else {
		if (nombre.length>25) {
			alert("El nombre es muy largo");
			return false;
		} else {
               if (!expre.test(nombre)) {
                      alert("Los nombre no contienen números y/o caracteres especiales");
			return false;
               } else {

			if (descripcion.length>80) {
			alert("La descripción debe de ser mas corta");
			return false;
		    } else {
		    	          	if (!expre.test(descripcion)) {
			           alert("La descripcion no puede tener números y/o caracteres especiales");
			           return false;
		               } else {

		               	if (cantidad.length>4) {
			           alert("La cantidad de objetos es muy grande");
			           return false;
		               } else {
                               if (isNaN(cantidad)) {
			           alert("En la cantidad no se aceptan letras");
			           return false;
		               } 
		               }
		           }
		}
		}
	}

}
}

function sololetras(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=" abcdefghijklmnñopqrstuvwxyz";
	especiales="8-37-38-46-164";
	teclado_especial=false;

	for (var i in especiales) {
		if (key==especiales[i]) {
			teclado_especial=true;break;
		}
	}
	if (letras.indexOf(teclado)==-1 && !teclado_especial) {
		return false;
	}
}