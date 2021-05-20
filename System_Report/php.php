<?
 session_start();
 include ("../_php/__Manager.php");

//CR
if ($_POST['accion'] == "get_CR"){ 
	echo json_encode( __LOAD_("SELECT 
								  factura.*,
								  estudante.cNome,
								  estudante.bi_passaporte,
								  tipo_pagamento.nome,
								  forma_pagamento.ffpNome
								FROM
								  factura
								  INNER JOIN estudante ON (factura.id_estudante = estudante.id)
								  INNER JOIN forma_pagamento ON (factura.id_modo_pagamento = forma_pagamento.id)
								  INNER JOIN tipo_pagamento ON (factura.id_tipo_pagamento = tipo_pagamento.id)
								  INNER JOIN curso ON (estudante.id_curso = curso.id)
								  INNER JOIN turma ON (curso.id = turma.id_curso)
								WHERE
								  (turma.id = '".$_POST["turma"]."') AND								
								  (factura.id_tipo_pagamento = '".$_POST["TP"]."')" )); 
 }

//NOTAS
if ($_POST['accion'] == "get_Traza_Not"){ 
      $txt = "SELECT 
				  estudante.cNome,
				  users.nome,
				  log_notas.nota_antiga,
				  log_notas.nota_nova,
				  log_notas.`data`,
				  log_notas.hora
				FROM
				  estudante
				  INNER JOIN log_notas ON (estudante.id = log_notas.estudante)
				  INNER JOIN users ON (log_notas.usuario = users.id)
			   WHERE
				  (log_notas.disciplina = '".$_POST["disc"]."') AND 
				  (log_notas.tipo_eval  = '".$_POST["eval"]."') AND 
				  (log_notas.turma 	    = '".$_POST["tur"]."')"; 
      echo json_encode( __LOAD_($txt) ); 
}

if ($_POST['accion'] == "GETT"){ $txt = "SELECT 
											  DISTINCT(  turma.tDesc ),   
											  turma.id,
											  turma.tAno_curricular,
											  turma.tPeriodo
											FROM
											  disciplina
											  INNER JOIN grelha ON (disciplina.id_grelha = grelha.id)
											  INNER JOIN turma ON (grelha.id = turma.id_grelha)
											  INNER JOIN estudiante_notas ON (disciplina.id = estudiante_notas.disciplina)
											WHERE
											  (disciplina.id      = '".$_POST["disc"]."') AND 
											  (turma.anoAcademico = '".$_POST["ano"]."')  AND
											  (estudiante_notas.tipo_eval = '".$_POST["eval"]."')"; 
  echo json_encode( __LOAD_($txt) ); 
 }

if ($_POST['accion'] == "GETT_P"){ $txt = "SELECT 
											  DISTINCT(  turma.tDesc ),   
											  turma.id,
											  turma.tAno_curricular,
											  turma.tPeriodo
											FROM
											  disciplina
											  INNER JOIN grelha ON (disciplina.id_grelha = grelha.id)
											  INNER JOIN turma ON (grelha.id = turma.id_grelha)
											  INNER JOIN estudiante_notas ON (disciplina.id = estudiante_notas.disciplina)
											WHERE
											  (disciplina.id      = '".$_POST["disc"]."') AND 
											  (turma.anoAcademico = '".$_POST["ano"]."')"; 
  echo json_encode( __LOAD_($txt) ); 
 }


//-------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "_get_DIS"){ 
      $txt = "SELECT 
				  disciplina.id,  disciplina.dDesc, disciplina.dAno_curricular,  curso.cDesc				  
				FROM
				  grelha
				  INNER JOIN curso      ON (grelha.id_curso = curso.id)
				  INNER JOIN disciplina ON (grelha.id 		= disciplina.id_grelha)
				WHERE
				  (curso.id = '".$_POST["curso"]."') AND 
				  (disciplina.dSemestre = '".$_POST["sem"]."')"; 
      echo json_encode( __LOAD_($txt) ); 
}
//-------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_turma")  { $txt = "SELECT turma.* FROM turma WHERE (turma.id_curso = '".$_POST["curso"]."') AND (turma.anoAcademico    = '".$_POST["ano"]."') ORDER BY turma.tDesc"; echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "_get_Turma_"){ $txt = "SELECT turma.* FROM turma WHERE (turma.id_curso = '".$_POST["curso"]."')        AND 
                                                							    (turma.tAno_curricular = '".$_POST["anoC"]."')  AND 
																				(turma.anoAcademico    = '".$_POST["anoA"]."') ORDER BY turma.tDesc"; echo json_encode( __LOAD_($txt) ); }
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_list_Est"){
	  $txt = "SELECT `estudante`.*, `curso`.`cDesc`, `matricula_ano`.`maData`, `matricula_ano`.`maValor_total`,
				  	 `matricula_ano`.`maAno_curricular`, `matricula_ano`.`maVez`, `matricula_ano`.`maSemestre`, `matricula_ano`.`id_turma`, `turma`.`tDesc`
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` ON (`estudante`.`id` 			= `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` 		 ON (`estudante`.`id_curso` 	= `curso`.`id`)
						  INNER JOIN `turma` 		 ON (`matricula_ano`.`id_turma` = `turma`.`id`)
			   WHERE
			         (`matricula_ano`.maData LIKE '".'%'.$_POST["ano"].'%'."') AND
			         (`matricula_ano`.id_turma  = '".$_POST["turma"]."')";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_Mat_ano"){
	  $txt = "SELECT  `estudante`.*, `curso`.`cDesc`, `matricula_ano`.`maData`, `matricula_ano`.`maValor_total`,
					  `matricula_ano`.`maAno_curricular`, `matricula_ano`.`maVez`, `matricula_ano`.`maSemestre`, `matricula_ano`.`id_turma`, `turma`.`tDesc`
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` ON (`estudante`.`id` = `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` ON (`estudante`.`id_curso` = `curso`.`id`)
						  INNER JOIN `turma` ON (`matricula_ano`.`id_turma` = `turma`.`id`)
			   WHERE
			         (`matricula_ano`.maData LIKE '".'%'.$_POST["ano"].'%'."')                                        AND
			         (`estudante`.id_curso      = '".$_POST["curso"]."')";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_Reb"){
	  $txt = "SELECT  `estudante`.*, `curso`.`cDesc`, `matricula_ano`.`maData`, `matricula_ano`.`maValor_total`,
					  `matricula_ano`.`maAno_curricular`, `m_disciplina_recurso`.`md_Vez`, `matricula_ano`.`maSemestre`
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` 		ON (`estudante`.`id` 	   = `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` 				ON (`estudante`.`id_curso` = `curso`.`id`)
						  INNER JOIN `m_disciplina_recurso` ON (`matricula_ano`.`id`   = `m_disciplina_recurso`.`id_matricula`)
			   WHERE
					 (`matricula_ano`.maData LIKE '".'%'.$_POST["ano"].'%'."')                                      			AND
					 (`estudante`.id_curso      = '".$_POST["curso"]."')";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_Traza_EST"){
	  $txt = "SELECT users.nome, users.activo, activity.*
				FROM
					 users
					 INNER JOIN activity  ON (users.id 			 = activity.id_utility)
			   WHERE
				    (activity.aData       LIKE '".'%'.$_POST["ano"].'%'."')         AND
				    (activity.aOperation     = '".    $_POST["op"].     "') 	    AND
				    (activity.id_curso       = '".    $_POST["curso"].  "')
			ORDER BY activity.id DESC";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_Traza_MATR"){
	  $txt = "SELECT
				  `estudante`.`bi_passaporte`, `estudante`.`cNome`, `estudante`.`cGenero`, `estudante`.`ctelefone`,
				  `estudante`.`cEmail`, `estudante`.`id_curso`, `curso`.`cDesc`, `matricula_ano`.*, `users`.nome, `users`.activo
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` ON (`estudante`.`id` 		    = `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` 		 ON (`estudante`.`id_curso` 	= `curso`.`id`)
						  INNER JOIN `turma` 		 ON (`matricula_ano`.`id_turma` = `turma`.`id`)
						  INNER JOIN `users` 	     ON (matricula_ano.id_utility 	= `users`.id)
			   WHERE
			        (`estudante`.`id_curso`      = '".    $_POST["curso"]."')   	 AND
			        (`matricula_ano`.`maData` LIKE '".'%'.$_POST["ano"].'%'."')
			ORDER BY matricula_ano.id DESC";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "get_Traza_MATR_dia"){
	  $txt = "SELECT
				  `estudante`.`bi_passaporte`, `estudante`.`cNome`, `estudante`.`cGenero`, `estudante`.`ctelefone`,
				  `estudante`.`cEmail`, `estudante`.`id_curso`, `curso`.`cDesc`, `matricula_ano`.*, `users`.nome, `users`.activo
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` ON (`estudante`.`id` 		      = `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` 		     ON (`estudante`.`id_curso` 	  = `curso`.`id`)
						  INNER JOIN `turma` 		     ON (`matricula_ano`.`id_turma` = `turma`.`id`)
						  INNER JOIN `users` 	       ON (matricula_ano.id_utility 	= `users`.id)
			   WHERE
			        (`estudante`.`id_curso`      = '".$_POST["curso"]."')   	 AND
			        (`matricula_ano`.`maData`    = '".$_POST["data"] ."')
			ORDER BY matricula_ano.id DESC";

      echo json_encode( __LOAD_($txt) );
}
//----------------------------------------------------------------------------------------------------------------------------------/


?>
