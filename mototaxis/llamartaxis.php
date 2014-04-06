<?php
$_var="";
	$_num = 0;
	$_xml = simplexml_load_file('sitiotaxislocales.xml') or die 
		("imposible cargar XML");

	foreach ($_xml->sitio as $_sitio){
		$_num ++; 
		$_var=$_var."['". $_sitio->nombre[0]. "', " . $_sitio->coordenadas . ", " . $_num ."]," . "<br>";
		

		
	}
	echo $_var;