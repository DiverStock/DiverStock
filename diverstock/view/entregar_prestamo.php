<?php include"../confing.php";
sessionValidate();

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
              <?php require_once'../controllers/processpretamo.php'; ?>
                <div class="row">
                    <div class="col-md-12">
                     <h2>Préstamos pendientes</h2> 
                    </div>
                </div>              
                 <!-- /. ROW  -->
               
                  <hr />
                  <form action="../controllers/processpretamo.php" method="POST">
                   <br>
                   <br>
                   <section>
                   <table class="table table-bordered table-condensed table-hover">
                       <thead>
                           <tr>
                               <th width="100px">Item</th>
                               <th width="150px">Fecha</th>
                               <th width="150px">Hora</th>
                               <th width="150px">Aprendiz</th>
                               <th width="115px">Implementos</th>
                               <th width="65px">Acción</th>
                               <th width="200px">Opinión</th>
                           </tr>
                       </thead>
                       <?php $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
    $sql=$mysqli->query("SELECT * FROM prestamo WHERE estado='P'");
    $item=0; ?>
    <?php if(mysqli_num_rows($sql)>0){ ?>
      <?php while($mostrar=mysqli_fetch_array($sql)): ?>
        <?php $elemen=mysqli_num_rows($mysqli->query("SELECT * FROM detalle_prestamo where id_prestamo='".$mostrar['id_prestamo']."'")); ?>
                      <tr>
                        <td name="presta"><?php echo $mostrar['id_prestamo'];?></td>
                        <td><?php echo $mostrar['fecha_prestamo'];?></td>
                        <td><?php echo $mostrar['hora_prestamo'];?></td>
                        <td><?php echo $mostrar['numidentifi_persona'];?></td>
                        <td><?php echo $elemen;?></td>
                        <td><a href="detalle.php?detalle=<?php echo $mostrar['id_prestamo'] ?>" class="btn btn-danger">Detalle</a></td>
                        <td><center><a href="opinion.php?prestamo=<?php echo $mostrar['id_prestamo'] ?>" class="btn btn-info">Opinión</a>
                          <a href="entregar_prestamo.php?presta=<?php echo $mostrar['id_prestamo'];?>" class="btn btn-info">Entregar</a></center></td>    
                      </tr>
                      <?php endwhile; ?>
                    <?php } ?>
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