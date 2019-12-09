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
                <?php require_once'../controllers/processaprendiz.php'; ?>
                <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
            <?php 
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
             ?>
          </div>
            <?php endif; ?>
            <?php include FOLDER_TEMPLATE."conexionBD.php";?>
            <?php $result=$mysqli->query("CALL consultarpersonapre ('A')") or die($mysqli->error); ?>
                <div class="row">
                    <div class="col-md-12">
                     <h2>Aprendiz</h2>

                    </div>

                </div>              
                 <!-- /. ROW  -->
                  <hr />
                 <table class="table table-bordered table-condensed table-hover">
                    <thead>
                      <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Género</th>
                        <th>Celular</th>
                        <th>Fecha </th> 
                        <th>Especialidad</th>
                        <th>Ficha</th>  
                        <th>operaciones</th>
                      </tr>
                    </thead>
                     <?php while($row=$result->fetch_assoc()): ?>
                    <tr>
                      <td><?php echo $row['numidentifi_persona'];?></td>
                      <td><?php echo $row['nombre'];?></td>
                      <td><?php echo $row['apellido'];?></td>
                      <td><?php echo $row['correo'];?></td>
                      <td><?php echo $row['genero'];?></td>
                      <td><?php echo $row['celular'];?></td>
                      <td><?php echo $row['fecha_nacimiento'];?></td>
                      <td><?php echo $row['especialidad'];?></td>
                      <td><?php echo $row['ficha'];?></td>
                      <td>
                          <a href="actualizarapre.php?edit=<?php echo $row['numidentifi_persona']; ?>" class="btn btn-info">Actualizar</a>
                          <a href="aprendiz.php?delete=<?php echo $row['numidentifi_persona']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                  </table>
                  <hr />
                <div>
                        <div class="form-group">
                        
                           <a href="insertarapre.php" class="btn btn-info">Insertar</a>
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
</body>?
</html>