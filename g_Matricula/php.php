<?    
 session_start();
 include ("../_php/__Manager.php");
  
if ($_POST['accion'] == "load"){        	
	  $txt = "SELECT 
				  `estudante`.`bi_passaporte`, `estudante`.`cNome`, `estudante`.`cGenero`, `estudante`.`ctelefone`,
				  `estudante`.`cEmail`, `estudante`.`id_curso`, `curso`.`cDesc`, matricula_ano.id AS id_ma, `matricula_ano`.`maData`, matricula_ano.id AS id_M, `matricula_ano`.`maValor_total`,
				  `matricula_ano`.`maAno_curricular`, `matricula_ano`.`maVez`, `matricula_ano`.`maSemestre`, `matricula_ano`.`id_turma`, `matricula_ano`.`observacoes`, `turma`.`tDesc`
				FROM
				  `estudante`
						  INNER JOIN `matricula_ano` ON (`estudante`.`id` 		    = `matricula_ano`.`id_estudante`)
						  INNER JOIN `curso` 		 ON (`estudante`.`id_curso` 	= `curso`.`id`)
						  INNER JOIN `turma` 		 ON (`matricula_ano`.`id_turma` = `turma`.`id`)
			   WHERE (`estudante`.`bi_passaporte` = '".$_POST["bi"]."')";   	
	
      echo json_encode( __LOAD_($txt) );		                
}
	
if ($_POST['accion'] == "save"){	                
 $id = $_POST["id"]; 
	
	if ($id == '-'){                          //date('Y/m/d') 
		 $arr = array( 'maData' 		  => date('Y-m-d')   	,	   
					   'maValor_total'    => $_POST["valor"]   	,   					  
					   'maAno_curricular' => $_POST["ano"]   	,   					  
					   'maVez'        	  => $_POST["vez"]   	,   					  
					   'maSemestre'   	  => $_POST["semestre"] ,   					  
					   'id_turma'     	  => $_POST["turma"]    ,   					  
					   'id_estudante' 	  => $_POST["idE"]		,							   
					   'id_utility' 	  => $_SESSION["id_u"]  ,
					   'observacoes' 	  => $_POST["obs"]
					  );
					  
		 __SAVE_('matricula_ano', $arr);		 
     }
	  else{	   
         $arr = array( 'maData' 		  => date('Y-m-d')   	,	   
					   'maValor_total'    => $_POST["valor"]   	,   					  
					   'maAno_curricular' => $_POST["ano"]   	,   					  
					   'maVez'        	  => $_POST["vez"]   	,   					  
					   'maSemestre'   	  => $_POST["semestre"] ,   					  
					   'id_turma'     	  => $_POST["turma"]    ,   					  
					   'id_estudante' 	  => $_POST["idE"]	    ,
                       'observacoes' 	  => $_POST["obs"]					   
					  );
					  
			   $cond = array('id' => $id);
			   
			   __UpDATE_('matricula_ano', $arr, $cond);		      
	      }
}
if ($_POST['accion'] == "save_M"){	                
	
	     $arr = array( 'md_Vez' 	   => $_POST["vez"]   	,	   
					   'id_matricula'  => $_POST["id_M"]   	,   					  
					   'id_disciplina' => $_POST["discp"]   	
					  );	
	
		 __SAVE_('m_disciplina_ano', $arr);		 

}
if ($_POST['accion'] == "save_MR"){	                
	
	     $arr = array( 'md_Vez' 	      => $_POST["vez"]   	,	   
	     		       'mdAno_curricular' => $_POST["anoGR"]   	,	   
					   'id_matricula'     => $_POST["id_M"]   	,   					  
					   'id_disciplina'    => $_POST["discp"]    ,  	
					   'id_turmaREBUSCA'  => $_POST["turma"]   	
					  );	
	
		 __SAVE_('m_disciplina_recurso', $arr);		 

}

