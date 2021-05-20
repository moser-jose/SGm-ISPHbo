<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
/**OS GET*********************************************/
if ($_POST['accion'] == "get_Pais"){ $txt = "SELECT pais.* 		 FROM pais 		 ORDER BY pais.paNome"; 							                                 echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "load")    { $txt = "SELECT provincias.* FROM provincias ORDER BY provincias.provNome"; 							                                 echo json_encode( __LOAD_($txt) ); }


?>