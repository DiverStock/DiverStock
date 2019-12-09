<?php 
include"../../confing.php";
extract($_REQUEST);
$correo=$_POST["email"];
$contrasena=$_POST["contrasena"];
include"../../template/conexionBD.php";



$result=$mysqli->query("CALL prologin('".$correo."','".$contrasena."')") or die  ($mysqli->error);
$existe=$result->num_rows;
$row=$result->fetch_array();
if (isset($_POST["btningresar"])) {
if ($correo && $correo!="" && $contrasena!="") {
	
	if ($existe==1) {
		$_SESSION["usuario"]=$row['numidentifi_persona'];

        if ($row==true) {
        	$rol=$row['id_rol'];
        	$_SESSION['rol']=$rol;
        	rolvalidar();
        }
        if ($row==true) {
        	$usuario=$row['numidentifi_persona'];
        	$_SESSION['uses']=$usuario;
        	rolvalidar($nombre);
        }

		header("Location:".URL_PROY."app/index.php");
	}else{
		$message="Usuario no existe";
		header("Location:".URL_PROY);
	}
}else{
	header("Location:".URL_PROY);

}
}



 ?>
