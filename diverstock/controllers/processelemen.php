<?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
$aErrores = array();
     $aMensajes = array();


            
$message="";
$codigo="";
	$nombree="";
$descripcionn="";
$cann="";

if (isset($_POST['save'])) {
	$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$can=$_POST['can'];

	if (empty($nombre) || empty($descripcion) || empty($can)) {
		$message="<p class='error'>* Hay campos vacios</p>";
		header("Location: ../view/elementos.php");
	}
	else{
         $datos=array("nombre_elemen"=>$nombre, "descripcion"=>$descripcion, "stock"=>$can);
         $statement=$mysqli->prepare("CALL insertarelementos(?,?,?)");
         $statement->bind_param("ssi",$datos["nombre_elemen"], $datos["descripcion"], $datos["stock"]);
        $statement->execute();
         $_SESSION['message']="¡El registro ha sido guardado!";
	 $_SESSION['msg_type']="éxito";
        header("Location:../view/elementos.php"); 
    }
}


if (isset($_GET['delete'])) {
	 $id=$_GET['delete'];

      $datos= array( "id_elemento"=> $id,"f"=>"");
	  $statement=$mysqli->prepare("CALL eliminarelementos(?)");
	  $statement->bind_param("i",$datos["id_elemento"]);
      $statement->execute();

	 //$mysqli->query("DELETE FROM inventario WHERE idinventario=$id") or die($mysqli->error());
    
     $_SESSION['message']="¡El registro ha sido eliminado!";
	 $_SESSION['msg_type']="peligro";

     header("Location:../view/elementos.php");

}

if (isset($_GET['edit'])) {
	 $id = $_GET['edit'];
	
	 $result = $mysqli->query("CALL consultarelementosid ('".$id."')") or die($mysqli->error());
	// if (count($result)==1) {
		$row=$result->fetch_array();
		$codigo=$row['id_elemento'];
			$nombree=$row['nombre_elemen'];
            $descripcionn=$row['descripcion'];
            $cann=$row['stock'];       
	//}
     }

     if (isset($_POST['update'])) {
     	$codigo=$_POST['cod'];
			$nombree=$_POST['nombre'];
            $descripcionn=$_POST['descripcion'];
            $cann=$_POST['can']; 

        $datos= array("id_elemento"=> $codigo, "nombre_elemen"=> $nombree, "descripcion"=> $descripcionn, "stock"=> $cann);
	$statement=$mysqli->prepare("CALL actualizarelementos(?,?,?,?)");
	$statement->bind_param("issi",$datos["id_elemento"], $datos["nombre_elemen"], $datos["descripcion"], $datos["stock"]);
    $statement->execute();
	 //$mysqli->query("CALL consultareditinventario ('".$codigoo."','".$cantidadd."','".$estadoo."','".$descripcionn."')") or die($mysqli->error());
	  $_SESSION['message']="¡El registro ha sido actualizado!";
	 $_SESSION['msg_type']="advertencia";
	  header("Location:../view/elementos.php");
     }
?>