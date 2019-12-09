<?php 
if (isset($_POST['save'])) {
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$can=$_POST['can'];
	if (empty($nombre)) {
		echo "<p class='error'>* Agregar nombre de implemento</p>";
	}
	else{
		if(strlen($nombre)>15){
		echo "<p class='error'>* El nombre es muy largo</p>";
	 }else{
	 	function solo_letras($nombre){
$permitidos = "abcdefghijklmñnopqrstuvwxyzABCDEFGHIJKLMÑNOPQRSTUVWXYZ ";
for ($i=0; $i<strlen($cadena); $i++){
if (strpos($permitidos, substr($cadena,$i,1))===false){
//no es válido;
return false;
echo "<p class='error'>* El nombre no permite numeros y/o caracters especiales</p>";
}
} 
//si estoy aqui es que todos los caracteres son validos
return true;
} 
	 }
    }
	if (empty($descripcion)) {
		echo "<p class='error'>* Agregar descripcion de implemento</p>";
	}
	if (empty($can)) {
		echo "<p class='error'>* Agregar cantidad de implemento</p>";
	}
	else{
		if(!is_numeric($can)){
			echo "<p class='error'>* La cantidad debe ser un número</p>";
		}
	}
}
?>