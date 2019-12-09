<?php  
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));

if (isset($_POST['pres'])) {
	$lokaa=$_GET['entrega'];
	
  $estado="A";
             $datos= array("id"=> $lokaa, "estado"=> $estado);
    $statement=$mysqli->prepare("CALL actualizarprestamoestado(?,?)");
    $statement->bind_param("is", $datos["id"], $datos["estado"]);
    $statement->execute();

	header("Location: ../view/prestamo.php");
}
?>