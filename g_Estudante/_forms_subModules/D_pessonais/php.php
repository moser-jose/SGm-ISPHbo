<?php 
 session_start();
 include ("../../../_php/__Manager.php");
 
 if ($_POST['accion'] == "chek_bi"){
	
   $txt = "SELECT  `estudante`.bi_passaporte FROM `estudante` WHERE (`estudante`.bi_passaporte = '".$_POST["bi"]."')";   
   echo json_encode( __LOAD_($txt) ); 	
} 
/******************************************************************/
if ($_POST['accion'] == "save"){  __save();  } 	
function __save(){	                
$id = $_POST["id"];  
     
	  //Personales
     $arr_Candidatos = array( 'bi_passaporte'  	    => $_POST["BIpass"], 
							  'cDataBI' 			=> $_POST["dataBIemi"], 
							  'cNome' 			    => $_POST["nome"], 							  
							  'cGenero' 			=> $_POST["genero"], 
							  'cEstadoC' 			=> $_POST["estadoC"], 
							  'cDataNac' 		    => $_POST["dataNac"], 
							  'cNacionalidad' 		=> $_POST["nacionalidad"], 
							  'cProvNacimiento' 	=> $_POST["prov"], 
							  'cMunicNascimento' 	=> $_POST["munic"], 
							  'cPai' 				=> $_POST["pai"], 
							  'cMae' 				=> $_POST["mae"], 
							  'cTelefone' 			=> $_POST["tele"], 
							  'cEmail' 				=> $_POST["email"], 
							  'nee_id' 				=> $_POST["nee"],
							  'id_munic' 			=> $_POST["municC"],
							  'id_curso' 	 		=> $_POST["Acurso"]
							 );
	
if ($id == '-'){ 	
	__SAVE_('estudante', $arr_Candidatos);  
	echo json_encode( 'Successfull INS' );
 }
	else{	        
			  $cond_C = array( 'id' => $id);
			__UpDATE_('estudante', $arr_Candidatos, $cond_C); 
		    echo json_encode('Successfull UPD');
         }

       
}
/******************************************************************/
/******************************************************************/
/******************************************************************/
if ($_POST['accion'] == "getPais"){ 
   $txt = "SELECT pais.* FROM pais ORDER BY pais.paNome";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/

/******************************************************************/
if ($_POST['accion'] == "getProv"){
   $txt = "SELECT provincias.* FROM provincias WHERE provincias.Pais_id = '".$_POST["p"]."' ORDER BY provincias.provNome";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getCU")    {
   $txt = "SELECT curso.* FROM curso ORDER BY curso.cDesc";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/

/******************************************************************/
if ($_POST['accion'] == "getMunic")     { 
   $txt = "SELECT municipios.* 
             FROM municipios 
			      INNER JOIN `provincias` ON (`municipios`.Provincias_id = `provincias`.id)
		    WHERE (municipios.Provincias_id = '".$_POST["p"]."')
		 ORDER BY municipios.munNome";   
	
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/
if ($_POST['accion'] == "getNEE")     { __GET_NEE();   }
/*********/
function __GET_NEE(){
   $txt = "SELECT necessita_educacao_especial.* FROM necessita_educacao_especial";   
   echo json_encode( __LOAD_($txt) ); 	
}
/******************************************************************/

if ($_POST['accion'] == "dell")     { __dell();   }
function __dell(){   
  $txt  = "DELETE FROM estudante WHERE estudante.id = '".$_POST["id"]."'";      
  __DELL_( $txt  );
}
?>