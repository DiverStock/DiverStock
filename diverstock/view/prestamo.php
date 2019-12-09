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
                     <h2>Préstamo</h2> 
                    </div>
                </div>              
                 <!-- /. ROW  -->
               
                  <hr />
                  <form action="../controllers/processprestamo.php" method="POST">
                    <input type="hidden" name="fecha"  class="form-control" value="<?php echo date('Y-m-d'); ?>"  readonly>
                      <input type="hidden" name="hora"  class="form-control" value="<?php $time = time();
                                            echo date("H:i:s", $time); ?>" readonly>
                     <?php 
                     $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
$id_pre_detalles=$mysqli->query("SELECT MAX(id_prestamo) FROM prestamo");
  $detalles=mysqli_fetch_array($id_pre_detalles); 
  $prestamo=$detalles['MAX(id_prestamo)']+1;?>
                   <a href="create_prestamo.php?prestamo=<?php echo $prestamo ?>" name="prestamo" class="btn btn-info">Generar nuevo Préstamo</a>
                   <a href="entregar_prestamo.php" name="prestamo" class="btn btn-danger" style="margin-left: 45px;">Entregar</a>
                   <br>
                   <br>
                   <section>
                   <table class="table table-bordered table-condensed table-hover">
                       <thead>
                           <tr>
                               <th >Item</th>
                               <th >Fecha</th>
                               <th>Hora</th>
                               <th>Aprendiz</th>
                               <th width="115px">Implementos</th>
                               <th width="65px">Acción</th>
                               <th width="140px">Opinión</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $clase->conexion();
                                 $clase->MostrarPrestamos(); ?>
                       </tbody>
                   </table>
                   </section>
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