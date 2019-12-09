<?php include"../confing.php";
sessionValidate();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include FOLDER_TEMPLATE."head.php";?>
<body>     
    <div id="wrapper">
       <?php include FOLDER_TEMPLATE."top.php";?>
      <?php rolvalidar(); 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Información</h2>   
                     
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
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
