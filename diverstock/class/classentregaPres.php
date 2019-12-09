<?php 
//session_start();
class sistema{
	public function conexion(){
		$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));

	}
	function MostrarPrestamos(){
		$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
		$sql=$mysqli->query("SELECT * FROM prestamo WHERE estado='P'");
		$item=0;
        if(mysqli_num_rows($sql)>0){
        	while($mostrar=mysqli_fetch_array($sql)){
        		$elemen=mysqli_num_rows($mysqli->query("SELECT * FROM detalle_prestamo where id_prestamo='".$mostrar['id_prestamo']."'"));
        		echo'<tr>
                        <td>'.$mostrar['id_prestamo'].'</td>  
                        <td>'.$mostrar['fecha_prestamo'].'</td>
                        <td>'.$mostrar['hora_prestamo'].'</td>
                        <td>'.$mostrar['numidentifi_persona'].'</td>
                        <td>'.$elemen.'</td>
                        <td><a href="detalle.php?detalle='.$mostrar['id_prestamo'].'" class="btn btn-danger">Detalle</a>
                        </td>   
                        <td><a href="opinion.php?prestamo='.$mostrar['id_prestamo'].'" class="btn btn-info">Opinion</a>
                        </td>  
        		     </tr>';        	        
        	}
        }else{
        	echo'<tr><td>No se encontraron registros....</td></tr>';

        }      
	}
}


//<input type="button" value="Detalle" name="detallee" class="btn btn-success" onClick="verDetalle(/'.$mostrar['id_prestamo'].'/)">
 ?>

