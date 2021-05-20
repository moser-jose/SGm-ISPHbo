<?php 
 session_start();
 include ("../../../_php/__Manager.php");

/******************************************************************/
if ($_POST['accion'] == "getProfesion")     { __GET_PROFESION();   }
/*********/
function __GET_PROFESION(){
   $txt = "SELECT profissao.* FROM profissao";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getTutela"){
   $txt = "SELECT organismos_tutela.* FROM organismos_tutela";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getInst")     { __GET_INST();   }
/*********/
function __GET_INST(){
   $txt = "SELECT tipo_instituicao_laboral.* FROM tipo_instituicao_laboral";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/

if ($_POST['accion'] == "saveDL_PRO")         { __Save_DL_PRO(); 		 } 
function __Save_DL_PRO(){
	    
	     ($_POST["atleta"]    == 'on') ? $a =1 : $a =0;
	     ($_POST["dirigente"] == 'on') ? $d =1 : $d =0;
	     ($_POST["militar"]   == 'on') ? $m =1 : $m =0;
	     ($_POST["mg"]        == 'on') ? $g =1 : $g =0;
	
         $arr_Pro = array( 'id'  			         => $_POST["id_C"], 
						   'dlLocal_Trabalho'  		 => $_POST["l"], 
						   'dlCargo' 				 => $_POST["c"], 
						   'tipo_institucao' 		 => $_POST["i"], 
						   'trabalhador' 			 => $_POST["trabajador"], 
						   'atleta' 				 => $a,							 			 
						   'dirigente' 			     => $d,						 			 
						   'militar' 				 => $m,							 			 
						   'mulher_gravida' 		 => $g,							 			 
						   'profissao_id' 			 => $_POST["p"],							 			 
						   'organismos_tutela_id' 	 => $_POST["t"]							 			 
					   );
	
	if ($_POST["id"] == '-'){
		 __SAVE_('dados_laborais', $arr_Pro); 
	     echo json_encode('Successfull INS');
	}
	else{
            $cond_PRO = array( 'id' => $_POST["id_C"]);
			__UpDATE_('dados_laborais', $arr_Pro, $cond_PRO);  
		    echo json_encode( 'Successfull UPD' );
	}
}


?>