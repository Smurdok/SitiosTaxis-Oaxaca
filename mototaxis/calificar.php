<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        
        <title>Sitios -  Taxis</title>
        
        <link rel="stylesheet" type="text/css" href="css/foundation.css" />
		<link rel="stylesheet" type="text/css" href="css/foundation-icons.css" />
		<link rel="stylesheet" type="text/css" href="css/cab.css">
        
        <script src="js/vendor/modernizr.js"></script>
        
    </head>
    
    <body>      
        <div>
            
        <form role="form" action="carga_evaluacion.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <select name="calSelect">
                    <?php include("val.php"); ?>
                </select>
                <div class="large-6 columns">
                    <label>¿Que tal fue el trato?[servicio]</label>
                </div>
                <div class="large-6 columns" class="faces">
                    <input name="servicio" type="checkbox" value="3" /><label><i class="fi-check"></i> bueno</label>
                    <input name="servicio" type="checkbox" value="2" /><label><i class="fi-minus"></i> regular</label>
                    <input name="servicio" type="checkbox" value="1" /><label><i class="fi-x"></i> malo</label>
                </div>
            </div>
            <div class="row">
                <div class="large-6 columns">
                    <label>¿Fue un viaje seguro?</label>
                </div>
                <div class="large-6 columns" class="faces">
                    <input name="seguridad" type="checkbox" value="3" /><label><i class="fi-check"></i> bueno</label>
                    <input name="seguridad" type="checkbox" value="2" /><label><i class="fi-minus"></i> regular</label>
                    <input name="seguridad" type="checkbox" value="1" /><label><i class="fi-x"></i> malo</label>
                </div>
            </div>
            <div class="row">
                <div class="large-6 columns">
                    <label>¿Habia varios taxis disponibles en el sitio?</label>
                </div>
                <div class="large-6 columns" class="faces">
                    <input name="disponibilidad" type="checkbox" value="3" /><label><i class="fi-check"></i> bueno</label>
                    <input name="disponibilidad" type="checkbox" value="2" /><label><i class="fi-minus"></i> regular</label>
                    <input name="disponibilidad" type="checkbox" value="1" /><label><i class="fi-x"></i> malo</label>
                </div>
            </div>
            <div class="row">
                <div class="large-6 columns">
                    <label>¿Fue un servicio caro?</label>
                </div>
                <div class="large-6 columns" class="faces">
                    <input name="costo" type="checkbox" value="3" /><label><i class="fi-check"></i> bueno</label>
                    <input name="costo" type="checkbox" value="2" /><label><i class="fi-minus"></i> regular</label>
                    <input name="costo" type="checkbox" value="1" /><label><i class="fi-x"></i> malo</label>
                </div>
            </div>
            
            <input id="evaluar" type="submit" value="Evaluar">
            
        </form>
        
            
        </div>
        
                <!--js foundation-->
        <script src="js/vendor/jquery.js"></script>
  		<script src="js/foundation.min.js"></script>
  		<script>
  			$(document).foundation();
  		</script>
    </body>
</html>