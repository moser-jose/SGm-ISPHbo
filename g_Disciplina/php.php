<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
/**OS GET*********************************************/
if ($_POST['accion'] == "load"){ $txt = "SELECT 
											 disciplina.id, disciplina.dDesc
										   FROM
											  disciplina
											  INNER JOIN grelha          ON (disciplina.id_grelha = grelha.id)
											  INNER JOIN tipo_disciplina ON (disciplina.id_tipo   = tipo_disciplina.id)
										 WHERE
										      disciplina.id_grelha = '".$_POST["grelha"]."'
									   ORDER BY
											  grelha.gDesc, disciplina.dSemestre ,disciplina.dDesc";			  echo json_encode( __LOAD_($txt) ); }
//////////////////

/************ disciplinas de um curso****************************/
if ($_POST['accion'] == "loadDiscCurso"){ $txt = "SELECT 
	disciplina.id,
disciplina.dDesc
 FROM
 estudante
		INNER JOIN curso
		ON (curso.id= estudante.id_curso)

		INNER JOIN grelha
		ON (grelha.id_curso = curso.id)

		INNER JOIN disciplina
		on (disciplina.id_grelha = grelha.id)
WHERE
 estudante.bi_passaporte = '".$_POST["grelha"]."'";			 
	 echo json_encode( __LOAD_($txt) ); }
//////////////////

if ($_POST['accion'] == "getTipo"){ $txt = "SELECT  tipo_disciplina.* FROM tipo_disciplina";      echo json_encode( __LOAD_($txt) ); }


?>