<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="padding: 10px;">
                        <img src="<?=URL_IMG?>iconoProyecto.ico" width="62" height="62"/>
                        <font size="6">iverstock</font>
                    </a>
                </div>

               <label id="bienvenida" style="font-size: 20px; color: #fff;">Bienvenido <?php  $mysqli=new mysqli('localhost', 'root', '', 'diverstock') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM persona WHERE numidentifi_persona='".$_SESSION['uses']."'") or die($mysqli->error());
        $row=$result->fetch_array();
        $codigo=$row['numidentifi_persona'];
        $nombre=$row['nombre'];
         echo $nombre," identificacion ", $codigo; ?> </label>
                 <span class="logout-spn">

                    
                  <a href="<?=URL_PROY?>app/login/logout.php" id="salir"><i class="fa fa-power-off"></i></a>  
                </span>
            </div>
        </div>