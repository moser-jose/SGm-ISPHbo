<?php 
 session_start();
 include ("../_php/__Manager_.php");

/*****************************************************/
if ($_POST['accion'] == "load"){ 
	echo json_encode( __LOAD_("SELECT 
									  factura.*,
									  estudante.cNome,
									  estudante.bi_passaporte,
									  tipo_pagamento.nome,
									  tipo_pagamento.costo,
									  forma_pagamento.ffpNome
									FROM
									  factura
									  INNER JOIN estudante ON (factura.id_estudante = estudante.id)
									  INNER JOIN forma_pagamento ON (factura.id_modo_pagamento = forma_pagamento.id)
									  INNER JOIN tipo_pagamento ON (factura.id_tipo_pagamento = tipo_pagamento.id)"						                                 
  					)); 
}

if ($_POST['accion'] == "getTP"){ echo json_encode( __LOAD_("SELECT tipo_pagamento.* FROM  tipo_pagamento" )); }
//------------------------------------	
if ($_POST['accion'] == "getBanco"){ $txt = "SELECT bancos.*          FROM bancos";          				   			 echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "getfPag" ){ $txt = "SELECT forma_pagamento.* FROM forma_pagamento"; 				   			 echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "getConta"){ $txt = "SELECT contas.*          FROM contas 
										                             WHERE contas.Financas_Bancos_id = '".$_POST["b"]."'"; 
													                                                           			 echo json_encode( __LOAD_($txt) ); }
if ($_POST['accion'] == "get_id"){ $txt = "SELECT MAX(`factura`.`id`) 
                                             FROM `factura` 
											WHERE (`factura`.`bi` = '".$_POST["idE"]."')"; echo json_encode( __LOAD_($txt) ); }
