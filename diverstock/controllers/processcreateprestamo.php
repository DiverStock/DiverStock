<?php
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
 $prestamoo="";
 $nombrele="";
 $cantidad="";
 $stock="";

 $vver="";
        $veer="";
        $verr="";
        $ver="";

//codigo agregar prestamo
if (isset($_POST['consultar'])){
     $num_pre=$_POST['num_pre'];
     $fecha=$_POST['fecha'];
     $hora=$_POST['hora'];
     $estado="A";
     $aprendiz=$_POST['search'];

         $datos=array("fecha"=>$fecha, "hora"=>$hora,"estado"=>$estado, "aprendiz"=>$aprendiz);
         $statement=$mysqli->prepare("CALL insertarprestamo(?,?,?,?)");
         $statement->bind_param("sssi",$datos["fecha"], $datos["hora"], $datos["estado"], $datos['aprendiz']);
         $statement->execute();
         $_SESSION['message']="¡El registro ha sido guardado!";
         $_SESSION['msg_type']="éxito";


     $maxprestamo=$mysqli->query("SELECT MAX(id_prestamo) FROM prestamo");
     $max=mysqli_fetch_array($maxprestamo);
  $estado="P";
             $datos= array("id"=> $max['MAX(id_prestamo)'], "estado"=> $estado);
    $statement=$mysqli->prepare("CALL actualizarprestamoestado(?,?)");
    $statement->bind_param("is", $datos["id"], $datos["estado"]);
    $statement->execute();
     
      $_SESSION['message']="¡El registro ha sido actualizado!";
     $_SESSION['msg_type']="advertencia";



     //Consultar aprendiz
        $result=$mysqli->query("CALL  consulapree ('".$aprendiz."')") or die($mysqli->error);
        while($row=mysqli_fetch_array($result)){
        $vver=$row['nombre'];
        $veer=$row['apellido'];
        $verr=$row['especialidad'];
        $ver=$row['ficha'];
          }

 header("Location:../view/create_prestamo.php?prestamo=");    
}


if (isset($_POST['elemen'])) {
  $num_pre=$_POST['num_pre'];
//idprestamo
  $id_pre_detalles=$mysqli->query("SELECT MAX(id_prestamo) FROM prestamo");
  $detalles=mysqli_fetch_array($id_pre_detalles);
//idelemento
   $elemento=$_POST['elemento'];
  $id_elemento=$mysqli->query("SELECT id_elemento FROM elementos WHERE nombre_elemen='".$elemento."'");
  $detalle=mysqli_fetch_array($id_elemento);
//cantidad
  $cantidad=$_POST['cantidad'];

  $datos=array("idprestamo"=>$detalles['MAX(id_prestamo)'], "idelemento"=>$detalle['id_elemento'], "cantidad"=>$cantidad);
  $statement=$mysqli->prepare("CALL insertardetalles(?,?,?)");
  $statement->bind_param("iii",$datos["idprestamo"],$datos["idelemento"],$datos["cantidad"]);
  $statement->execute();


   $_SESSION['message']="¡El registro ha sido guardado!";
         $_SESSION['msg_type']="éxito";

        

        header("Location:../view/create_prestamo.php?prestamo=<?php echo $num_pre ?>"); 
}

if (isset($_GET['delete'])) {
     $num_pre=$_POST['num_pre'];
     $id=$_GET['delete'];
      $datos= array( "id_detalle"=> $id, "f"=>"");
      $statement=$mysqli->prepare("CALL eliminardetalle(?)");
      $statement->bind_param("i",$datos["id_detalle"]);
      $statement->execute();

      $result=$mysqli->query("SELECT * FROM detalle_prestamo WHERE id_prestamo='".$id."'"); 
      while($row=$result->fetch_assoc()){
      $cantidad=$row['cantidad'];
      $elemento=$row['id_elemento'];


      $elemen=$mysqli->query("SELECT * FROM elementos WHERE id_elemento='".$row['id_elemento']."'");
      $ro=mysqli_fetch_array($elemen);
       echo $stock=$ro['stock']+$row['cantidad'];
   $mysqli->query("UPDATE elementos SET stock='".$stock."' WHERE id_elemento='".$row['id_elemento']."'");
  }

     //$mysqli->query("DELETE FROM inventario WHERE idinventario=$id") or die($mysqli->error());
    
     $_SESSION['message']="¡El registro ha sido eliminado!";
     $_SESSION['msg_type']="peligro";

     header("Location:../view/create_prestamo.php?prestamo=<?php echo $id ?>");

}

if (isset($_POST['enviar'])) {
        header("Location:../view/entregar_prestamo.php"); 
}

?>

