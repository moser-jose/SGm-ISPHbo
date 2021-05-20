<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
/**OS GET*********************************************/
if ($_POST['accion'] == "load"){ $txt = "SELECT 
											  disciplina.*, grelha.gDesc, tipo_disciplina.tDesc
										   FROM
											  disciplina
											  INNER JOIN grelha          ON (disciplina.id_grelha = grelha.id)
											  INNER JOIN tipo_disciplina ON (disciplina.id_tipo   = tipo_disciplina.id)
										 WHERE
										      disciplina.id_grelha = '".$_POST["grelha"]."'
									   ORDER BY
											  grelha.gDesc, disciplina.dSemestre ,disciplina.dDesc";			  echo json_encode( __LOAD_($txt) ); }
//////////////////
if ($_POST['accion'] == "getTipo"){ $txt = "SELECT  tipo_disciplina.* FROM tipo_disciplina";      echo json_encode( __LOAD_($txt) ); }


?>