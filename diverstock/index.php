<?php include"confing.php";?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include FOLDER_TEMPLATE."head.php";?>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link rel="stylesheet" href="estilos.css">
     <link rel="stylesheet" type="text/css" href="assets/css/indexcss.css">
<body class="fondo">    
<div class="fondonegro">
   
       

                       

        <!-- /. NAV SIDE  -->
        
            <div id="page-nner">
              
                    <div class="col-md-12" name="lol">
                        <br>
                        <br>
                        <br>

                        <section id="sinopsis">

                    <img src="<?=URL_IMG?>iconoProyecto.ico" id="logoo"/><label id="iver">iverstock</label>
                         <center> <h2 id="titulo">Inicio de Sesión </h2></center>
                       <br>
                     <div>
                     	<form class="formulario" method="POST" action="<?=URL_PROY?>app/login/logincontroller.php">
                     		
                     			<input type="text" name="email" id="login" class="form-control" placeholder="Correo Electrónico">

                     			
                     			<input type="password" name="contrasena" id="login" class="form-control" placeholder="Contraseña">
                     		
                     			
                     			<button type="submit" id="boton" name="btningresar" class="btn btn-success">Ingresar</button>
                     		
                            <div><a href="" id="ceen">Olvide mi contraseña...</a></div>
                            
                           
                     	</form>
                     </div>
                           </section>
                   
                </div>              
                 <!-- /. ROW  -->
            
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
           
         <!-- /. PAGE WRAPPER  -->
        </div> 
        <?php include FOLDER_TEMPLATE."footer.php";?>
        <?php include FOLDER_TEMPLATE."scripts.php";?>
</body>
</html>
