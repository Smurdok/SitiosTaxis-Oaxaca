<!DOCTYPE html>

<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<title>Insert Sitios</title>

	</head>
	<body>

		<?php
			$_xml = simplexml_load_file("sitiotaxislocales.xml")
			or die("Error XML");

			echo "INSERT INTO sitios (nombre,direccion,coordenadas) VALUES<br>";
			
			foreach ($_xml as $_sitios) {
				echo "('{$_sitios->nombre}','{$_sitios->direccion}','{$_sitios->coordenadas}'),<br>";
			}
			?>

	</body>

</html>