<?php 
 session_start();
 include ("../_php/__Manager_.php");


if ($_POST['accion'] == "load"){ $txt = "SELECT 
											  grelha.*, curso.cDesc
										   FROM
											  curso
											  INNER JOIN grelha ON (curso.id = grelha.id_curso) ORDER BY gDesc"; echo json_encode( __LOAD_($txt) ); }
?>