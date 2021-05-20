<?php
 session_start();
 include ("../_php/__Manager_.php");

if ($_POST['accion'] == "loadEst"){ 	
		$txt = "SELECT 
					  estudante.*,
					  necessita_educacao_especial.neeNome,
						  dados_laborais.id AS idDL,
						  dados_laborais.dlLocal_Trabalho,
						  dados_laborais.dlCargo,
						  dados_laborais.tipo_institucao,
						  dados_laborais.trabalhador,
						  dados_laborais.atleta,
						  dados_laborais.dirigente,
						  dados_laborais.militar,
						  dados_laborais.mulher_gravida,
						  dados_laborais.profissao_id,
						  dados_laborais.organismos_tutela_id,
							  profissao.proNome,
							  organismos_tutela.otNome,
							  dados_academicos.*,
							  habilitacoes_literarias_candidatos.hlfNome,
								  pais.id AS idPa,
								  pais.paNome,
								  pais.paCodigo,
								  provincias.id AS idPro,
								  provincias.provNome,
								  provincias.provCodigo,
								  provincias.Pais_id,
								  provincias.artigo,
								  municipios.id AS idMun,
								  municipios.munNome,
								  municipios.munCodigo,
								  municipios.Provincias_id
				FROM
					  estudante
					  INNER JOIN necessita_educacao_especial        ON (estudante.nee_id      				= necessita_educacao_especial.id)
					  INNER JOIN pais						        ON (estudante.cNacionalidad 			= pais.id)
					  INNER JOIN provincias 				        ON (estudante.cProvNacimiento 			= provincias.id)
					  INNER JOIN municipios 				        ON (estudante.cMunicNascimento 			= municipios.id)
					  INNER JOIN dados_laborais 		            ON (estudante.id 						= dados_laborais.id)
					  INNER JOIN profissao 				            ON (dados_laborais.profissao_id 		= profissao.id)
					  INNER JOIN organismos_tutela 			        ON (dados_laborais.organismos_tutela_id = organismos_tutela.id)
					  INNER JOIN dados_academicos 				    ON (estudante.id 						= dados_academicos.id)
					  INNER JOIN habilitacoes_literarias_candidatos ON (dados_academicos.daHL_id 			= habilitacoes_literarias_candidatos.id)
				WHERE
				     (estudante.id_curso = '".$_POST["id_curso"]."')";  

		echo json_encode( __LOAD_( $txt ) );
}
if ($_POST['accion'] == "getID"){ 
	if (!is_null( $_POST["BI"])){	
		$txt = "SELECT estudante.id FROM estudante WHERE estudante.bi_passaporte = '".$_POST["BI"]."'";  
		$txt =	 __LOAD_( $txt );

		echo json_encode( $txt[0]['id'] );
	  }
}
/*****************/
if ($_POST['accion'] == "save_act"){ 
	array_push($_POST["_form"], ["name" =>"id_utility", "value" =>$_SESSION["id_u"] ]);
	__SAVE_('activity', $_POST["_form"]);
}

?>