<?    
 session_start();
 include ("../_php/__Manager_.php");
  
if ($_POST['accion'] =="_SAVE")
{	                
    $id =$_POST["_form"][0]['value'];  
   ($id == '-') ? $r =__SAVE_  ($_POST["t_name"], $_POST["_form"])
                : $r =__UpDATE_($_POST["t_name"], $_POST["_form"], ['id' =>$id]); 
	
 echo json_encode($r);
}
//----------------------------------
if ($_POST['accion'] =="_DELETE"){ 	                     
					   __DELL_( $_POST["t_name"], ["id" =>$_POST["id"]] );
}