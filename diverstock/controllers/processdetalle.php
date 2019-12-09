<?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));

$num_prestamo="";
$implementos="";
$cantidad="";

$result=$mysqli->query("SELECT * FROM detalle_prestamo") or die($mysqli->error);


 ?>