<?php
    
    include("conexion.php");
    
    //numero de veces por valore [12][8][4]//
    $_arr = "";

    $_sqlNumTaxis = "SELECT nSitio, count( nSitio ) as veces FROM evaluacion GROUP BY nSitio";
    $_NumTaxis = mysql_query($_sqlNumTaxis);
    while($_rowNumTaxis = mysql_fetch_array($_NumTaxis)){
    
        //echo $_rowNumTaxis["nSitio"]."<br>";//El sitio
        $_veces = $_rowNumTaxis["veces"]."<br>";//Cuantas veces aparece
        $_arr = $_arr."['".$_rowNumTaxis["nSitio"]."'";
        $_val = "";
        
        $_sqlCalServicio = "SELECT nSitio, SUM( servicio ) as suma FROM evaluacion GROUP BY nSitio";
        $_CalServicio = mysql_query($_sqlCalServicio);
        while ($_rowCalServicio = mysql_fetch_array($_CalServicio)){
            if($_rowNumTaxis["nSitio"] == $_rowCalServicio["nSitio"])
                $_val = $_val + $_rowCalServicio["suma"];
        }
        $_sqlCalServicio = "SELECT nSitio, SUM( seguridad ) as suma FROM evaluacion GROUP BY nSitio";
        $_CalServicio = mysql_query($_sqlCalServicio);
        while ($_rowCalServicio = mysql_fetch_array($_CalServicio)){
            if($_rowNumTaxis["nSitio"] == $_rowCalServicio["nSitio"])
                $_val = $_val + $_rowCalServicio["suma"];
        }
        $_sqlCalServicio = "SELECT nSitio, SUM( disponibilidad ) as suma FROM evaluacion GROUP BY nSitio";
        $_CalServicio = mysql_query($_sqlCalServicio);
        while ($_rowCalServicio = mysql_fetch_array($_CalServicio)){
            if($_rowNumTaxis["nSitio"] == $_rowCalServicio["nSitio"])
                $_val = $_val + $_rowCalServicio["suma"];
        }
        $_sqlCalServicio = "SELECT nSitio, SUM( costo ) as suma FROM evaluacion GROUP BY nSitio";
        $_CalServicio = mysql_query($_sqlCalServicio);
        while ($_rowCalServicio = mysql_fetch_array($_CalServicio)){
            if($_rowNumTaxis["nSitio"] == $_rowCalServicio["nSitio"])
                $_val = $_val + $_rowCalServicio["suma"];
        }
        
        if ($_val <=  ($_veces*4))
            $_val = 1; //MALO
        else{
            if ($_val <=  ($_veces*8))
                $_val = 2;//REGULAR
            else $_val = 3;//BUENO
        }
        
        $_arr = $_arr.",".$_val."],";
    }

    //$_arr = $_arr."]";
    echo "<select id='ranking'><option value=\"".$_arr."\"></option></select>";
?>