//-----------------------------------------------------------------------------------------------------/
if ($_POST['accion'] == "delete_DA"){   
  $txt  = "DELETE FROM m_disciplina_ano WHERE m_disciplina_ano.id_matricula = '".$_POST["id_M"]."'";     
  __DELL_( $txt  );
}
if ($_POST['accion'] == "delete_DR"){   
  $txt  = "DELETE FROM m_disciplina_recurso WHERE m_disciplina_recurso.id_matricula = '".$_POST["id_M"]."'";      
  __DELL_( $txt  );
}
/**----**/
if ($_POST['accion'] == "dell"){   
  $txt  = "DELETE FROM matricula_ano WHERE matricula_ano.id = '".$_POST["id"]."'";      
  __DELL_( $txt  );
}
//------------------------------------	
if ($_POST['accion'] == "get_D"){
	
  ($_POST['b'] == 'DA') ? $cnd ='m_disciplina_ano' : $cnd ='m_disciplina_recurso';	
   $txt = "SELECT  ".$cnd.".id_disciplina
			 FROM  ".$cnd."
			WHERE (".$cnd.".id_matricula = '".$_POST["id_M"]."')";  
	
    echo json_encode( __LOAD_($txt) ); 	
}
if ($_POST['accion'] == "get_AR"){
	
   $txt = "SELECT  m_disciplina_recurso.mdAno_curricular
			 FROM  m_disciplina_recurso
			WHERE (m_disciplina_recurso.id_matricula = '".$_POST["id_M"]."')";  
	
    echo json_encode( __LOAD_($txt) ); 	
}
if ($_POST['accion'] == "chek_Matr"){
	
   $txt = "SELECT  `estudante`.id FROM `estudante` INNER JOIN matricula_ano ON (estudante.id = matricula_ano.id_estudante)
                                                   WHERE (`estudante`.bi_passaporte  = '".$_POST["bi"]."')  		AND
    													 (`matricula_ano`.maSemestre = '".$_POST["sem"]."')         AND
    													 (`matricula_ano`.maData 	 = '".$_POST["d"]."')";   
    echo json_encode( __LOAD_($txt) ); 	
}
if ($_POST['accion'] == "get_id"){ $txt = "SELECT MAX(`matricula_ano`.`id`) 
                                             FROM `matricula_ano` 
											WHERE (`matricula_ano`.`id_estudante` = '".$_POST["idE"]."')"; echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "get_EST"){    $txt = "SELECT  `estudante`.`id`, `estudante`.`cNome`, `estudante`.`id_curso`, `curso`.`cDesc`
												FROM  `estudante` INNER JOIN `curso` ON (`estudante`.`id_curso` = `curso`.`id`)
											   WHERE (`estudante`.bi_passaporte = '".$_POST["BI"]."')";  
	
      echo json_encode( __LOAD_($txt) );		                
}
if ($_POST['accion'] == "getTurma"){   $txt = "SELECT turma.*
												FROM turma
											  WHERE (turma.tPeriodo 		 = '".$_POST["p"]."')   AND
													(turma.id_curso 		 = '".$_POST["c"]."')   AND
													(turma.anoAcademico      = '".date("Y")."')     AND
													(turma.tAno_curricular = '".$_POST["a"]."')"; 
      echo json_encode( __LOAD_($txt) );		                
}
if ($_POST['accion'] == "get_Vez"){  $txt = "SELECT MAX(`matricula_ano`.`maVez`) AS `vez`
											   FROM `matricula_ano`
											  WHERE
												   (`matricula_ano`.`id_estudante`     = '".$_POST["idE"]."')          AND 
												   (`matricula_ano`.`maAno_curricular` = '".$_POST["ano"]."')          AND 
												   (`matricula_ano`.`maSemestre`       = '".$_POST["semestre"]."')"; 
    echo json_encode( __LOAD_($txt) );		                
}
/************/
/************/
/************/
if ($_POST['accion'] == "get_grelha"){  $txt = "SELECT 
													  `disciplina`.*, `grelha`.`gDesc`, tipo_disciplina.tDesc
												  FROM
													  `grelha`
													   INNER JOIN `disciplina`      ON (`grelha`.`id` 		   = `disciplina`.`id_grelha`)
													   INNER JOIN `tipo_disciplina` ON (`tipo_disciplina`.`id` = `disciplina`.`id_tipo`  )
												 WHERE
													  (`grelha`.`id_curso`          = '".$_POST["idC"]."')                   AND
													  (`disciplina`.dSemestre       = '".$_POST["sem"]."')                   AND 
													  (`disciplina`.dAno_curricular = '".$_POST["ano"]."')
											  ORDER BY
                                                       `disciplina`.`dDesc`"; 
									  
      echo json_encode( __LOAD_($txt) );		                
}
if ($_POST['accion'] == "get_grelhaRH"){ $txt = "SELECT 
													  `disciplina`.*, `grelha`.`gDesc`, tipo_disciplina.tDesc
												  FROM
													  `grelha`
													   INNER JOIN `disciplina`      ON (`grelha`.`id` 		   = `disciplina`.`id_grelha`)
													   INNER JOIN `tipo_disciplina` ON (`tipo_disciplina`.`id` = `disciplina`.`id_tipo`  )
												 WHERE
													  (`grelha`.`id_curso`          = '".$_POST["idC"]."')   AND													  
													  (`disciplina`.dAno_curricular = '".$_POST["ano"]."')   AND 
                                                      (`disciplina`.dSemestre       = '".$_POST["sem"]."')
											  ORDER BY
                                                       `disciplina`.`dDesc`"; 
									  
      echo json_encode( __LOAD_($txt) );		                
}
if ($_POST['accion'] == "get_idTurmaREBUSCA"){ $txt = "SELECT turma.id FROM turma 
												        WHERE (turma.tDesc        = '".$_POST["turDesc"]."') AND
														      (turma.anoAcademico = '".date("Y")."')";        echo json_encode( __LOAD_($txt) ); }
