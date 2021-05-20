<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ $txt = "SELECT  municipios.id, municipios.munNome
										   FROM  municipios											  
										  WHERE (municipios.Provincias_id = '".$_POST["prov"]."')
									   ORDER BY  municipios.munNome"; 							                                 
 echo json_encode( __LOAD_($txt) ); 
}

?>