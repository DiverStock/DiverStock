<?php include"../confing.php";
sessionValidate();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include FOLDER_TEMPLATE."head.php";?>
<script src="../assets/js/validar.js"></script>
<body>     
    <div id="wrapper">
       <?php include FOLDER_TEMPLATE."top.php";?>
       <?php rolvalidar(); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php require_once'../controllers/processelemen.php'; ?>
                <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
            <?php 
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
             ?>
          </div>
            <?php endif; ?>
            <?php include FOLDER_TEMPLATE."conexionBD.php";?>
            <?php $result=$mysqli->query("CALL consultarelementos ('A')") or die($mysqli->error); ?>
                <div class="row">
                    <div class="col-md-12">
                     <h2>Elementos</h2>     
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <hr />
                 <table class="table">
                     <thead>
                         <tr>
                             <th>Código Implementos</th>
                             <th>Nombre</th>
                             <th>Descripción</th>
                             <th>Cantidad</th>
                         </tr>
                     </thead>
                     <?php while($row=$result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id_elemento'];?></td>
                            <td><?php echo $row['nombre_elemen']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td>
                          <a href="elementos.php?edit=<?php echo $row['id_elemento']; ?>" class="btn btn-info">Editar</a>
                          <a href="elementos.php?delete=<?php echo $row['id_elemento']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                        </tr>
                     <?php endwhile; ?>
                 </table>
                  <hr />
                  <form action="../controllers/processelemen.php" method="POST" onsubmit="return validar();">
                    <div>
                        <label>Nombre Elemento</label>
                        <input type="text" id="nombre" name="nombre" onkeypress="return sololetras(event)" onpaste="return false" class="form-control" value="<?php echo $nombree; ?>" placeholder="Digite el nombre del implemento" required>
                    </div>
                    <div>
                        <label>Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" onkeypress="return sololetras(event)" onpaste="return false" class="form-control" value="<?php echo $descripcionn; ?>" placeholder="Digite la descripcion del implemento" required>
                    </div>
                    <div> 
                        <label>Cantidad</label>
                        <input type="number" id="can" name="can" onpaste="return false" class="form-control" value="<?php echo $cann; ?>" placeholder="Digite la cantidad" required>
                    </div>
                    <br>
                    <div class="form-group">
                           <button type="submit" class="btn btn-info" name="update">Actualizar</button>
                           <button type="submit" class="btn btn-info" name="save" >Ingresar</button>
                      </div>
                      <input type="hidden" name="cod" value="<?php echo $codigo; ?>">


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
