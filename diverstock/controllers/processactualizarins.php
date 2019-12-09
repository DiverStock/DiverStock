<?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));

 if (isset($_POST ['update'])) {

     		$codigo=$_POST['cod'];
	$nombree=$_POST['nombree'];
	$apellidoo=$_POST['apellidoo'];
	$correoo=$_POST['correoo'];
	$celularr=$_POST['celularr'];
	$materiaa=$_POST['materiaa'];

        $datos= array("numidentifi_persona"=> $codigo, "nombre"=> $nombree, "apellido"=> $apellidoo, "correo"=> $correoo,"celular"=>$celularr,"materia"=>$materiaa);
	$statement=$mysqli->prepare("CALL actualizarpersonatwo(?,?,?,?,?,?)");
	$statement->bind_param("isssis",$datos["numidentifi_persona"], $datos["nombre"], $datos["apellido"], $datos["correo"],$datos['celular'],$datos['materia']);
    $statement->execute();

	 //$mysqli->query("CALL consultareditinventario ('".$codigoo."','".$cantidadd."','".$estadoo."','".$descripcionn."')") or die($mysqli->error());
	  $_SESSION['message']="¡El registro ha sido actualizado!";
	 $_SESSION['msg_type']="advertencia";
	  header("Location:../view/instructor.php");
     }
 ?>