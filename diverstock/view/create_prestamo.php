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
                <?php require_once'../controllers/processcreateprestamo.php'; ?>
                <div class="row">
                    <div class="col-md-12">
                     <h2 class="navbar-brand" id="myModalLabel">Registrar prestamo</h2>  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <?php $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli)); ?>
                  <form action="../controllers/processcreateprestamo.php" method="POST">
                    <div class="container">
                      <h3>Aprendiz</h3>
                      <?php $row=mysqli_fetch_array($result);
                      echo $row; ?>
                      <input type="hidden" name="fecha"  class="form-control" value="<?php echo date('Y-m-d'); ?>"  readonly>
                      <input type="hidden" name="hora"  class="form-control" value="<?php $time = time();
                                            echo date("H:i:s", $time); ?>" readonly>
                     <div class="labell"> 
                        <label id="text" >Documento</label>
                        <label id="text" >Nombre</label>
                        <label id="text" >Apellido</label>
                        <label id="text" >Especialidad</label>
                        <label id="text" >Ficha</label>

                      </div>
                      <div class="campos"> 
                       
                        <input type="search" name="search" id="search"  class="form-control">
                        <input type="text"  id="cam_apre" value="<?php echo $vver; ?>" class="form-control" disabled>
                        <input type="text"  id="cam_apre" value="<?php echo $veer; ?>" class="form-control" disabled>
                        <input type="text"  id="cam_apre" value="<?php echo $verr; ?>" class="form-control" disabled>
                        <input type="number" id="cam_apre" value="<?php echo $ver; ?>" class="form-control" disabled>
                        <button type="submit" class="btn btn-info" name="consultar" id="consultar">Consultar</button>
<?php $prestamo=$_GET['prestamo'] ?>
<label name="num_pre"><?php echo $prestamo ?></label>
                      </div>
                    </div> 

                    <div class="containertwo">
                      <table class="table table-bordered table-condensed table-hover">
                        <thead>
                          <tr>
                            
                            <td id="tdd">Nombre</td>
                            <td id="tdd">Cantidad</td>
                            <td id="tdd">Disponibles</td>
                            <td id="tdd">Opción</td>
                          </tr>
                        </thead>
                        <tr> 
                          
                         <?php $elemento=$mysqli->query("SELECT nombre_elemen FROM elementos WHERE estado='A'");?>
                          <td id="tddd"><select class="form-control" name="elemento" id="campooss" >
                                              <?php while($row=mysqli_fetch_array($elemento)): ?>
                                               <option><?php echo $row['nombre_elemen']; ?></option>
                                               <?php endwhile; ?>
                                             </select>
                                              </td>
                          <td id="tddd"><input type="number" name="cantidad" class="form-control" id="campos"></td>
                          <td id="tddd"></td>
                          <td id="tddd"><button type="submit" class="btn btn-info"  name="elemen" >Agregar</button></td>
                        </tr>
                      </table>
                       <!-- /. Tabla de detalles -->
                       <table class="table table-bordered table-condensed table-hover">
                       <thead>
                          <tr>
                            <td id="tdd"># prestamo</td>
                            <td id="tdd">Nombre</td>
                            <td id="tdd">Cantidad</td>
                            <td id="tdd">Disponibles</td>
                            <td id="tdd">Opción</td>
                          </tr>
                        </thead>
                        <?php $id_pre_detalles=$mysqli->query("SELECT MAX(id_prestamo) FROM prestamo");
  $detalles=mysqli_fetch_array($id_pre_detalles);
$tal=$detalles['MAX(id_prestamo)']; ?>
                        <?php 
         //Consulta para el carrito
          $result=$mysqli->query("SELECT * FROM detalle_prestamo WHERE id_prestamo='".$tal."'"); ?>
                           <?php while($row=$result->fetch_assoc()):?>
                         <tr> 
                            <td id="tddd" ><?php echo $row['id_prestamo']; ?></td>
                            
                            <td id="tddd"><?php $nombrelemen=$mysqli->query("SELECT * FROM elementos WHERE id_elemento='".$row['id_elemento']."'");
                                            $ro=mysqli_fetch_array($nombrelemen);
                                            $nombrele=$ro['nombre_elemen']; 
                                          echo  $nombrele?></td>

                            <td id="tddd"><?php echo $row['cantidad']; ?></td>

                            <td id="tddd"><?php $nombrelemen=$mysqli->query("SELECT * FROM elementos WHERE id_elemento='".$row['id_elemento']."'");
                                            $ro=mysqli_fetch_array($nombrelemen); 
                                          echo  $stock=$ro['stock']-$row['cantidad'];
                                          $mysqli->query("UPDATE elementos SET stock=$stock WHERE id_elemento='".$row['id_elemento']."'")?></td>
                            <td id="tddd"><a href="create_prestamo.php?delete=<?php echo $row['id_prestamo']; ?>" class="btn btn-danger" >Eliminar</a></td>
                         </tr>
                          <?php endwhile; ?>
                           </table>
                      <button type="submit" class="btn btn-info" id="registrarboton" name="enviar" >Registrar</button>
                    </div>
                    </form>
                   <!--MODAL DE REGISTRO-->
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>  
        <?php include FOLDER_TEMPLATE."footer.php";?>
        <?php include FOLDER_TEMPLATE."scripts.php";?>
       <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <script src="../assets/js/app.js"></script>

  <script type="text/javascript"></script>
</body>
</html>