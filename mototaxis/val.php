<?php
    $_xml = simplexml_load_file("sitiotaxislocales.xml")
    or die("Error XML");

    foreach ($_xml as $_sitio) {
    echo "<option value=\"".$_sitio->coordenadas."\">{$_sitio->nombre}</option>";
    }
?>