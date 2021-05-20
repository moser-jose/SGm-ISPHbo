<?php 
 session_start();
 include ("../../../_php/__Manager.php");

/******************************************************************/
if ($_POST['accion'] == "getHL")     { __GET_HL();   }
/*********/
function __GET_HL(){
   $txt = "SELECT habilitacoes_literarias_candidatos.* FROM habilitacoes_literarias_candidatos";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getOP")     { __GET_OPCION();   }
/*********/
function __GET_OPCION(){
   $txt = "SELECT opcao.* FROM opcao ORDER BY opcao.opcNome";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getESCOLA")     {
   if ($_POST["hl"] == 'Ensino Médio')
	   $txt = "SELECT escola_formacao.* FROM escola_formacao ORDER BY escola_formacao.nome";
	else
		if ($_POST["hl"] == 'Licenciatura')
	        $txt = "SELECT universidades.* FROM universidades";   
	
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getdataACA")     { __getdataACA();   }
/*********/
function __getdataACA(){
   if ($_POST["b"] == 'EM')
	   $txt = "SELECT   escola_formacao_opcao.*
				 FROM   escola_formacao_opcao
			    WHERE (`escola_formacao_opcao`.`id` = '".$_POST["idACA"]."')";
	else
	        $txt = "SELECT  universidad_cursos.*
					  FROM  universidad_cursos
					 WHERE (universidad_cursos.id = '".$_POST["idACA"]."')";   
	
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
/*****/
if ($_POST['accion'] == "save_ESCOLAS")       { __Save_ESCOLAS(); 		 } 
if ($_POST['accion'] == "save_ACA")           { __save_ACA(); 		     } 
if ($_POST['accion'] == "get_IdCurren")       {  _getID_Curren_(); 		 } 
function __Save_ESCOLAS(){
    /***Primeiro hay que inserir en escola o en universidad***/ 
	$id_escola = 0;
	$id_univ   = 0;
	
	if ($_POST["hl"] == 1){		
		$arrE = array( 'escolaFormacao_id' => $_POST["escola"], 'opcao_id' => $_POST["opcion"], 'AnoConclucao' => $_POST["ano"] );
		__SAVE_('escola_formacao_opcao', $arrE); 
		echo json_encode( '1' );
	}
	if ($_POST["hl"] == 2){
		$arrU = array( 'curso_id' => $_POST["opcion"], 'universidad_curso' => $_POST["escola"], 'AnoConclucao' => $_POST["ano"] );
		__SAVE_('universidad_cursos', $arrU); 
		echo json_encode( '2' );
	}
}

function _getID_Curren_( ){
	 ($_POST["hl"] == 1)	  
			 ?  $txt = "SELECT escola_formacao_opcao.id FROM escola_formacao_opcao
			             WHERE (escolaFormacao_id = '".$_POST["escola"]."')           AND   
			                   (opcao_id          = '".$_POST["opcion"]."')           AND   
			                   (AnoConclucao      = '".$_POST["ano"]."')
					  ORDER BY escola_formacao_opcao.id DESC"
						
	         :  $txt = "SELECT universidad_cursos.id FROM universidad_cursos
						 WHERE (curso_id           = '".$_POST["opcion"]."')          AND   
							   (universidad_curso  = '".$_POST["escola"]."')          AND   
							   (AnoConclucao       = '".$_POST["ano"]."')
					  ORDER BY universidad_cursos.id DESC"; 
													  
	$query = __LOAD_( $txt ); 	
	echo json_encode( $query[0]['id'] ); 
}
/*********/

function __save_ACA( ){
	    //Academicos
	     ($_POST["idE"] != 0) ? $arrAca = array( 'id'             => $_POST["id_C"], 
												 'daMediaFinal'   => $_POST["media"], 
						                         'daPaisFormacao' => $_POST["pais"], 
												 'daProvFormacao' => $_POST["provA"], 
												 'daHL_id'        => $_POST["hl"], 
												 'escola_id'      => $_POST["idE"] 
											   )
	                          
	                          : $arrAca = array( 'id' 			  => $_POST["id_C"], 
												 'daMediaFinal'   => $_POST["media"], 
					   						     'daPaisFormacao' => $_POST["pais"], 
												 'daProvFormacao' => $_POST["provA"], 
												 'daHL_id' 		  => $_POST["hl"], 
												 'universidad_id' => $_POST["idU"] );
	
	if ($_POST["id"] == '-'){
		 __SAVE_('dados_academicos', $arrAca); 
		 echo json_encode( 'Succefull INS' );  
	}
	else{
		 
			 $cond_A = array( 'id' => $_POST["id_C"]);
			__UpDATE_('dados_academicos', $arrAca, $cond_A); 
		   echo json_encode( 'Succefull UPD' );
	   }
}

/****/
if ($_POST['accion'] == "dell")     { __dell();   }
function __dell(){  
	
  ($_POST["idE"] != 0)
	
	  ? $txt  = "DELETE FROM escola_formacao_opcao WHERE escola_formacao_opcao.id = '".$_POST["idE"]."'"      
	  : $txt  = "DELETE FROM universidad_cursos    WHERE universidad_cursos.id    = '".$_POST["idU"]."'";
	
 __DELL_( $txt );
}
?>