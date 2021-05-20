<?php 
 session_start();
 include ("../_php/__Manager_.php");
 
//-------------------------------------------------------
if ($_POST['accion'] == "LOGIN_"){
	 $user =$_POST["user"];
	 $pass =$_POST["pass"];
	 	
	     $txt ="SELECT users.id, users.users, users.pass, users.id_roll, access.rolCode, users.activo
				  FROM users
				       INNER JOIN access ON (users.id_roll = access.id)													
				 WHERE (users.users LIKE '".$user."')"; 
	
	     $Res =__LOAD_($txt);
        
	     $r ="Erro";
	     if ( $Res != null) 
	     if (password_verify($pass,  $Res[0]['pass'])){ 
			   $_SESSION["id_u"]        =$Res[0]['id']     ;               
			   $_SESSION["usser"]       =$Res[0]['users']  ;
			   $_SESSION["nivel"]       =$Res[0]['id_roll'];
			   $_SESSION["rolCode"]     =$Res[0]['rolCode'];			   
						  
			  ($Res[0]["activo"] == 1) ? $r ="Operación Exitosa" : $r ="User Disabled";
		 }
		
      echo json_encode( $r );
  }  		
//-------------------------------------------------------
if ($_POST['accion'] == "LOAD"){  				
	  $txt = "SELECT users.*, access.rolCode, access.roll FROM users
	  											    INNER JOIN access ON (users.id_roll = access.id) 
			                                             WHERE (users.id <> 1) ORDER BY users.users"; 		
	
	  echo json_encode( __LOAD_($txt) );		            	    
}
	
if ($_POST['accion'] == "SAVE"){
    $id =$_POST["_form"][0]["value"]; 
	

	
 if ($id == '-'){    	 
     $_POST["_form"][3]["value"] =password_hash($_POST["_form"][3]["value"], PASSWORD_DEFAULT);
     __SAVE_('users', $_POST["_form"]);   	 
 }
  else	  
	  if($_POST["_form"][3]["pass"][59] ==""){
		 $_POST["_form"][3]["value"]     =password_hash($_POST["_form"][3]["value"], PASSWORD_DEFAULT);				 

			  __UpDATE_('users', $_POST["_form"], ['id'=>$id]); }
		else  __UpDATE_('users', $_POST["_form"], ['id'=>$id]); 
	echo json_encode($_POST["_form"]);
}
if ($_POST['accion'] == "CLOSE"){ session_destroy(); }    
//-------------------------------------------------------

if ($_POST['accion'] == "chek_user"){	
   $txt = "SELECT  `users`.users FROM `users` WHERE (`users`.users = '".$_POST["user"]."')";   
   echo json_encode( __LOAD_($txt) ); 	
}

if ($_POST['accion'] == "getNivel"){  				
	  $txt = "SELECT access.* FROM access WHERE (access.id = '".$_POST["u"]."')"; 				  
	  echo json_encode( __LOAD_($txt) );		            	    
}

if ($_POST['accion'] == "mudarSenha"){                   
    $_POST["_form"][1]["value"]               =password_hash($_POST["_form"][1]["value"], PASSWORD_DEFAULT); 	
    __UpDATE_('users', $_POST["_form"], ['id' =>$_POST["_form"][0]["value"]]);
}

/***********NOMENCLADORES*****************/
if ($_POST['accion'] == "load_rol")  { $txt = "SELECT access.*    FROM access"   ; echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "load_profe"){ $txt = "SELECT professor.* FROM professor"; echo json_encode( __LOAD_($txt) ); }
/*********END NOMENCLADORES***************/


?>