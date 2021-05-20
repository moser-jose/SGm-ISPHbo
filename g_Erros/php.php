<?php 
 session_start();
 include ("../_php/__Manager_.php");

if ($_POST['accion'] == "load"){ $txt = "SELECT 
											  sugestoes.*, users.nome
											FROM
											  sugestoes
											  INNER JOIN users ON (sugestoes.id_user = users.id)"; 
								     echo json_encode( __LOAD_( $txt ));
							   }

?>