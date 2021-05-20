<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ 
	echo json_encode( __LOAD_("SELECT 
								  professor_disciplina.*,
								  professor.nome,
								  disciplina.dDesc,
								  turma.tDesc
								FROM
								  professor_disciplina
								  INNER JOIN professor ON (professor_disciplina.id_professor = professor.id)
								  INNER JOIN disciplina ON (professor_disciplina.id_disciplina = disciplina.id)
								  INNER JOIN turma ON (professor_disciplina.id_turma = turma.id)"						                                 
  					)); 
}


if ($_POST['accion'] == "getIdProfe"){ 
	
	echo json_encode( __LOAD_("SELECT 
								  professor.id
								FROM
								  users
								  INNER JOIN professor ON (users.nome = professor.nome)
								WHERE
								  (users.id = '".$_SESSION["id_u"]."')" ));
}


if ($_POST['accion'] == "load2"){ 
	echo json_encode( __LOAD_("SELECT 
								  disciplina.dDesc, disciplina.dCarga_h, turma.tDesc AS TUR, tipo_disciplina.tDesc
								FROM
								  professor_disciplina
								  INNER JOIN disciplina ON (professor_disciplina.id_disciplina = disciplina.id)
								  INNER JOIN tipo_disciplina ON (disciplina.id_tipo = tipo_disciplina.id)
								  INNER JOIN turma ON (professor_disciplina.id_turma = turma.id)
								WHERE
								  (professor_disciplina.id_professor = '".$_POST["id"]."')"						                                 
  					)); 
}

if ($_POST['accion'] == "chek_PT")   { echo json_encode( __LOAD_("SELECT professor_disciplina.id 
																	FROM professor_disciplina 
																	WHERE professor_disciplina.id_professor  = '".$_POST["name"]."' AND 
																		  professor_disciplina.id_disciplina = '".$_POST["disc"]."' AND 
																		  professor_disciplina.id_turma      = '".$_POST["turma"]."'"  )); }

if ($_POST['accion'] == "get_PROFE"){ echo json_encode( __LOAD_("SELECT professor.* FROM professor WHERE professor.id_dpto = '".$_POST["dpto"]."'" )); }
if ($_POST['accion'] == "get_TURMA"){ echo json_encode( __LOAD_("SELECT  turma.id, turma.tDesc
																   FROM  turma
																  WHERE (turma.id_grelha = '".$_POST["grelha"]."') AND 
																        (turma.anoAcademico = '".date('Y')."')" )); }

?>