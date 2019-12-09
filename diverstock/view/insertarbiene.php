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
                     <h2>Insertar Instructor Bienestar</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                  <form action="../controllers/processpersonalbienestar.php" method="POST">
                        <label>Cédula</label>
                        <input type="number" name="cedula" class="form-control" value="" placeholder="Cedula del Instructor">

                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="" placeholder="Digite el nombre del Instructor">

                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="" placeholder="Digite el apellido del Instructor">

                        <label>Correo</label>
                        <input type="text" name="correo" class="form-control" value="" placeholder="Digite el correo del Instructor">

                        <label>Género</label>
                        <select name="genero" class="form-control" value="">
                            <option>Seleccione</option>
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                        
                        <label>Celular</label>
                        <input type="number" name="celular" class="form-control" value="" placeholder="Digite el celular del Instructor">

                        <label>Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="" placeholder="Digite fecha de nacimiento">

                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control" value="" placeholder="Digite cargo del Instructor">
                        <br>
                        <div class="form-group">
                           <a href="personalbienestar.php" class="btn btn-info">Volver</a>
                           <button type="submit" class="btn btn-primary" name="save" >Insertar</button>
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