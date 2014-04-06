<?php
    
    $_servicio = $_POST["servicio"];
    $_seguridad = $_POST["seguridad"];
    $_disponibilidad = $_POST["disponibilidad"];
    $_costo = $_POST["costo"];
    $_sitio = "'".$_POST["calSelect"]."'";
    

    include("conexion.php");
    //echo $_sitio.$_servicio.$_seguridad.$_disponibilidad.$_costo;
    $_sql = "SELECT nombre FROM sitios WHERE coordenadas = $_sitio";
    //echo $_sql;
    $_res = mysql_query($_sql);
    $_row = mysql_fetch_array($_res);
    //echo $_row["nombre"];

    $_sqlInsert = "INSERT INTO evaluacion (nSitio, servicio, seguridad, disponibilidad, costo) VALUES ('".$_row["nombre"]."','".$_servicio."','".$_seguridad."','".$_disponibilidad."','".$_costo."')";



    mysql_query($_sqlInsert);

    header('Location: index.php');

    
    
?>