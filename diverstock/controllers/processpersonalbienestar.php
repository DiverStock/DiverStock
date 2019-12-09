<?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));

   $cod="";
	$nombree="";
	$apellidoo="";
	$correoo="";
	$celularr="";
	$cargoo="";


if (isset($_POST['save'])) {
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$genero=$_POST['genero'];
	$estado="A";
	$celular=$_POST['celular'];
	$fecha=$_POST['fecha'];
	$carrera="";
	$ficha="";
	$q="";
	$cargo=$_POST['cargo'];
	//if (empty($nombre) || empty($descripcion) || empty($can)) {
	//	$message="<p class='error'>* Hay campos vacios</p>";
	//	header("Location: ../view/elementos.php");
	//}
	//else{
         $datos=array("numidentifi_persona"=>$cedula,"nombre"=>$nombre,"apellido"=>$apellido,"correo"=>$correo,"genero"=>$genero,"estado"=>$estado,"celular"=>$celular,"fecha_nacimiento"=>$fecha,"especialidad"=>$carrera,"ficha"=>$ficha,"materia_explica"=>$q,"cargo_de_bienestar"=>$cargo );
         $statement=$mysqli->prepare("CALL insertarpersona(?,?,?,?,?,?,?,?,?,?,?,?)");
         $statement->bind_param("isssssississ",$datos["numidentifi_persona"],$datos["nombre"],$datos["apellido"],$datos["correo"],$datos["genero"],$datos["estado"],$datos["celular"],$datos["fecha_nacimiento"],$datos["especialidad"],$datos["ficha"],$datos["materia_explica"],$datos["cargo_de_bienestar"]);
        $statement->execute();
         $_SESSION['message']="¡El registro ha sido guardado!";
	 $_SESSION['msg_type']="éxito";
        header("Location:../view/personalbienestar.php"); 
   // }
}


if (isset($_GET['delete'])) {
	 $id=$_GET['delete'];

      $datos= array( "id_elemento"=> $id,"f"=>"");
	  $statement=$mysqli->prepare("CALL eliminarpersona(?)");
	  $statement->bind_param("i",$datos["id_elemento"]);
      $statement->execute();

	 //$mysqli->query("DELETE FROM inventario WHERE idinventario=$id") or die($mysqli->error());
    
     $_SESSION['message']="¡El registro ha sido eliminado!";
	 $_SESSION['msg_type']="peligro";

     header("Location:../view/personalbienestar.php");

}

if (isset($_GET['edit'])) {
	 $id = $_GET['edit'];
	
	 $result = $mysqli->query("CALL consultareditpersona ('".$id."')") or die($mysqli->error());
	// if (count($result)==1) {
		$row=$result->fetch_array();
		$cod=$row['numidentifi_persona'];
		$nombree=$row['nombre'];
	$apellidoo=$row['apellido'];
	$correoo=$row['correo'];
	$celularr=$row['celular'];
	$cargoo=$row['cargo_de_bienestar'];     
	//}
     }

    
 ?>