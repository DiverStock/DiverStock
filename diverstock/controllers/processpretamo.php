<?php  
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));


$lokaa="";
if (isset($_GET['presta'])) {
	$lokaa=$_GET['presta'];
	
  $estado="A";       
             $datos= array("id"=> $lokaa, "estado"=> $estado);
    $statement=$mysqli->prepare("CALL actualizarprestamoestado(?,?)");
    $statement->bind_param("is", $datos["id"], $datos["estado"]);
    $statement->execute();
     

      $result=$mysqli->query("SELECT * FROM detalle_prestamo WHERE id_prestamo='".$lokaa."'"); 
      while($row=$result->fetch_assoc()){
      $cantidad=$row['cantidad'];
      $elemento=$row['id_elemento'];


      $elemen=$mysqli->query("SELECT * FROM elementos WHERE id_elemento='".$row['id_elemento']."'");
      $ro=mysqli_fetch_array($elemen);
       $stock=$ro['stock']+$row['cantidad'];
   $mysqli->query("UPDATE elementos SET stock=$stock WHERE id_elemento='".$row['id_elemento']."'");
  }

	//header("Location: ../view/prestamo.php");
}
?>