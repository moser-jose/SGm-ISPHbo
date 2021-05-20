<?php 
 session_start();
 include ("../_php/__Manager_.php");
  
if ($_POST['accion'] == "load"){  				
	  $txt = "SELECT curso.* FROM curso ORDER BY curso.cDesc"; 		
	
	  echo json_encode( __LOAD_($txt) );		            	    
}

?>