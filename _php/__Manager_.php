<?php
 //session_start();
 include ("__Connection.php");
 
//Function for SAVE**************************************************************/ 
function __SAVE_( $t_Name, $arr_Fieds ){
	
	 $campos = ""; $values = ""; 
	 foreach($arr_Fieds as $item)  
		 if ($item["name"] != 'id'){			 
			 $campos .= ($campos == "") ? "".$item["name"].""    : ",  ".$item["name"] ."" ;
		     $values .= ($values == "") ? "'".$item["value"]."'" : ", '".$item["value"]."'";
		 } 	
	 
   $CNN   =CONNECT();	
   $query ="INSERT INTO $t_Name($campos) VALUES($values)";	
    mysqli_query($CNN, $query);  
   	  
   DISCONNECT($CNN);
   return('Sucesso');
}
//Fin function for SAVE**************************************************************/

//Function for UpDATE******************************************************************/
function __UpDATE_($t_Name, $arr_Fieds, $COND){
    $sql = "UPDATE $t_Name SET ";

    $i = 0;
	 foreach($arr_Fieds as $item) { 
		     if ($item["name"] != 'id')			 
			 $sql .= ($i == 1) ? "".$item["name"]." = '".$item["value"]."'" : ", ".$item["name"]." = '".$item["value"]."'";		 
		     $i++;
	 } 
   
    $sql .= " WHERE ";
    $i = 0;
    foreach ($COND as $key => $valor) { $sql .= ($i == 0) ? "$key = '".$valor."'" : " AND $key = '".$valor."'"; $i++;}
    
	$CNN = CONNECT();	 
    mysqli_query($CNN, $sql);
	
   DISCONNECT($CNN);
   return("sucesso");	
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
function __DELL_( $t_Name, $COND ){
	$SQL = "DELETE FROM $t_Name WHERE ";

    $i = 0;
    foreach ($COND as $key => $valor) { $SQL .= ($i == 0) ? "$t_Name.$key = '".$valor."'" : " AND $t_Name.$key = '".$valor."'"; $i++; }
    
	$CNN = CONNECT();	 
    mysqli_query($CNN, $SQL);
	
   DISCONNECT($CNN);
   return($SQL);	
}
//Fin function for DELL**************************************************************/
?>