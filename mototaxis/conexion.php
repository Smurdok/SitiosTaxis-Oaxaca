	<?php
		//Conexión con DB
		$host="localhost";
		$usuario="chofer";
		$contrasena="12345";
		$bdd="taxis";
		mysql_connect($host,$usuario,$contrasena) or die ("No se pudo establecer la conexión con la base de datos");
		mysql_select_db($bdd);
	?>