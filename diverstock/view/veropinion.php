<?php include"../confing.php";
sessionValidate();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include FOLDER_TEMPLATE."head.php";?>
<body>     
    <div id="wrapper">
       <?php include FOLDER_TEMPLATE."top.php";?>
       <?php rolvalidar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php require_once'../controllers/processopinion.php'; ?>
                <div class="row">
                    <div class="col-md-12">
                      <h2 class="navbar-brand" id="myModalLabel">Opinión del préstamo</h2>      
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <hr />
                 <form action="../controllers/processopinion.php" method="POST"> 
                 	<div>
                 		<label>Opinio del Prestamo # <?php echo $id=$_GET['ver'] ?></label>
                        <?php 
                $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
                $result=$mysqli->query("SELECT * FROM opinion WHERE id_prestamo='".$id=$_GET['ver']."'") or die($mysqli->error);
                ?>        
                        <table class="table table-bordered table-condensed table-hover">
                           <thead style="background-color: orange;">
                               <tr>
                                   <td><center>#Préstamo</center></td> 
                                   <td><center>Calificación</center></td>
                                   <td><center>Operación</center></td>
                               </tr>
                           </thead>
                           <?php while($row=$result->fetch_assoc()): ?>
                           <tr>
                               <td><center><?php echo $row['id_prestamo'];?></center></td>
                               <td><center><?php echo $row['calificacion'];?></center></td>
                               <td><center><a href="" class="btn btn-info" >Imprimir</a></center></td>
                           </tr>
                           <?php endwhile; ?>
                       </table>
                 	</div>

                 </form>
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
