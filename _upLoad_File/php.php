<?php 
 session_start(); 
 include ("../_php/__Manager.php");
 
 if ($_GET['accion'] == "addFile") {
	 
        $type_file = $_FILES['archivo']['type'];
		$type_file = explode("/", $type_file);
		
		$name_file = $_GET["id"] .'.'.$type_file[1];		
        //$tamano_archivo = $_FILES['archivo']['size'];
        $tmp_archivo = $_FILES['archivo']['tmp_name'];
        $archivador  = utf8_decode($_GET['carpeta'] .'/'.$name_file );
		
        // if(!is_dir($archivador))
			 if(!is_dir($name_file))
				if (!@move_uploaded_file($tmp_archivo, $archivador))				  
				     $r[0] = array('tipo'=>'error', 'texto'=>'Ocurrio un error al subir el archivo. No pudo guardarse.');
               else{  
			        $r[0] = array('tipo'=>'ok',    'texto'=>'Operación Terminada.');		
			       
				    $arr  = array('fFoto'           => $name_file);
				    $cond = array('fBI_Passaporte'  => $_GET["id"]);
				    __UpDATE_('funcionarios', $arr, $cond);
				   }
			
		echo json_encode( $r );
}
	
	
