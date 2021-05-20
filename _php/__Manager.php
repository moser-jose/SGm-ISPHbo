<?php
 //session_start();
 include ("__Connection.php");
 
//Function for SAVE**************************************************************/ 
function __SAVE_( $t_Name, $arr_Fieds ){
	 $campos = ""; $values = ""; 
	 
	 foreach($arr_Fieds as $key => $valor){ 
		 $campos .= ($campos == "") ? "$key"         : ", $key";
		 $values .= ($values == "") ? "'".$valor."'" : ", '".$valor."'";
	 }
	 
   $CNN = CONNECT();	 
    mysqli_query($CNN, "INSERT INTO $t_Name($campos) VALUES($values)");  
   	  
   DISCONNECT($CNN);
   return("OK");
}
//Fin function for SAVE**************************************************************/

//Function for UpDATE******************************************************************/
function __UpDATE_($t_Name, $arr_Fieds, $COND){
    $sql = "UPDATE $t_Name SET ";

    $i = 0;
    foreach ($arr_Fieds as $key => $valor) { $sql .= ($i == 0) ? "$key = '".$valor."'" : ", $key = '".$valor."'"; $i++;}
   
    $sql .= " WHERE ";
    $i = 0;
    foreach ($COND as $key => $valor) { $sql .= ($i == 0) ? "$key = '".$valor."'" : " AND $key = '".$valor."'"; $i++;}
    
	$CNN = CONNECT();	 
    mysqli_query($CNN, $sql);
	
   DISCONNECT($CNN);
   return("OK");	
  }
//Fin function for UpDATE**************************************************************/

//Function for LOAD******************************************************************/
function __LOAD_( $CONSULT ){
	$CNN = CONNECT();
	$REG = mysqli_query($CNN, $CONSULT);
	 
	 
	$i = 0;
	$r = [];
    while($RES = mysqli_fetch_array($REG)){
	  $r[$i] = $RES; 
	  $i++;
	}
	
   mysqli_free_result($REG);
   DISCONNECT($CNN);
   return($r);	 
}
//Fin function for LOAD**************************************************************/

//Function for DELL******************************************************************/
function __DELL_( $CONSULT ){
	$CNN = CONNECT();
	mysqli_query($CNN, $CONSULT);

	DISCONNECT($CNN);   
}
//Fin function for DELL**************************************************************/
?>