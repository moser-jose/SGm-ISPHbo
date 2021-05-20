<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
/**OS GET*********************************************/
if ($_POST['accion'] == "load"){ $txt = "SELECT 
											  grelha.gDesc, turma.*, curso.cDesc
										   FROM
											  turma
											  INNER JOIN grelha ON (turma.id_grelha = grelha.id)
											  INNER JOIN curso  ON (turma.id_curso  = curso.id)
										  WHERE
  											 (turma.id_curso = '".$_POST["curso"]."') AND (turma.anoAcademico = '".$_POST["ano"]."')
									   ORDER BY
											  curso.cDesc, turma.tDesc"; echo json_encode( __LOAD_($txt) ); }
//////////////////
if ($_POST['accion'] == "get_codC") { $txt = "SELECT curso.cCode FROM curso  WHERE (curso.id = '".$_POST["curso"]."')"; echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "getGrelha"){ $txt = "SELECT grelha.id, grelha.gDesc 
												FROM grelha
											   WHERE (grelha.id_curso = '".$_POST["curso"]."')"; 
									 echo json_encode( __LOAD_($txt) ); }

if ($_POST['accion'] == "get_numT") { $txt = "SELECT 
												  MAX(turma.tNum)
											   FROM
												  turma
											  WHERE
												  (turma.tPeriodo 		 = '".$_POST["periodo"]."') AND
												  (turma.id_curso 		 = '".$_POST["curso"]."')   AND
												  (turma.anoAcademico    = '".$_POST["anoA"]."')   AND
												  (turma.tAno_curricular = '".$_POST["ano"]."')"; 					     echo json_encode( __LOAD_($txt) ); }
/*****************************************************/

?>