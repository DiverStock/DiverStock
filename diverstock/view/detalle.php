<?php include"../confing.php";
sessionValidate();
?>
<!DOCTYPE html>
<html >

<?php include FOLDER_TEMPLATE."head.php";?>
<body>
	<div id="wrapper">
       <?php include FOLDER_TEMPLATE."top.php";?>
       <?php rolvalidar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                     <div class="row justify-content-center">
                    <div class="col-md-12"> 
                     <h1 class="navbar-brand" id="myModalLabel">Detalle</h1>    


                      <?php 
                $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
                $result=$mysqli->query("SELECT * FROM detalle_prestamo WHERE id_prestamo='".$id=$_GET['detalle']."'") or die($mysqli->error);
                ?>                    
                    </div>
                </div>                   
                 <!-- /. ROW  -->
                  <hr />
                  <div>
                    <form action="processdetalle.php" method="POST">
                       <table class="table table-bordered table-condensed table-hover">
                           <thead>
                               <tr>
                                   <td>#Prestamo</td> 
                                   <td>Implementos</td>
                                   <td>cantidad</td>
                                   <td>generar reporte</td>
                               </tr>
                           </thead>
                           <?php while($row=$result->fetch_assoc()): ?>
                           <tr>
                               <td><?php echo $row['id_prestamo'];?></td>
                               
                               <?php $elemento=$mysqli->query("SELECT nombre_elemen FROM elementos WHERE id_elemento='".$row['id_elemento']."'");
                                    $nombre="RRR";
                                    $roow=$elemento->fetch_array();
                                     ?>
                               <td><?php echo $nombre=$roow['nombre_elemen'];?></td>
                               
                               <td><?php echo $row['cantidad'];?></td>
                               <td><a href="" class="btn btn-success">Detalles</a></td>
                           </tr>
                           <?php endwhile; ?>
                       </table>
                       </form>
                       </div>
                  </div>
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>  
     <?php include FOLDER_TEMPLATE."footer.php";?>
        <?php include FOLDER_TEMPLATE."scripts.php";?>
</body>
</html>