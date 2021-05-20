<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ 
	echo json_encode( __LOAD_("SELECT 
								  prof_eval_disc.*, disciplina.dDesc, tipo_evaluacao.tipo
								FROM
								  disciplina
								  INNER JOIN professor_disciplina ON (disciplina.id = professor_disciplina.id_disciplina)
								  INNER JOIN prof_eval_disc ON (professor_disciplina.id = prof_eval_disc.id_prof_disc)
								  INNER JOIN tipo_evaluacao ON (prof_eval_disc.id_tipo_eval = tipo_evaluacao.id)
								WHERE
								  (professor_disciplina.id_professor = '".$_SESSION['id_u']."')"						                                 
  					)); 
}

if ($_POST['accion'] == "get_DISC"){ echo json_encode( __LOAD_("SELECT  professor_disciplina.id, disciplina.dDesc
																  FROM  disciplina
															INNER JOIN  professor_disciplina ON (disciplina.id = professor_disciplina.id_disciplina)
															     WHERE (professor_disciplina.id_professor = '".$_SESSION['id_u']."')" )); }

if ($_POST['accion'] == "get_EVAL") { echo json_encode( __LOAD_("SELECT tipo_evaluacao.* FROM tipo_evaluacao" )); }
if ($_POST['accion'] == "chek_EVAL"){ echo json_encode( __LOAD_("SELECT prof_eval_disc.* 
 																   FROM prof_eval_disc 
																  WHERE prof_eval_disc.id_prof_disc = '".$_POST["disc"]."' AND 
																        prof_eval_disc.id_tipo_eval = '".$_POST["eval"]."'" )); }

?>