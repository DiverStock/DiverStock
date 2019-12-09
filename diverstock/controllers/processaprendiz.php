<?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
$aErrores = array();
     $aMensajes = array();
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

   $cod="";
	$nombree="";
	$apellidoo="";
	$correoo="";
	$celularr="";
	$carreraa="";
	$fichaa="";


if (isset($_POST['save'])) {
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	$genero=$_POST['genero'];
	$estado="A";
	$celular=$_POST['celular'];
	$fecha=$_POST['fecha'];
	$carrera=$_POST['carrera'];
	$ficha=$_POST['ficha'];
	$q="";
	$w="";
	//if (empty($nombre) || empty($descripcion) || empty($can)) {
	//	$message="<p class='error'>* Hay campos vacios</p>";
	//	header("Location: ../view/elementos.php");
	//}
	//else{
         $datos=array("numidentifi_persona"=>$cedula,"nombre"=>$nombre,"apellido"=>$apellido,"correo"=>$correo,"genero"=>$genero,"estado"=>$estado,"celular"=>$celular,"fecha_nacimiento"=>$fecha,"especialidad"=>$carrera,"ficha"=>$ficha,"materia_explica"=>$q,"cargo_de_bienestar"=>$w );
         $statement=$mysqli->prepare("CALL insertarpersona(?,?,?,?,?,?,?,?,?,?,?,?)");
         $statement->bind_param("isssssississ",$datos["numidentifi_persona"],$datos["nombre"],$datos["apellido"],$datos["correo"],$datos["genero"],$datos["estado"],$datos["celular"],$datos["fecha_nacimiento"],$datos["especialidad"],$datos["ficha"],$datos["materia_explica"],$datos["cargo_de_bienestar"]);
        $statement->execute();
         $_SESSION['message']="¡El registro ha sido guardado!";
	 $_SESSION['msg_type']="éxito";
        header("Location:../view/aprendiz.php"); 
   // }
        $clave="12345678";
        $rol="1";
        $usuario=array("nombre"=>$correo,"clave"=>$clave,"numidentifi_persona"=>$cedula, "rol"=>$rol);
        $guardar=$mysqli->prepare("CALL insertarloginusuario(?,?,?,?)");
        $guardar->bind_param("ssii",$usuario["nombre"],$usuario["clave"],$usuario["numidentifi_persona"],$usuario["rol"]);
        $guardar->execute();
}


if (isset($_GET['delete'])) {
	 $id=$_GET['delete'];

      $usu= array( "numidentifi_persona"=> $id,"f"=>"");
	  $statement=$mysqli->prepare("CALL eliminarusuario(?)");
	  $statement->bind_param("i",$usu["numidentifi_persona"]);
      $statement->execute();


      $datos= array( "id_elemento"=> $id,"f"=>"");
	  $statement=$mysqli->prepare("CALL eliminarpersona(?)");
	  $statement->bind_param("i",$datos["id_elemento"]);
      $statement->execute();

	 //$mysqli->query("DELETE FROM inventario WHERE idinventario=$id") or die($mysqli->error());
    
     $_SESSION['message']="¡El registro ha sido eliminado!";
	 $_SESSION['msg_type']="peligro";

     header("Location:../view/aprendiz.php");

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
	$carreraa=$row['especialidad'];
	$fichaa=$row['ficha'];      
	//}
     }

    
 ?>