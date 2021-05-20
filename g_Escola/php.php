<?    
 session_start();
 include ("../_php/__Manager_.php");
  
if ($_POST['accion'] == "load"){        	
	  $txt = "SELECT escola_formacao.* FROM escola_formacao ORDER BY escola_formacao.nome";  					 
      echo json_encode( __LOAD_($txt) );		                
}

//-----------------------------------------------------------------------------------------------------/
//------------------------------------	
