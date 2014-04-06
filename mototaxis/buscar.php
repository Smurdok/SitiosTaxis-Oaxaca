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
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
        <script src="js/funciones2.js"></script>
        <script src="js/vendor/jquery.js"></script>
        
        <script>
		  $(document).ready(function(){
			  $("#ocultar").click(function(){
				  $("#directions-panel").hide();
                  
		 	  });
              
              $("#mostrar").click(function(){
                  $("#directions-panel").show()              
		 	  });
              
		  });
		</script>
        
    </head>
    
    <body>
        
        <?php
            include("resultados.php");
        ?>
        <div id="control">
            <select id="end" onchange="calcRoute();">
                <?php include("val.php"); ?>
            </select>
            <div id="colors">
                <span style="color:red">Malo</span>
                <span style="color:orange">Regular</span>
                <span style="color:green">Bueno</span>
                <span style="color:yellow">Desconocido</span>
            </div>
            <div id="salida"></div>
        </div>
        <div>     
                <input type="button" id="mostrar" value="Cómo llegar">
                <input type="button" id="ocultar" value="Ocultar">
                <a href="index.php"><input type="button" id="ocultar" value="Inicio"></a>
        </div>
        <div id="directions-panel"></div>
        <div id="map-canvas"></div>
        
        
                <!--js foundation-->
        <script src="js/vendor/jquery.js"></script>
  		<script src="js/foundation.min.js"></script>
  		<script>
  			$(document).foundation();
  		</script>
    </body>
</html>