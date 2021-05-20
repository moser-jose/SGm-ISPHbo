<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ 
	echo json_encode( __LOAD_("SELECT 
								  professor.*,
								  departamento.descricao,
								  municipios.munNome
								FROM
								  professor
								  INNER JOIN departamento ON (professor.id_dpto = departamento.id)
								  INNER JOIN municipios ON (professor.id_municipio = municipios.id)"						                                 
  					)); 
}

if ($_POST['accion'] == "get_DPTO"){ echo json_encode( __LOAD_("SELECT departamento.* FROM  departamento" )); }

?>