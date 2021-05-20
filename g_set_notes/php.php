<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ 
	echo json_encode( __LOAD_("SELECT 
								  	  estudante.id, estudante.bi_passaporte, estudante.cNome
								 FROM
									  estudante
									  INNER JOIN matricula_ano    ON (estudante.id     = matricula_ano.id_estudante)
									  INNER JOIN m_disciplina_ano ON (matricula_ano.id = m_disciplina_ano.id_matricula)									 
								WHERE
									  (m_disciplina_ano.id_disciplina = '".$_POST["disc"]."') AND 
									  (matricula_ano.id_turma 	      = '".$_POST["tur"]."')"						                                 
  					)); 
}
if ($_POST['accion'] == "getNotes"){ 
	echo json_encode( __LOAD_("SELECT 
								  	  estudante.id,  estudiante_notas.nota, estudiante_notas.observacao, estudiante_notas.id AS idN
								 FROM
									  estudante
									  INNER JOIN matricula_ano    ON (estudante.id     = matricula_ano.id_estudante)
									  INNER JOIN m_disciplina_ano ON (matricula_ano.id = m_disciplina_ano.id_matricula)
									  INNER JOIN estudiante_notas ON (estudante.id = estudiante_notas.estudiante)
								WHERE
									  (estudiante_notas.disciplina = '".$_POST["disc"]."') AND 
									  (estudiante_notas.tipo_eval  = '".$_POST["eval"]."') AND 
									  (estudiante_notas.turma      = '".$_POST["tur"]."')"						                                 
  					)); 
}


if ($_POST['accion'] == "get_EVAL") { 
	echo json_encode( __LOAD_("SELECT 
									  prof_eval_disc.*,
									  tipo_evaluacao.tipo
									FROM
									  professor_disciplina
									  INNER JOIN prof_eval_disc ON (professor_disciplina.id = prof_eval_disc.id_prof_disc)
									  INNER JOIN tipo_evaluacao ON (prof_eval_disc.id_tipo_eval = tipo_evaluacao.id)
									WHERE
									  professor_disciplina.id_disciplina= '".$_POST["id"]."'" )); }


if ($_POST['accion'] == "get_DISC"){ echo json_encode( __LOAD_("SELECT  professor_disciplina.id_disciplina AS id, disciplina.dDesc
																  FROM  disciplina
															INNER JOIN  professor_disciplina ON (disciplina.id = professor_disciplina.id_disciplina)
															     WHERE (professor_disciplina.id_professor = '".$_SESSION['id_u']."')" )); }

if ($_POST['accion'] == "dellAll"){ 
	echo json_encode(__DELL_( "estudiante_notas", ["disciplina" => $_POST["disc"], 
										  			"tipo_eval" => $_POST["eval"],
										  		        "turma" => $_POST["tur"]
												  ]
							)); 
}

?>