<?    
 session_start();
 include ("../_php/__Manager.php");
  
if ($_POST['accion'] == "load"){        	
	  $txt = "SELECT  opcao.* FROM opcao ORDER BY opcao.opcNome";  					 
      echo json_encode( __LOAD_($txt) );		                
}

//-----------------------------------------------------------------------------------------------------/
//------------------------------------	
