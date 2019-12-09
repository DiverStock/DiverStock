<?php include"../confing.php";
sessionValidate();

?>
<?php include('../class/classPrestamos.php');
$clase=new sistema;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><script src="../assets/js/myjava.js"></script></head>
<?php include FOLDER_TEMPLATE."head.php";?>
<body>     
    <div id="wrapper">
       <?php include FOLDER_TEMPLATE."top.php";?>
       <?php rolvalidar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Prueba</h2> 
                       <hr/>
                       <?php 
$mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
$sql=$mysqli->query("SELECT * FROM prestamo");
 ?>
                       <table class="table table-bordered table-condensed table-hover">
                         <thead>
                          <tr>
                           <th>Id</th>
                           <th>Fecha</th>
                           <th>Hora</th>
                           <th>Aprendiz</th>
                           <th>Implementos</th>
                           <th>Cantidad</th>
                         </tr>
                         </thead>
                         <?php while($mostrar=$sql->fetch_assoc()): ?>
                         <tr>
                          
                           <td rowspan="2"><?php echo $mostrar['id_prestamo']; ?></td>
                           <td rowspan="2"><?php echo $mostrar['fecha_prestamo']; ?></td>
                           <td rowspan="2"><?php echo $mostrar['hora_prestamo']; ?></td>
                           <td rowspan="2"><?php echo $mostrar['numidentifi_persona']; ?></td>
                           <td></td>
                           <td></td>
                           <tr>
                           <td></td>
                           <td></td>
                         </tr>
                       </tr> 
                       <?php endwhile; ?>
                       </table>
                    </div>
                </div>              
                 <!-- /. ROW  -->
               
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