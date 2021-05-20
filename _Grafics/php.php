<?php   
 session_start();
 include("../_php/__Manager.php");
 
//***************************************************//
//grafica de matriculas por curso y semestres
if ($_POST['accion'] == "___Grafic_cs__") {   	 
	  $txt = "SELECT 
				  COUNT(estudante.cGenero) AS cantF,
												  (SELECT COUNT(estudante.cGenero) AS cantM
													 FROM
														 estudante
														 INNER JOIN matricula_ano ON (estudante.id = matricula_ano.id_estudante)
													WHERE
														(estudante.id_curso       = '".$_POST["curso"]."')     AND
														(matricula_ano.maSemestre = '".$_POST["semt"]."') 	   AND
														(estudante.cGenero        = 'Masculino')  			   AND
														(matricula_ano.maData  LIKE '".'%'.$_POST["ano"].'%'."'))
				FROM
				    estudante
				    INNER JOIN matricula_ano ON (estudante.id = matricula_ano.id_estudante)
				WHERE
				    (estudante.id_curso       = '".$_POST["curso"]."')     AND
					(matricula_ano.maSemestre = '".$_POST["semt"]."') 	   AND
					(estudante.cGenero        = 'Femenino')  			   AND
					(matricula_ano.maData  LIKE '".'%'.$_POST["ano"].'%'."')";  
											
	   echo json_encode( __LOAD_($txt) );   
}
//***************************************************//
//grafica de matriculas valores
if ($_POST['accion'] == "___Grafic_cv__") {   		
	  $txt = "SELECT 
				  SUM(matricula_ano.maValor_total) AS valorT
				FROM
				  matricula_ano
				  INNER JOIN estudante ON (matricula_ano.id_estudante = estudante.id)
				WHERE
				    (estudante.id_curso       = '".    $_POST["curso"]."')     AND
					(matricula_ano.maData  LIKE '".'%'.$_POST["ano"].'%'."')";  
											
	   echo json_encode( __LOAD_($txt) );   
}
//***************************************************//
//grafica de matriculas usuarios
if ($_POST['accion'] == "getUserAct"){  				
	  $txt = "SELECT users.* FROM users WHERE users.activo = 1 ORDER BY users.users"; 		
	  echo json_encode( __LOAD_($txt) );		            	    
}
if ($_POST['accion'] == "___Grafic_um__") {  
      ($_POST["ano"] != '--Todos--') ? $cnd ="AND (matricula_ano.maData LIKE '".'%'.$_POST["ano"].'%'."')" : $cnd =""; 	 
	  $txt = "SELECT 
					  COUNT(estudante.cGenero) AS cantF,
													  (SELECT COUNT(estudante.cGenero) AS cantM
														 FROM
															 estudante
															 INNER JOIN matricula_ano ON (estudante.id = matricula_ano.id_estudante)
														WHERE
															(`matricula_ano`.`id_utility` = '".$_POST["us"]."') AND
															(estudante.cGenero        = 'Masculino') ".$cnd.")
					FROM
						  estudante
						  INNER JOIN matricula_ano ON (estudante.id = matricula_ano.id_estudante)
				   WHERE
					   (`matricula_ano`.`id_utility` = '".$_POST["us"]."') AND
					   (estudante.cGenero        = 'Femenino') 
					    ".$cnd."";  
											
	   echo json_encode( __LOAD_($txt) );   
}
//***************************************************//

if ($_POST['accion'] == "___Grafic_cr__") {   		
	  $txt = "SELECT 
					  SUM(factura.valor_final) AS valorT,
					  tipo_pagamento.nome
					FROM
					  factura
					  INNER JOIN tipo_pagamento ON (factura.id_tipo_pagamento = tipo_pagamento.id)
					WHERE
					  (factura.`data` LIKE  '".'%'.$_POST["ano"].'%'."')
					GROUP BY
					  tipo_pagamento.nome";  
											
	   echo json_encode( __LOAD_($txt) );  
}
?>