<?php include"../confing.php";
sessionValidate();
?>

<script type="text/javascript">
  function Habilitar(){
    var campo1=document.getElementById("campo1");
    var campo2=document.getElementById("campo2");
    var campo4=document.getElementById("campo4");
    var campo5=document.getElementById("campo5");
    var campo6=document.getElementById("campo6");
    var boton=document.getElementById("boton");
     
     campo1.disabled=true;
     campo2.disabled=true;
     boton.disabled=true;
     campo4.disabled=false;
     campo5.disabled=false;
     campo6.disabled=false;

     //if (true) {} else {}
  }
</script>

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
                <?php require_once'../controllers/processpretamo.php'; ?>
          
    
                <div class="row">
                    <div class="col-md-12">

                     <h1 class="navbar-brand" id="myModalLabel">Registrar préstamo</h1>  
                      <span class="logout-spn" >
                        <a href="prestamo.php" class="btn btn-danger" >volver</a> 
                      </span>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <form action="../controllers/processpretamo.php" method="POST">
                   <!--MODAL DE REGISTRO-->
                  
                                <h4 class="modal-title" id="myModalLabel"><b>Registro de Préstamos</b></h4>
                                <br>
                                
                                <fieldset><legend>1. Generar Registro</legend>
                                    <table class="tbl-registro" width="100%">
                                       
                                        <thead>
                                          <tr>
                                         
                                            <td>Fecha:</td>
                                            <td>Hora:</td>
                                            <td>Aprendiz:</td>
                                            <td>nombre:</td>
                                          </tr>
                                        </thead><tr>
                                            
                                           
                                            
                                            <td><input type="" name="fecha"  class="form-control" value="<?php echo date('Y-m-d'); ?>"  readonly></td>
                                            
                                            <td><input type="" name="hora"  class="form-control" value="<?php $time = time();
                                            echo date("H:i:s", $time); ?>" readonly></td>
                                            
                                            <td><input type="number" id="campo1" class="form-control" name="codapre" ></td>
                                           
                                            <td><input type="text" id="campo2" class="form-control" value="<?php echo $enviar; ?>" ></td>
                                            
                                        </tr>
                                    </table>
                                </fieldset>
                                <br>
                                   <center>
                                <button type="submit" class="btn btn-primary" id="boton" name="elemen" >Ingresar Elementos</button>
                              </center>
                                <div id="mensaje"></div>
                                <fieldset><legend>2. 
                                Registrar Elementos</legend>
                                    <table class="tbl-registro" width="100%">
                                        <tr>
                                          <?php $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli)); ?>
                                          <?php $elementos=$mysqli->query("SELECT nombre_elemen FROM elementos WHERE estado='A'");?>

                                            <td><select class="form-control" name="elemento" id="campo4" >
                                              <?php while($row=mysqli_fetch_array($elementos)): ?>
                                               <option><?php echo $row['nombre_elemen']; ?></option>
                                               <?php endwhile; ?>
                                             </select> 
                                          </td>
                                          <td><input type="number" id="campo5" name="cantidad"  class="form-control" value="can"></td> 
                                           
                                            <td><button type="submit" class="btn btn-primary" id="campo6" name="detalles">+</button></td>
                                        </tr>
                                    </table></fieldset>
                                    
                                    <br>
                                    <div id="contenidoRegistro"></div>
                                    <div class="modal-footer">
                                        <input type="button" id="guardar" class="btn btn-default" value="Guardar"/>
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