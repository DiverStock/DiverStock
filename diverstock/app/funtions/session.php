<?php  

function isSessionStart(){
	return isset($_SESSION["usuario"]);
} 
function sessionValidate(){
	if (!isSessionStart()) {
		header("Location:".URL_PROY);
	}
}
function rolvalidar(){
if (isset($_SESSION['rol']) and isset($_SESSION['uses'])) {
	switch ($_SESSION['rol']) {
		case 1:
			 include FOLDER_TEMPLATE."menu2.php";
			break;
			case 2:
			 include FOLDER_TEMPLATE."menu1.php";
			break;
			case 3:
			 include FOLDER_TEMPLATE."menu.php";
	//	echo "<label>'".$nombre, $codigo."'</label>";
			break;
		
		default:
			header("Location:".URL_PROY);
			break;
	}
}
}

//function usuario(){
//	if (isset($_SESSION['uses'])) {
//		$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
//		$result = $mysqli->query("SELECT * FROM persona WHERE numidentifi_persona='".$_SESSION['uses']."'") or die($mysqli->error());
//		$row=$result->fetch_array();
  //      $codigo=$row['numidentifi_persona'];
    //    $nombre=$row['nombre'];
      //  echo 'Bienvenido'
		//echo "<label>'".$nombre, $codigo."'</label>"; 
	//}
//}

?>