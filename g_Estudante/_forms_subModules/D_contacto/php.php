<?php 
 session_start();
 include ("../../../_php/__Manager.php");

/******************************************************************/
if ($_POST['accion'] == "load")     { __LOAD();   }
/*********/
if ($_POST['accion'] == "get__"){ 
   $txt = "SELECT 
			  municipios.*, `provincias`.`Pais_id`
			FROM
			  municipios			  
			  INNER JOIN provincias ON (municipios.Provincias_id = provincias.id)
			  INNER JOIN pais ON (provincias.Pais_id = pais.id)
			WHERE
			  (municipios.id = '".$_POST["MM"]."')";   
	
   echo json_encode( __LOAD_($txt) ); 	
}

?>