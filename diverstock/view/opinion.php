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
                      <h1 class="navbar-brand" id="myModalLabel">Opinión</h1>  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <hr />
                 <form action="../controllers/processopinion.php" method="POST"> 
                 	<div>
                 		<label>Calificación</label>
                        <label> Préstamo # <?php echo $id= $_GET['prestamo']; ?></label>
                        <input name="prestamoo" type="hidden" value="<?php echo $id= $_GET['prestamo']; ?>">
                 		<select name="calificacion" class="form-control" value="">
                 			<option>Seleccione un número...</option>
                 			<option>1</option>
                 			<option>2</option>
                 			<option>3</option>
                            <option>4</option>
                 			<option>5</option>
                 		</select>
                 	</div>
                 	<div class="form-group">
                 		<button type="submit" class="btn btn-primary" name="save" >Ingresar</button>
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
