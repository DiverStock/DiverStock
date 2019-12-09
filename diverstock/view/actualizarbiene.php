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
               <?php require_once'../controllers/processpersonalbienestar.php'; ?>
                <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
            <?php 
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
             ?>
          </div>
          <?php endif; ?>   
                <div class="row">
                    <div class="col-md-12">
                     <h2>Actualizar Aprendiz</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                  <form action="../controllers/processactualizarbiene.php" method="POST">
                        

                        <label>Nombre</label>
                        <input type="text" name="nombree" class="form-control" value="<?php echo $nombree; ?>" placeholder="Digite el nombre del Instructor">

                        <label>Apellido</label>
                        <input type="text" name="apellidoo" class="form-control" value="<?php echo $apellidoo; ?>" placeholder="Digite el apellido del Instructor">

                        <label>Correo</label>
                        <input type="text" name="correoo" class="form-control" value="<?php echo $correoo; ?>" placeholder="Digite el correo del Instructor">
                        
                        <label>Celular</label>
                        <input type="number" name="celularr" class="form-control" value="<?php echo $celularr; ?>" placeholder="Digite el celular del Instructor">

              

                        <label>Cargo</label>
                        <input type="text" name="cargoo" class="form-control" value="<?php echo $cargoo; ?>" placeholder="Digite cargo del Instructor">
                        <br>
                        <div class="form-group">
                           <a href="personalbienestar.php" class="btn btn-info">Volver</a>
                           <button type="submit" class="btn btn-info" name="update">Actualizar</button>
                      </div>
                      <input type="hidden" name="cod" value="<?php echo $cod; ?>">
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