<?php  
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));           



if (isset($_POST['save'])) {
	
$calificacion=$_POST['calificacion'];
$id= $_POST['prestamoo'];
         $datos=array( "calificacion"=>$calificacion, "prestamo"=>$id);
         $statement=$mysqli->prepare("CALL insertaropinion(?,?)");
         $statement->bind_param("ii", $datos["calificacion"], $datos["prestamo"]);
        $statement->execute();
         $_SESSION['message']="¡El registro ha sido guardado!";
	 $_SESSION['msg_type']="éxito";
        
        header("Location:../view/entregar_prestamo.php "); 
}
 ?>